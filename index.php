<?php
// Form submission handler
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
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

    // Validate message
    if (empty($message) || strlen($message) < 5 || strlen($message) > 1000) {
        $errors[] = "Message must be between 5-1000 characters";
    }

    // Send email if no errors
    if (empty($errors)) {
        $to = "info@bkgreenenergy.com";
        $subject = "New Consultation Request from " . htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
        
        $body = "Name: " . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . "\n";
        $body .= "Email: " . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . "\n";
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="BK Green Energy - Smart renewable energy solutions for homes and businesses. Solar power, energy consultancy, and sustainable solutions.">
    <meta name="keywords"
        content="renewable energy, solar power, green energy, solar panels, energy solutions, Madurai">
    <meta name="author" content="BK Green Energy">
    <title>BK Green Energy - Smart Renewable Energy Solutions</title>
    <link href="assets/images/Logo.png" rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/hero.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/no-flash.css">
</head>

<body>
<?php
// Hero Section Variables
$hero_title = "Smart Renewable Energy Solutions";
$hero_description = "BK Green Energy, established 25 September 2020 by Mr. Anbazhagan Bose, provides contract-based solar EPC support covering civil works, mechanical works, electrical works, installation & commissioning across Tamil Nadu and Karnataka.";
$hero_buttons = [
    ['url' => '#consultation', 'text' => 'Get a Free Consultation'],
    ['url' => 'services.php', 'text' => 'Explore Our Services'],
    ['url' => 'about.php', 'text' => 'Start Your Green Journey']
];
$hero_slider = true;
$hero_images = [
    'assets/images/Home page-1.jpg',
    'assets/images/Home page-2.jpg',
    'assets/images/Home page-3.jpg'
];
?>
    <nav class="navbar navbar-expand-lg fixed-top navbar-light custom-navbar">
        <div class="container">
            <!-- Logo -->
            <!-- <a class="navbar-brand" href="index.php">
                <img src="assets/images/Logo.png" alt="BK Green Energy" height="50">
            </a> -->
            <a href="index.php" class="brand-text">BK Green Energy</a>
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


    <?php include 'includes/hero.php'; ?>

    <!-- ABOUT SECTION -->
    <section class="about" id="about">
        <div class="container">
            <div class="about-content">
                <div class="about-text fade-up">
                    <h2>Innovation Inspired by Sustainability</h2>
                    <p>BK Green Energy, established 25 September 2020 and founded by Mr. Anbazhagan Bose, provides contract-based solar EPC support services. We deliver dependable and high-quality solar project execution with a strong focus on safety, precision, and timely completion.</p>
                    <p>Our execution capabilities cover civil works, mechanical works, electrical works, installation & commissioning across Tamil Nadu, Karnataka, Maharashtra, and Andhra Pradesh.</p>
                </div>
                <div class="about-image fade-up">
                    <svg viewBox="0 0 400 300" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <linearGradient id="solarGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:#0f7c3a;stop-opacity:1" />
                                <stop offset="100%" style="stop-color:#19a84a;stop-opacity:1" />
                            </linearGradient>
                        </defs>
                        <circle cx="200" cy="80" r="40" fill="#FFD700" class="sun-pulse" />
                        <rect x="80" y="140" width="60" height="80" fill="url(#solarGrad)" rx="5" />
                        <rect x="150" y="140" width="60" height="80" fill="url(#solarGrad)" rx="5" />
                        <rect x="220" y="140" width="60" height="80" fill="url(#solarGrad)" rx="5" />
                        <rect x="290" y="140" width="60" height="80" fill="url(#solarGrad)" rx="5" />
                        <line x1="110" y1="160" x2="130" y2="180" stroke="#fff" stroke-width="2" />
                        <line x1="180" y1="160" x2="200" y2="180" stroke="#fff" stroke-width="2" />
                        <line x1="250" y1="160" x2="270" y2="180" stroke="#fff" stroke-width="2" />
                        <line x1="320" y1="160" x2="340" y2="180" stroke="#fff" stroke-width="2" />
                        <rect x="50" y="220" width="300" height="10" fill="#333" />
                        <path d="M 50 230 L 20 280 L 380 280 L 350 230 Z" fill="#0f7c3a" opacity="0.3" />
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <!-- SERVICES SECTION -->
    <section class="services" id="services">
        <div class="container services-container">
            <div class="services-heading">
                <h2>Our Solutions</h2>
            </div>
            <div class="services-cards">
                <div class="service-card fade-left">
                    <div class="service-media">
                        <video autoplay muted loop playsinline>
                            <source src="assets/video/Solar Power Solutions.mp4" type="video/mp4">
                        </video>
                    </div>
                    <div class="service-content">
                        <h3>Civil & Foundation Works</h3>
                        <p>MMS pile foundation works, pile cap construction, ICR foundations, IDT foundations with gravel filling, LT panel foundations with HDGI canopy, BOT/UPS DB/auxiliary panel foundations, porta cabin, main gate, and bus duct foundations.</p>
                    </div>
                </div>
                <div class="service-card fade-left">
                    <div class="service-media">
                        <video autoplay muted loop playsinline>
                            <source src="assets/video/Customized Energy Projects.mp4" type="video/mp4">
                        </video>
                    </div>
                    <div class="service-content">
                        <h3>Mechanical Works</h3>
                        <p>MMS erection, inverter stand erection, solar module mounting & alignment with precision engineering and quality standards.</p>
                    </div>
                </div>
                <div class="service-card fade-left">
                    <div class="service-media">
                        <video autoplay muted loop playsinline>
                            <source src="assets/video/Installation & Maintenance.mp4" type="video/mp4">
                        </video>
                    </div>
                    <div class="service-content">
                        <h3>Electrical Works</h3>
                        <p>DC Works: Module interconnection & string formation, DC cable laying & termination, DC testing & commissioning. AC Works: Inverter installation, AC cable laying & termination, AC testing & commissioning.</p>
                    </div>
                </div>
                <div class="service-card fade-left">
                    <div class="service-media">
                        <video autoplay muted loop playsinline>
                            <source src="assets/video/Energy Consultancy.mp4" type="video/mp4">
                        </video>
                    </div>
                    <div class="service-content">
                        <h3>Earthing, Lightning & SCADA</h3>
                        <p>Equipment earthing, lightning arrester installation, SCADA installation, communication cable laying, and monitoring integration for complete system safety and control.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CONSULTATION FORM -->
    <section class="consultation" id="consultation">
        <div class="container">
            <div class="consultation-content fade-up">
                <h2>Get a Free Consultation</h2>
                <p>Tell us about your energy needs, and our experts will provide a customized solution designed to
                    maximize savings and efficiency.</p>
                <p>Fill out the form below, and we'll get back to you shortly.</p>

                <?php if (isset($success)): ?>
                    <div class="success-message">Thank you! We'll contact you soon.</div>
                <?php endif; ?>

                <form method="POST" action="#consultation" class="consultation-form">
                    <input type="text" name="name" placeholder="Your Name" required pattern="[A-Za-z ]{2,50}"
                        title="Name should contain only letters and spaces (2-50 characters)">
                    <input type="email" name="email" placeholder="Your Email" required maxlength="100"
                        autocomplete="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8') : ''; ?>">

                    <textarea name="message" placeholder="Tell us about your energy needs..." rows="5"
                        required maxlength="1000"><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8') : ''; ?></textarea>
                    <button type="submit" class="btn btn-primary">Submit Request</button>
                </form>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <script src="js/no-flash.js"></script>
    <script src="js/script.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>


</body>

</html>