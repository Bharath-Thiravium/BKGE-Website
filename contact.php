<?php
if (session_status() === PHP_SESSION_NONE) session_start();
if (empty($_SESSION['csrf_token'])) $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover, user-scalable=yes, maximum-scale=5">
    <meta name="description" content="Contact BK Green Energy - Get in touch for solar EPC consultation, project enquiries and support.">
    <meta name="keywords" content="contact BK Green Energy, solar consultation, renewable energy contact, Madurai">
    <meta name="author" content="BK Green Energy">
    <title>Contact Us - BK Green Energy</title>
    <link href="assets/images/Logo.png" rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/contact-page.css">
    <link rel="stylesheet" href="css/no-flash.css">
    <link rel="stylesheet" href="css/bk-animations.css">
    <link rel="stylesheet" href="css/navbar-premium.css">
</head>
<body class="contact-page">
<!-- ═══ PREMIUM NAVBAR ═══ -->
<nav class="bkn-nav" id="bknNav" aria-label="Main navigation">
    <div class="bkn-nav-inner">
        <a href="index.php" class="bkn-brand">
            <div class="bkn-brand-logo-wrap"><img src="assets/images/Logo.png" alt="BK Green Energy" class="bkn-brand-logo"></div>
            <div class="bkn-brand-text">
                <span class="bkn-brand-name">BK Green Energy</span>
                <!-- <span class="bkn-brand-tagline">Renewable Energy Partner</span> -->
            </div>
        </a>
        <ul class="bkn-menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="projects.php">Projects</a></li>
            <li><a href="careers.php">Careers</a></li>
            <li><a href="contact.php" class="active">Contact</a></li>
        </ul>
        <div class="bkn-actions">
            <button class="bkn-icon-btn" id="bknSearchBtn" aria-label="Search"><i class="fas fa-search"></i></button>
            <button class="bkn-icon-btn" id="bknGridBtn" aria-label="Quick links"><i class="fas fa-th"></i></button>
            <div class="bkn-actions-divider"></div>
            <a href="contact.php" class="bkn-cta"><i class="fas fa-bolt"></i> Get Quote</a>
            <button class="bkn-hamburger" id="bknHamburger" aria-label="Toggle menu" aria-expanded="false">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>
    <div class="bkn-drawer" id="bknDrawer">
        <a href="index.php"><i class="fas fa-home"></i> Home</a>
        <a href="about.php"><i class="fas fa-info-circle"></i> About</a>
        <a href="services.php"><i class="fas fa-solar-panel"></i> Services</a>
        <a href="projects.php"><i class="fas fa-project-diagram"></i> Projects</a>
        <a href="careers.php"><i class="fas fa-briefcase"></i> Careers</a>
        <a href="contact.php" class="active"><i class="fas fa-envelope"></i> Contact</a>
        <div class="bkn-drawer-divider"></div>
        <a href="contact.php" class="bkn-drawer-cta"><i class="fas fa-bolt"></i> Get Quote</a>
    </div>
</nav>
    <div class="bkn-search-overlay" id="bknSearchOverlay" role="dialog" aria-modal="true" aria-label="Search">
    <button class="bkn-search-close" id="bknSearchClose" aria-label="Close search"><i class="fas fa-times"></i></button>
    <div class="bkn-search-box">
        <input type="search" id="bknSearchInput" placeholder="Search BK Green Energy..." aria-label="Search" autocomplete="off">
        <button type="button" aria-label="Submit search"><i class="fas fa-search"></i></button>
    </div>
    <p class="bkn-search-hint">Try: Solar EPC, Civil Works, Commissioning, Careers&hellip;</p>
</div>

