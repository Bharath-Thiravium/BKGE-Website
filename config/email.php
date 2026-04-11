<?php
/**
 * BK Green Energy — SMTP Email Configuration
 * Edit ONLY this file to change mail credentials.
 */
return [
    // ── SMTP ────────────────────────────────────────────────
    'smtp_host'     => 'smtp.gmail.com',        // or smtp.hostinger.com / mail.yourdomain.com
    'smtp_port'     => 587,                     // 587 = TLS  |  465 = SSL
    'smtp_secure'   => 'tls',                   // 'tls' or 'ssl'
    'smtp_username' => 'your-email@gmail.com',  // SMTP login (Gmail: use App Password)
    'smtp_password' => 'your-app-password',     // Gmail App Password (NOT your Gmail password)

    // ── Sender ──────────────────────────────────────────────
    'from_email'    => 'noreply@bkgreenenergy.com',
    'from_name'     => 'BK Green Energy Website',

    // ── Recipient ───────────────────────────────────────────
    'to_email'      => 'info@bkgreenenergy.com',
    'to_name'       => 'BK Green Energy',

    // ── Resume upload directory (careers form) ───────────────
    // Must be writable: chmod 755 uploads/resumes
    'resume_upload_dir' => __DIR__ . '/../uploads/resumes/',
    'resume_max_size'   => 5 * 1024 * 1024,    // 5 MB
    'resume_allowed'    => ['pdf', 'doc', 'docx'],
];
