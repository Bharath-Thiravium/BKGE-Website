<?php
if (session_status() === PHP_SESSION_NONE) session_start();
if (empty($_SESSION['csrf_token'])) $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover, user-scalable=yes, maximum-scale=5">
    <meta name="description" content="BK Green Energy delivers smart renewable energy execution services including civil, mechanical, electrical, SCADA and commissioning support for utility and industrial solar projects.">
    <meta name="keywords" content="BK Green Energy, solar EPC support, renewable energy, civil works, mechanical works, electrical works, Madurai, Tamil Nadu">
    <meta name="author" content="BK Green Energy">
    <title>BK Green Energy - Renewable Energy Execution Partner</title>
    <link href="assets/images/Logo.png" rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/no-flash.css">
    <link rel="stylesheet" href="css/bk-animations.css">
    <link rel="stylesheet" href="css/navbar-premium.css">
    <style>
        /* index-specific: hero needs no extra top padding — navbar-premium handles body offset */
        .solartec-hero { margin-top: 0; }
    </style>
</head>
<body class="bkn-has-topbar">
    <?php if (basename($_SERVER['PHP_SELF']) === 'index.php') : ?>
    <!-- ═══ TOPBAR (home page only) ═══ -->
    <div class="bkn-topbar">
        <div class="bkn-topbar-inner">
            <div class="bkn-topbar-left">
                <span><i class="fas fa-map-marker-alt"></i> Madurai, Tamil Nadu, India</span>
                <span><i class="fas fa-clock"></i> Mon – Sat : 09:00 AM – 06:00 PM</span>
            </div>
            <div class="bkn-topbar-right">
                <a href="tel:+917539944358"><i class="fas fa-phone-alt"></i> +91 75399 44358</a>
                <a href="mailto:info@bkgreenenergy.com"><i class="fas fa-envelope"></i> info@bkgreenenergy.com</a>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- ═══ PREMIUM NAVBAR ═══ -->
    <nav class="bkn-nav" id="bknNav" aria-label="Main navigation">
        <div class="bkn-nav-inner">

            <!-- LEFT: angled green logo panel -->
            <a href="index.php" class="bkn-brand">
                <div class="bkn-brand-logo-wrap"><img src="assets/images/Logo.png" alt="BK Green Energy" class="bkn-brand-logo"></div>
                <div class="bkn-brand-text">
                    <span class="bkn-brand-name">BK Green Energy</span>
                    <!-- <span class="bkn-brand-tagline">Renewable Energy Partner</span> -->
                </div>
            </a>

            <!-- CENTER: nav links -->
            <ul class="bkn-menu">
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="projects.php">Projects</a></li>
                <li><a href="careers.php">Careers</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>

            <!-- RIGHT: icons + CTA -->
            <div class="bkn-actions">
                <button class="bkn-icon-btn" id="bknSearchBtn" aria-label="Search">
                    <i class="fas fa-search"></i>
                </button>
                <button class="bkn-icon-btn" id="bknGridBtn" aria-label="Quick links">
                    <i class="fas fa-th"></i>
                </button> 
                <div class="bkn-actions-divider"></div>
                <a href="contact.php" class="bkn-cta">
                    <i class="fas fa-bolt"></i> Get Quote
                </a>
                <button class="bkn-hamburger" id="bknHamburger" aria-label="Toggle menu" aria-expanded="false">
                    <span></span><span></span><span></span>
                </button>
            </div>
        </div>

        <!-- Mobile drawer -->
        <div class="bkn-drawer" id="bknDrawer" role="navigation" aria-label="Mobile menu">
            <a href="index.php" class="active"><i class="fas fa-home"></i> Home</a>
            <a href="about.php"><i class="fas fa-info-circle"></i> About</a>
            <a href="services.php"><i class="fas fa-solar-panel"></i> Services</a>
            <a href="projects.php"><i class="fas fa-project-diagram"></i> Projects</a>
            <a href="careers.php"><i class="fas fa-briefcase"></i> Careers</a>
            <a href="contact.php"><i class="fas fa-envelope"></i> Contact</a>
            <div class="bkn-drawer-divider"></div>
            <a href="contact.php" class="bkn-drawer-cta"><i class="fas fa-bolt"></i> Get Quote</a>
        </div>
    </nav>

    <!-- Search overlay -->
    <div class="bkn-search-overlay" id="bknSearchOverlay" role="dialog" aria-modal="true" aria-label="Search">
        <button class="bkn-search-close" id="bknSearchClose" aria-label="Close search"><i class="fas fa-times"></i></button>
        <div class="bkn-search-box">
            <input type="search" id="bknSearchInput" placeholder="Search BK Green Energy..." aria-label="Search" autocomplete="off">
            <button type="button" aria-label="Submit search"><i class="fas fa-search"></i></button>
        </div>
        <p class="bkn-search-hint">Try: Solar EPC, Civil Works, Commissioning, Careers…</p>
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

    <header class="solartec-hero" id="home">
        <div class="hero-slider-bg">
            <div class="hero-slide active" style="background-image:url('assets/images/Home page-1.jpg');"></div>
            <div class="hero-slide" style="background-image:url('assets/images/Home page-2.jpg');"></div>
            <div class="hero-slide" style="background-image:url('assets/images/Home page-3.jpg');"></div>
        </div>
        <div class="hero-overlay"></div>

        <!-- Logo — right column of hero grid, above stat card -->
        <div class="container hero-shell">
            <div class="hero-copy">
                <h1 class="fade-up">Smart Renewable Energy Solutions</h1>
                <p class="fade-up delay-1">BK Green Energy, established 25 September 2020 by Mr. Anbazhagan Bose, provides contract-based solar EPC support covering civil works, mechanical works, electrical works, installation &amp; commissioning across Tamil Nadu and Karnataka.</p>
                <div class="hero-actions fade-up delay-2">
                    <a href="contact.php" class="btn-hero btn-hero-primary"><i class="fas fa-leaf"></i> Get a Free Consultation</a>
                    <a href="services.php" class="btn-hero btn-hero-secondary"><i class="fas fa-solar-panel"></i> Explore Our Services</a>
                    <a href="projects.php" class="btn-hero btn-hero-tertiary"><i class="fas fa-arrow-right"></i> Start Your Green Journey</a>
                </div>
            </div>
            <div class="hero-right-col">
                <div class="hero-logo-badge">
                    <div class="hero-logo-badge-card">
                        <img src="assets/images/Logo.png" alt="BK Green Energy" class="hero-logo-badge-img">
                    </div>
                </div>
                <div class="hero-highlight-card bk-hero-card fade-up delay-3">
                    <div class="mini-stat">
                        <strong>25+</strong>
                        <span>Active project teams and field execution support</span>
                    </div>
                    <div class="mini-stat-list">
                        <div><i class="fas fa-check-circle"></i> Civil &amp; Foundation Works</div>
                        <div><i class="fas fa-check-circle"></i> Mechanical &amp; Structural Erection</div>
                        <div><i class="fas fa-check-circle"></i> Electrical, SCADA &amp; Commissioning</div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="stats-strip">
        <div class="container stats-grid">
            <div class="stat-card fade-up">
                <h3 data-count="120">120+</h3>
                <p>MW Execution Support Delivered</p>
            </div>
            <div class="stat-card fade-up">
                <h3 data-count="48">48+</h3>
                <p>Projects Supported Across South India</p>
            </div>
            <div class="stat-card fade-up">
                <h3 data-count="4">4</h3>
                <p>States Covered by Our Teams</p>
            </div>
            <div class="stat-card fade-up">
                <h3 data-count="100">100%</h3>
                <p>Safety, Quality and Timely Delivery Focus</p>
            </div>
        </div>
    </section>

    <section class="about-solartic section-space" id="about">
        <div class="container about-grid">
            <div class="about-image-wrap fade-left">
                <img src="assets/images/About us.jpg" alt="BK Green Energy team at project site">
                <div class="experience-badge">
                    <strong>2020</strong>
                    <span>Founded with a mission to power reliable solar execution</span>
                </div>
            </div>
            <div class="about-copy fade-right">
                <span class="section-tag section-tag-green">About Us</span>
                <h2>Execution Excellence for Utility, Industrial and Commercial Solar Projects</h2>
                <p>Established on 25 September 2020 by Mr. Anbazhagan Bose, BK Green Energy supports renewable energy companies with dependable on-ground execution, installation, and commissioning services.</p>
                <p>We combine skilled site teams, disciplined project coordination, and safety-first delivery to help clients complete solar infrastructure efficiently across Tamil Nadu, Karnataka, Maharashtra, and Andhra Pradesh.</p>
                <div class="feature-list">
                    <div><i class="fas fa-solar-panel"></i> Solar EPC support with contract-based execution</div>
                    <div><i class="fas fa-hard-hat"></i> Skilled workforce for civil, mechanical and electrical scopes</div>
                    <div><i class="fas fa-bolt"></i> Testing, SCADA, earthing and commissioning readiness</div>
                </div>
                <a href="about.php" class="btn btn-success btn-about">Explore More</a>
            </div>
        </div>
    </section>

    <section class="services-showcase section-space" id="services">
        <div class="container">
            <div class="section-heading reveal">
                <span class="section-tag">Our Services</span>
                <h2>We Are Driving Reliable Renewable Energy Execution</h2>
                <p>From foundations to final testing, BK Green Energy supports every critical stage of solar project delivery with field-ready expertise and disciplined coordination.</p>
            </div>

            <div class="services-grid">
                <article class="service-box fade-up">
                    <div class="service-thumb"><img src="assets/images/services/civil.png" alt="Civil & Foundation Works"></div>
                    <div class="service-body">
                        <h3>Civil & Foundation Works</h3>
                        <p>Pile foundations, ICR and IDT foundations, gravel filling, panel foundations, porta cabin bases, gates and bus duct structures.</p>
                        <a href="services.php">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>

                <article class="service-box fade-up">
                    <div class="service-thumb"><img src="assets/images/services/mechanical.png" alt="Mechanical Works"></div>
                    <div class="service-body">
                        <h3>Mechanical Works</h3>
                        <p>MMS erection, inverter stand erection and solar module mounting with precision alignment and quality installation practices.</p>
                        <a href="services.php">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>

                <article class="service-box fade-up">
                    <div class="service-thumb"><img src="assets/images/services/electrical.png" alt="Electrical Works"></div>
                    <div class="service-body">
                        <h3>Electrical Works</h3>
                        <p>DC and AC cable laying, termination, inverter installation, string formation, testing and commissioning support.</p>
                        <a href="services.php">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>

                <article class="service-box fade-up">
                    <div class="service-thumb"><img src="assets/images/services/scada.png" alt="SCADA and Earthing"></div>
                    <div class="service-body">
                        <h3>Earthing, Lightning & SCADA</h3>
                        <p>Equipment earthing, lightning arrester systems, communication cable laying and monitoring integration for controlled operations.</p>
                        <a href="services.php">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>

                <article class="service-box fade-up">
                    <div class="service-thumb"><img src="assets/images/Industrial Solar Farm.jpeg" alt="Installation and commissioning"></div>
                    <div class="service-body">
                        <h3>Installation & Commissioning</h3>
                        <p>Structured project site execution, equipment integration, quality checks and final commissioning readiness support.</p>
                        <a href="services.php">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>

                <article class="service-box fade-up">
                    <div class="service-thumb"><img src="assets/images/Smart Hybrid Energy System.jpeg" alt="Solar execution support"></div>
                    <div class="service-body">
                        <h3>Solar Project Execution Support</h3>
                        <p>End-to-end coordination support for utility, industrial and hybrid solar deployments with strong documentation and site discipline.</p>
                        <a href="services.php">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section class="why-choose section-space">
        <div class="container why-grid-home">
            <div class="why-content fade-left">
                <span class="section-tag section-tag-green">Why Choose Us</span>
                <h2>Complete Commercial, Industrial and Utility Solar Execution Support</h2>
                <p>Our delivery model is built for speed, quality, coordination and site safety. We help renewable energy partners execute high-volume work with skilled manpower, field supervision and dependable reporting.</p>
                <div class="why-points">
                    <div class="why-point"><i class="fas fa-award"></i><span>Quality-driven execution standards</span></div>
                    <div class="why-point"><i class="fas fa-users-cog"></i><span>Experienced site workers and supervisors</span></div>
                    <div class="why-point"><i class="fas fa-headset"></i><span>Responsive client coordination and support</span></div>
                    <div class="why-point"><i class="fas fa-shield-alt"></i><span>Safety-first site management approach</span></div>
                </div>
            </div>
            <div class="why-visual fade-right">
                <img src="assets/images/Home page-4.jpg" alt="BK Green Energy project execution">
            </div>
        </div>
    </section>

    <section class="projects-teaser section-space" id="projects">
        <div class="container">
            <div class="section-heading reveal">
                <span class="section-tag">Our Projects</span>
                <h2>Visit Our Latest Solar and Renewable Energy Works</h2>
                <p>A quick look at the type of project environments where BK Green Energy teams contribute with trusted execution support.</p>
            </div>
            <div class="project-filter-row fade-up">
                <button class="filter-pill active" type="button" data-filter="all">All</button>
                <button class="filter-pill" type="button" data-filter="utility">Utility Scale</button>
                <button class="filter-pill" type="button" data-filter="industrial">Industrial</button>
                <button class="filter-pill" type="button" data-filter="hybrid">Hybrid Systems</button>
            </div>
            <div class="projects-grid-home" id="homeProjectsGrid">
                <article class="project-card-home fade-up" data-category="utility">
                    <img src="assets/images/Mega Solar Installation Project.png" alt="Mega solar installation">
                    <div class="project-overlay">
                        <span>Utility Scale</span>
                        <h3>Mega Solar Installation Project</h3>
                    </div>
                </article>
                <article class="project-card-home fade-up" data-category="industrial">
                    <img src="assets/images/Industrial Energy Transformation.jpeg" alt="Industrial energy project">
                    <div class="project-overlay">
                        <span>Industrial</span>
                        <h3>Industrial Energy Transformation</h3>
                    </div>
                </article>
                <article class="project-card-home fade-up" data-category="hybrid">
                    <img src="assets/images/Smart Hybrid Energy System.jpeg" alt="Hybrid energy system">
                    <div class="project-overlay">
                        <span>Hybrid Systems</span>
                        <h3>Smart Hybrid Energy System</h3>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section class="consultation consultation-premium" id="consultation">
        <div class="container quote-grid">
            <div class="quote-copy fade-left">
                <span class="section-tag">Free Quote</span>
                <h2>Get A Free Consultation</h2>
                <p>Share your project scope or energy requirement with us. Our team will review it and connect with a suitable execution plan for your site needs.</p>
                <ul class="quote-checks">
                    <li><i class="fas fa-check-circle"></i> Utility and industrial project support</li>
                    <li><i class="fas fa-check-circle"></i> Fast response for execution enquiries</li>
                    <li><i class="fas fa-check-circle"></i> Customized planning for site requirements</li>
                </ul>
            </div>
            <div class="consultation-content fade-right">
                <div id="consultationMsg" style="display:none;margin-bottom:16px;padding:12px 16px;border-radius:8px;font-weight:600;"></div>

                <form id="consultationForm" class="consultation-form quote-form-card" novalidate>
                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token'] ?? ''; ?>">
                    <input type="hidden" name="form_type" value="consultation">
                    <input type="text" name="name" placeholder="Your Name" required pattern="[A-Za-z ]{2,60}" maxlength="60" autocomplete="name">
                    <input type="email" name="email" placeholder="Your Email" required maxlength="100" autocomplete="email">
                    <input type="tel" name="phone" placeholder="Phone Number (10-digit)" required pattern="[6-9]{1}[0-9]{9}" maxlength="10" autocomplete="tel">
                    <textarea name="message" placeholder="Tell us about your energy needs..." rows="5" required maxlength="2000"></textarea>
                    <button type="submit" class="btn btn-primary">Submit Request</button>
                </form>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bkn-navbar.js"></script>
    <script src="js/no-flash.js"></script>
    <script src="js/animate.js"></script>
    <script src="js/bk-animations.js"></script>
    <script src="js/image-animations.js"></script>
    <script src="js/script.js"></script>
    <script src="js/home-solartic.js"></script>
    <script src="js/forms.js"></script>
</body>
</html>