<!-- Quick Links Panel -->
<div class="bkn-quicklinks-overlay" id="bknQuicklinksOverlay" aria-hidden="true"></div>
<div class="bkn-quicklinks-panel" id="bknQuicklinksPanel" role="dialog" aria-modal="true" aria-label="Quick links">
    <div class="bkn-ql-header">
        <span class="bkn-ql-title"><i class="fas fa-th"></i> Quick Links</span>
        <button class="bkn-ql-close" id="bknQuicklinksClose" aria-label="Close quick links"><i class="fas fa-times"></i></button>
    </div>
    <div class="bkn-ql-grid">
        <a href="index.php" class="bkn-ql-item">
            <span class="bkn-ql-icon"><i class="fas fa-home"></i></span>
            <span class="bkn-ql-label">Home</span>
        </a>
        <a href="about.php" class="bkn-ql-item">
            <span class="bkn-ql-icon"><i class="fas fa-info-circle"></i></span>
            <span class="bkn-ql-label">About Us</span>
        </a>
        <a href="services.php" class="bkn-ql-item">
            <span class="bkn-ql-icon"><i class="fas fa-solar-panel"></i></span>
            <span class="bkn-ql-label">Services</span>
        </a>
        <a href="projects.php" class="bkn-ql-item">
            <span class="bkn-ql-icon"><i class="fas fa-project-diagram"></i></span>
            <span class="bkn-ql-label">Projects</span>
        </a>
        <a href="careers.php" class="bkn-ql-item">
            <span class="bkn-ql-icon"><i class="fas fa-briefcase"></i></span>
            <span class="bkn-ql-label">Careers</span>
        </a>
        <a href="contact.php" class="bkn-ql-item">
            <span class="bkn-ql-icon"><i class="fas fa-envelope"></i></span>
            <span class="bkn-ql-label">Contact</span>
        </a>
        <a href="tel:+917539944358" class="bkn-ql-item">
            <span class="bkn-ql-icon"><i class="fas fa-phone-alt"></i></span>
            <span class="bkn-ql-label">Call Us</span>
        </a>
        <a href="contact.php" class="bkn-ql-item bkn-ql-item--cta">
            <span class="bkn-ql-icon"><i class="fas fa-bolt"></i></span>
            <span class="bkn-ql-label">Get Quote</span>
        </a>
    </div>
</div>
</div>

<!-- PAGE BANNER -->
<section class="page-banner contact-banner">
    <div class="banner-overlay"></div>
    <div class="container banner-inner">
        <div class="banner-text fade-in-up">
            <h1>Contact Us</h1>
            <p>Get In Touch With Our Team</p>
            <nav aria-label="breadcrumb" class="banner-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Contact</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- CONTACT INFO CARDS -->
<section class="info-cards-section section-pad">
    <div class="container">
        <div class="info-cards-grid">
            <div class="info-card fade-up">
                <div class="info-card-icon"><i class="fas fa-map-marker-alt"></i></div>
                <h3>Our Address</h3>
                <p class="info-card-address">
                    <span>Plot No. 81, Poriyalar Nagar,</span>
                    <span>4th Street, Pillar No. 146 &amp; 147,</span>
                    <span>Natham Flyover, Thiruppalai,</span>
                    <span>Madurai &ndash; 625014,</span>
                    <span>Tamil Nadu, India</span>
                </p>
            </div>
            <div class="info-card fade-up">
                <div class="info-card-icon"><i class="fas fa-phone-alt"></i></div>
                <h3>Phone</h3>
                <p><a href="tel:+917539944358">+91 75399 44358</a></p>
                <p><a href="tel:+04523587120">+0452 358 7120</a></p>
            </div>
            <div class="info-card fade-up">
                <div class="info-card-icon"><i class="fas fa-envelope"></i></div>
                <h3>Email</h3>
                <p><a href="mailto:info@bkgreenenergy.com">info@bkgreenenergy.com</a></p>
                <p><a href="mailto:Admin@bkgreenenergy.com">Admin@bkgreenenergy.com</a></p>
            </div>
            <div class="info-card fade-up">
                <div class="info-card-icon"><i class="fas fa-clock"></i></div>
                <h3>Working Hours</h3>
                <p>Monday – Saturday<br>09:00 AM – 06:00 PM</p>
                <p class="closed-tag">Sunday: Closed</p>
            </div>
        </div>
    </div>
</section>

