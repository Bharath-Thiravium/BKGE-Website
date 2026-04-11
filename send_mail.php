<?php
/**
 * BK Green Energy — Unified Mail Handler
 * Handles: consultation | contact | careers
 *
 * POST to this file via fetch() with FormData.
 * Always returns JSON: { "status": "success"|"error", "message": "..." }
 */

declare(strict_types=1);

// ── 0. Bootstrap ────────────────────────────────────────────────────────────
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

header('Content-Type: application/json; charset=UTF-8');
header('X-Content-Type-Options: nosniff');

// Only accept POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit(json_encode(['status' => 'error', 'message' => 'Method not allowed.']));
}

// ── 1. Load config & PHPMailer ───────────────────────────────────────────────
$config = require __DIR__ . '/config/email.php';

$mailerBase = __DIR__ . '/PHPMailer/PHPMailer/src/';
require_once $mailerBase . 'Exception.php';
require_once $mailerBase . 'PHPMailer.php';
require_once $mailerBase . 'SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as MailerException;

// ── 2. CSRF check ────────────────────────────────────────────────────────────
$csrfToken = trim($_POST['csrf_token'] ?? '');
if (empty($csrfToken) || !hash_equals($_SESSION['csrf_token'] ?? '', $csrfToken)) {
    exit(json_encode(['status' => 'error', 'message' => 'Security token invalid. Please refresh and try again.']));
}

// ── 3. Identify form type ────────────────────────────────────────────────────
$formType = trim($_POST['form_type'] ?? '');
$allowed  = ['consultation', 'contact', 'careers'];

if (!in_array($formType, $allowed, true)) {
    exit(json_encode(['status' => 'error', 'message' => 'Unknown form type.']));
}

// ── 4. Helpers ───────────────────────────────────────────────────────────────
function clean(string $value): string {
    return htmlspecialchars(strip_tags(trim($value)), ENT_QUOTES, 'UTF-8');
}

function field(string $key): string {
    return clean($_POST[$key] ?? '');
}

function jsonError(string $msg): never {
    exit(json_encode(['status' => 'error', 'message' => $msg]));
}

// ── 5. Collect & validate fields per form ────────────────────────────────────
$name    = field('name');
$email   = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
$phone   = field('phone');
$message = field('message');

// Common validation
if (empty($name) || !preg_match('/^[A-Za-z\s]{2,60}$/', $name)) {
    jsonError('Please enter a valid full name (letters only, 2–60 characters).');
}
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    jsonError('Please enter a valid email address.');
}
if (empty($phone) || !preg_match('/^[6-9][0-9]{9}$/', $phone)) {
    jsonError('Please enter a valid 10-digit Indian mobile number.');
}
if (empty($message) || strlen($message) < 5 || strlen($message) > 2000) {
    jsonError('Message must be between 5 and 2000 characters.');
}

// Form-specific fields & email subject
$subject    = '';
$position   = '';
$resumePath = null;

switch ($formType) {

    case 'consultation':
        $subject = 'New Free Consultation Request — BK Green Energy';
        break;

    case 'contact':
        $subject = field('subject');
        if (empty($subject) || strlen($subject) < 3 || strlen($subject) > 120) {
            jsonError('Please enter a subject (3–120 characters).');
        }
        $subject = 'Contact Enquiry: ' . $subject;
        break;

    case 'careers':
        $position = field('position');
        if (empty($position)) {
            jsonError('Please select the position you are applying for.');
        }
        $subject = 'Job Application: ' . $position . ' — BK Green Energy';

        // Resume upload (optional — skip if no file sent)
        if (!empty($_FILES['resume']['name'])) {
            $resumePath = handleResumeUpload($config);
            if (is_array($resumePath)) {
                // handleResumeUpload returned an error array
                jsonError($resumePath['error']);
            }
        }
        break;
}

// ── 6. Build plain-text email body ───────────────────────────────────────────
$divider = str_repeat('-', 50);

$body  = strtoupper(str_replace('_', ' ', $formType)) . " FORM SUBMISSION\n";
$body .= $divider . "\n";
$body .= "Name    : {$name}\n";
$body .= "Email   : {$email}\n";
$body .= "Phone   : {$phone}\n";

