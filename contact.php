<?php
// Start session for CSRF token
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Generate CSRF token if not exists
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Form submission handler
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verify CSRF token
    if (empty($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $errors = ["Security token validation failed. Please try again."];
    } else {
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $message = trim($_POST['message'] ?? '');

        $errors = [];

        // Validate name
        if (empty($name) || !preg_match("/^[A-Za-z ]{2,50}$/", $name)) {
            $errors[] = "Invalid name";
        }

        // Validate email
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email";
        }

        // Validate phone (Indian format)
        if (empty($phone) || !preg_match("/^[6-9][0-9]{9}$/", $phone)) {
            $errors[] = "Invalid phone number";
        }

        // Validate message
        if (empty($message) || strlen($message) < 5 || strlen($message) > 1000) {
            $errors[] = "Message must be between 5-1000 characters";
        }

        // Send email if no errors
        if (empty($errors)) {
        $to = "info@bkgreenenergy.com";
        $subject = "New Contact Request from " . htmlspecialchars($name, ENT_QUOTES, 'UTF-8');

        $body = "Name: " . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . "\n";
        $body .= "Email: " . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . "\n";
        $body .= "Phone: " . htmlspecialchars($phone, ENT_QUOTES, 'UTF-8') . "\n\n";
        $body .= "Message:\n" . htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

        $headers = "From: noreply@bkgreenenergy.com\r\n";
        $headers .= "Reply-To: " . filter_var($email, FILTER_SANITIZE_EMAIL) . "\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();

        if (@mail($to, $subject, $body, $headers)) {
            $success = true;
        } else {
            $errors[] = "Failed to send message. Please try again.";
        }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Contact BK Green Energy - Get in touch for solar solutions, renewable energy consultations, and expert guidance on sustainable power systems.">
    <meta name="keywords"
        content="contact BK Green Energy, solar consultation, renewable energy contact, Madurai solar company">
    <meta name="author" content="BK Green Energy">
    <title>Contact Us - BK Green Energy</title>
    <link href="assets/images/Logo.png" rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/no-flash.css">
    <link rel="stylesheet" href="css/alignment-fix-only.css">
</head>

<body class="contact-page">
    <nav class="navbar navbar-expand-lg fixed-top navbar-light custom-navbar">
        <div class="container">
            <a href="index.php" class="brand-text">BK Green Energy</a>
            <!-- Logo -->
            <!-- <a class="navbar-brand" href="index.php">
                <img src="assets/images/Logo.png" alt="BK Green Energy" height="50">
            </a> -->

            <!-- Mobile Toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            </button>

            <!-- Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="services.php">Services</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="projects.php">Projects</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="careers.php">Careers</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link btn-nav" href="contact.php">Contact</a>
                    </li>

                </ul>
            </div>

        </div>
    </nav>

    <!-- HERO INTRO SECTION -->
    <section class="hero-intro">
        <div class="hero-bg-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
        </div>
        <div class="container">
            <div class="hero-content-wrapper">
                <div class="hero-logo-block fade-in">
                    <img src="assets/images/Logo.png" alt="BK Green Energy Logo" class="hero-big-logo">
                </div>
                <div class="hero-content fade-in">
                    <h1>Let's Power a Greener Future Together</h1>
                    <p>Have questions about solar solutions? Planning to switch to renewable energy for your home or
                        business? Our team is here to guide you every step of the way.</p>
                </div>
            </div>
            <div class="scroll-indicator">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 4L12 20M12 20L6 14M12 20L18 14" stroke="white" stroke-width="2" fill="none" />
                </svg>
            </div>
        </div>
    </section>

    <!-- CONTACT FORM SECTION -->
    <section class="contact-form-section">
        <div class="container">
            <div class="section-header fade-up">
                <h2>Get a Free Consultation</h2>
                <p>Tell us about your energy needs, and our experts will provide a customized solution designed to
                    maximize savings and efficiency.</p>
                <p>📩 Fill out the form below, and we'll get back to you shortly.</p>
            </div>

            <div class="form-container">
                <div class="form-wrapper fade-left">
                    <?php if (isset($success)): ?>
                        <div class="success-message">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="10" fill="#0f7c3a" />
                                <path d="M8 12L11 15L16 9" stroke="white" stroke-width="2" fill="none" />
                            </svg>
                            <p>Thank you! We'll contact you soon.</p>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($errors)): ?>
                        <div class="error-message" style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #f5c6cb;">
                            <?php foreach ($errors as $error): ?>
                                <p style="margin: 5px 0;"><?php echo htmlspecialchars($error); ?></p>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="#contact-form" id="contact-form" class="contact-form">
                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token'] ?? ''; ?>">
                        <div class="form-group">
                            <input type="text" name="name" id="name" required maxlength="50" pattern="[A-Za-z ]{2,50}"
                                value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                            <label for="name">Your Name</label>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="email" required maxlength="100"
                                value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                            <label for="email">Your Email</label>
                        </div>
                        <div class="form-group">
                            <input type="tel" name="phone" id="phone" required pattern="[6-9]{1}[0-9]{9}"
                                title="Enter valid 10-digit Indian phone number" maxlength="10"
                                value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone'], ENT_QUOTES, 'UTF-8') : ''; ?>">

                            <label for="phone">Your Phone</label>
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="message" rows="5" required
                                maxlength="1000"><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8') : ''; ?></textarea>
                            <label for="message">Your Message</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>

                <div class="form-illustration fade-right">
                    <svg viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <linearGradient id="greenGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:#0f7c3a;stop-opacity:1" />
                                <stop offset="100%" style="stop-color:#19a84a;stop-opacity:1" />
                            </linearGradient>
                        </defs>
                        <circle cx="250" cy="120" r="60" fill="#FFD700" class="sun-animate" />
                        <rect x="150" y="220" width="200" height="150" fill="url(#greenGradient)" rx="10" />
                        <rect x="170" y="240" width="50" height="60" fill="#fff" opacity="0.3" />
                        <rect x="230" y="240" width="50" height="60" fill="#fff" opacity="0.3" />
                        <rect x="290" y="240" width="50" height="60" fill="#fff" opacity="0.3" />
                        <path d="M 250 370 L 250 420" stroke="#0f7c3a" stroke-width="4" />
                        <circle cx="250" cy="430" r="30" fill="#0f7c3a" opacity="0.3" />
                        <circle cx="100" cy="200" r="40" fill="#19a84a" opacity="0.2" class="float-shape" />
                        <circle cx="400" cy="350" r="50" fill="#0f7c3a" opacity="0.15" class="float-shape-2" />
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <!-- OFFICE DETAILS SECTION -->
    <section class="office-section">
        <div class="container">
            <h2 class="fade-up">Our Office</h2>
            <div class="office-grid">
                <div class="office-card fade-up">
                    <div class="icon-wrapper">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"
                                fill="#0f7c3a" />
                        </svg>
                    </div>
                    <h3>Location</h3>
                    <p>BK Green Energy</p>
                    <p>Plot No: 81, Poriyalar Nagar 4th Street,</p>
                    <p>Pillar No: 146 & 147, Natham Flyover,</p>
                    <p>Thiruppalai, Madurai, Tamil Nadu  625014</p>
                </div>

                <div class="office-card fade-up">
                    <div class="icon-wrapper">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"
                                fill="#0f7c3a" />
                        </svg>
                    </div>
                    <h3>Email</h3>
                    <p>info@bkgreenenergy.com</p>
                    <p>Admin@bkgreenenergy.com</p>
                    <!-- <p>info@bkgreenenergy.com</p> -->
                </div>

                <div class="office-card fade-up">
                    <div class="icon-wrapper">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"
                                fill="#0f7c3a" />
                        </svg>
                    </div>
                    <h3>Phone</h3>
                    <p>+91-75399 44358</p>
                    <p>+0452 358 7120</p>
                    
                </div>
            </div>

            <div class="map-container fade-up">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3929.427810408448!2d78.14334029999999!3d9.981475399999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b00c7ea5f368929%3A0x5695eb00ff07d955!2sAthena%20solutions!5e0!3m2!1sen!2sin!4v1771221256399!5m2!1sen!2sin"
                    width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>

    <!-- WHY REACH OUT SECTION -->
    <section class="why-section">
        <div class="container">
            <h2 class="fade-up">Why Reach Out to Us?</h2>
            <div class="why-grid">
                <div class="why-card fade-up">
                    <div class="why-icon">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V7.89l7-3.11v8.2z"
                                fill="#0f7c3a" />
                        </svg>
                    </div>
                    <h3>Expert Solar Guidance</h3>
                    <p>Professional consultation from experienced renewable energy specialists</p>
                </div>

                <div class="why-card fade-up">
                    <div class="why-icon">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"
                                fill="#0f7c3a" />
                        </svg>
                    </div>
                    <h3>Transparent Pricing</h3>
                    <p>Clear and honest pricing with no hidden costs or surprises</p>
                </div>

                <div class="why-card fade-up">
                    <div class="why-icon">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z"
                                fill="#0f7c3a" />
                        </svg>
                    </div>
                    <h3>Reliable Support</h3>
                    <p>Dedicated customer support throughout your solar journey</p>
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <script src="js/no-flash.js"></script>
    <script src="js/contact.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>