<!-- FORM + MAP -->
<section class="contact-main-section section-pad bg-light-green">
    <div class="container">
        <div class="contact-grid">

            <!-- FORM -->
            <div class="contact-form-wrap fade-left">
                <span class="section-eyebrow"><i class="fas fa-paper-plane"></i> Send a Message</span>
                <h2>Get a Free Consultation</h2>
                <p>Share your project scope or energy requirement. Our team will review and respond within 24 hours.</p>

                <div id="contactMsg" style="display:none;margin-bottom:16px;padding:12px 16px;border-radius:8px;font-weight:600;"></div>

                <form id="contactForm" class="cform" novalidate>
                    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">
                    <input type="hidden" name="form_type" value="contact">
                    <div class="cform-row">
                        <div class="cform-group">
                            <label for="ct-name">Full Name <span>*</span></label>
                            <input type="text" id="ct-name" name="name" placeholder="Your full name"
                                required pattern="[A-Za-z ]{2,50}" maxlength="50"
                                value="<?= isset($_POST['name']) ? htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8') : '' ?>">
                        </div>
                        <div class="cform-group">
                            <label for="ct-email">Email Address <span>*</span></label>
                            <input type="email" id="ct-email" name="email" placeholder="your@email.com"
                                required maxlength="100"
                                value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8') : '' ?>">
                        </div>
                    </div>
                    <div class="cform-row">
                        <div class="cform-group">
                            <label for="ct-phone">Phone Number <span>*</span></label>
                            <input type="tel" id="ct-phone" name="phone" placeholder="10-digit mobile"
                                required pattern="[6-9]{1}[0-9]{9}" maxlength="10"
                                value="<?= isset($_POST['phone']) ? htmlspecialchars($_POST['phone'], ENT_QUOTES, 'UTF-8') : '' ?>">
                        </div>
                        <div class="cform-group">
                            <label for="ct-subject">Subject <span>*</span></label>
                            <input type="text" id="ct-subject" name="subject" placeholder="How can we help?"
                                required maxlength="100"
                                value="<?= isset($_POST['subject']) ? htmlspecialchars($_POST['subject'], ENT_QUOTES, 'UTF-8') : '' ?>">
                        </div>
                    </div>
                    <div class="cform-group">
                        <label for="ct-message">Message <span>*</span></label>
                        <textarea id="ct-message" name="message" rows="5"
                            placeholder="Tell us about your project or energy requirements..." required maxlength="1000"><?= isset($_POST['message']) ? htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8') : '' ?></textarea>
                    </div>
                    <button type="submit" class="contact-submit-btn">
                        <i class="fas fa-paper-plane" style="margin-right:0.45rem;"></i> Send Message
                    </button>
                </form>
            </div>

            <!-- MAP -->
            <div class="contact-map-wrap fade-right">
                <span class="section-eyebrow"><i class="fas fa-map-marked-alt"></i> Find Us</span>
                <h2>Our Location</h2>
                <p>Visit us at our registered office in Madurai, Tamil Nadu.</p>
                <div class="map-frame">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3929.427810408448!2d78.14334029999999!3d9.981475399999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b00c7ea5f368929%3A0x5695eb00ff07d955!2sAthena%20solutions!5e0!3m2!1sen!2sin!4v1771221256399!5m2!1sen!2sin"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade" title="BK Green Energy location"></iframe>
                </div>
                <div class="map-address-card">
                    <i class="fas fa-map-marker-alt"></i>
                    <div>
                        <strong>BK Green Energy</strong>
                        <span>Plot No. 81, Poriyalar Nagar, Natham Flyover, Thiruppalai, Madurai – 625014</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- WHY REACH OUT -->
<section class="why-contact-section section-pad">
    <div class="container">
        <div class="section-header fade-up">
            <span class="section-eyebrow"><i class="fas fa-star"></i> Why Contact Us</span>
            <h2>Why Reach Out to BK Green Energy?</h2>
        </div>
        <div class="why-contact-grid">
            <div class="why-contact-card fade-up">
                <div class="why-contact-icon"><i class="fas fa-shield-alt"></i></div>
                <h4>Expert Solar Guidance</h4>
                <p>Professional consultation from experienced renewable energy specialists with proven field expertise.</p>
            </div>
            <div class="why-contact-card fade-up">
                <div class="why-contact-icon"><i class="fas fa-rupee-sign"></i></div>
                <h4>Transparent Pricing</h4>
                <p>Clear and honest pricing with no hidden costs. Contract-based execution with defined scope.</p>
            </div>
            <div class="why-contact-card fade-up">
                <div class="why-contact-icon"><i class="fas fa-headset"></i></div>
                <h4>Fast Response</h4>
                <p>Dedicated coordination team that responds to all project enquiries within 24 business hours.</p>
            </div>
            <div class="why-contact-card fade-up">
                <div class="why-contact-icon"><i class="fas fa-leaf"></i></div>
                <h4>Eco-Friendly Execution</h4>
                <p>Safety-first, environment-conscious site management on every solar project we deliver.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-section">
    <div class="cta-overlay"></div>
    <div class="container cta-inner fade-up">
        <div class="cta-text">
            <span class="section-eyebrow light"><i class="fas fa-bolt"></i> Let's Connect</span>
            <h2>Let's Build a Greener Future Together</h2>
            <p>Partner with BK Green Energy for reliable, safe and timely solar project execution across South India.</p>
        </div>
        <div class="cta-actions">
            <a href="#contact-form" class="btn-cta-white">Contact Now <i class="fas fa-arrow-right"></i></a>
            <a href="projects.php" class="btn-cta-outline">View Projects</a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/bkn-navbar.js"></script>
<script src="js/no-flash.js"></script>
<script src="js/animate.js"></script>
    <script src="js/bk-animations.js"></script>
<script src="js/contact.js"></script>
<script src="js/forms.js"></script>

</body>
</html>