if ($formType === 'contact') {
    $rawSubject = field('subject');
    $body .= "Subject : {$rawSubject}\n";
}

if ($formType === 'careers') {
    $body .= "Position: {$position}\n";
    $body .= "Resume  : " . ($resumePath ? basename($resumePath) : 'Not attached') . "\n";
}

$body .= $divider . "\n";
$body .= "Message :\n{$message}\n";
$body .= $divider . "\n";
$body .= "Submitted: " . date('d M Y, h:i A') . " IST\n";
$body .= "IP       : " . ($_SERVER['REMOTE_ADDR'] ?? 'unknown') . "\n";

// ── 7. Send via PHPMailer ────────────────────────────────────────────────────
$mail = new PHPMailer(true);

try {
    // Server
    $mail->isSMTP();
    $mail->Host       = $config['smtp_host'];
    $mail->SMTPAuth   = true;
    $mail->Username   = $config['smtp_username'];
    $mail->Password   = $config['smtp_password'];
    $mail->SMTPSecure = $config['smtp_secure'];
    $mail->Port       = $config['smtp_port'];
    $mail->CharSet    = 'UTF-8';

    // Addresses
    $mail->setFrom($config['from_email'], $config['from_name']);
    $mail->addAddress($config['to_email'], $config['to_name']);
    $mail->addReplyTo($email, $name);

    // Content
    $mail->isHTML(false);
    $mail->Subject = $subject;
    $mail->Body    = $body;

    // Attach resume if uploaded
    if ($resumePath && file_exists($resumePath)) {
        $mail->addAttachment($resumePath, 'Resume_' . $name . '_' . basename($resumePath));
    }

    $mail->send();

    // Clean up temp resume after sending
    if ($resumePath && file_exists($resumePath)) {
        unlink($resumePath);
    }

    exit(json_encode([
        'status'  => 'success',
        'message' => successMessage($formType),
    ]));

} catch (MailerException $e) {
    error_log('[BKGreenEnergy] PHPMailer error: ' . $mail->ErrorInfo);
    exit(json_encode(['status' => 'error', 'message' => 'Failed to send your message. Please try again or call us directly.']));
}

// ── 8. Resume upload handler ─────────────────────────────────────────────────
function handleResumeUpload(array $config): string|array {
    $file = $_FILES['resume'];

    if ($file['error'] !== UPLOAD_ERR_OK) {
        return ['error' => 'Resume upload failed. Please try again.'];
    }

    if ($file['size'] > $config['resume_max_size']) {
        return ['error' => 'Resume file is too large. Maximum allowed size is 5 MB.'];
    }

    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, $config['resume_allowed'], true)) {
        return ['error' => 'Invalid file type. Only PDF, DOC and DOCX are accepted.'];
    }

    // Verify MIME type (double-check beyond extension)
    $allowedMimes = [
        'pdf'  => 'application/pdf',
        'doc'  => 'application/msword',
        'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
    ];
    $finfo    = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);

    if (!in_array($mimeType, $allowedMimes, true)) {
        return ['error' => 'File content does not match the allowed types (PDF, DOC, DOCX).'];
    }

    // Create upload dir if missing
    if (!is_dir($config['resume_upload_dir'])) {
        mkdir($config['resume_upload_dir'], 0755, true);
    }

    // Safe unique filename — no original filename in path
    $safeName = 'resume_' . bin2hex(random_bytes(8)) . '_' . time() . '.' . $ext;
    $destPath = $config['resume_upload_dir'] . $safeName;

    if (!move_uploaded_file($file['tmp_name'], $destPath)) {
        return ['error' => 'Could not save the uploaded file. Please try again.'];
    }

    return $destPath;
}

// ── 9. Success messages ───────────────────────────────────────────────────────
function successMessage(string $formType): string {
    return match ($formType) {
        'consultation' => 'Thank you! Your consultation request has been received. We will contact you within 24 hours.',
        'contact'      => 'Thank you for reaching out! Our team will respond within 24 business hours.',
        'careers'      => 'Your application has been submitted successfully! Our HR team will review it and contact you within 3 business days.',
        default        => 'Your message has been sent successfully.',
    };
}
