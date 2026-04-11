<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover, user-scalable=yes, maximum-scale=5">
    <meta name="description" content="About BK Green Energy - Trusted solar EPC execution partner delivering civil, mechanical, electrical, installation and commissioning works across South India.">
    <meta name="keywords" content="about BK Green Energy, solar EPC, renewable energy company, Madurai, Tamil Nadu">
    <meta name="author" content="BK Green Energy">
    <title>About Us - BK Green Energy</title>
    <link href="assets/images/Logo.png" rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/about-page.css">
    <link rel="stylesheet" href="css/no-flash.css">
    <link rel="stylesheet" href="css/bk-animations.css">
    <link rel="stylesheet" href="css/navbar-premium.css">
    <link rel="stylesheet" href="css/org-chart.css">
</head>
<body class="about-page">
<canvas id="bk-particles" aria-hidden="true"></canvas>
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
            <li><a href="about.php" class="active">About</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="projects.php">Projects</a></li>
            <li><a href="careers.php">Careers</a></li>
            <li><a href="contact.php">Contact</a></li>
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
        <a href="about.php" class="active"><i class="fas fa-info-circle"></i> About</a>
        <a href="services.php"><i class="fas fa-solar-panel"></i> Services</a>
        <a href="projects.php"><i class="fas fa-project-diagram"></i> Projects</a>
        <a href="careers.php"><i class="fas fa-briefcase"></i> Careers</a>
        <a href="contact.php"><i class="fas fa-envelope"></i> Contact</a>
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

<!-- ═══════════════════════════════════════════════
     PAGE BANNER
════════════════════════════════════════════════ -->
<section class="page-banner">
    <div class="banner-overlay"></div>
    <div class="container banner-inner">
        <div class="banner-text fade-in-up">
            <h1>About Us</h1>
            <p>Powering a Sustainable Future</p>
            <nav aria-label="breadcrumb" class="banner-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">About</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════
     ABOUT SECTION — image left / content right
════════════════════════════════════════════════ -->
<section class="about-main section-pad">
    <div class="container">
        <div class="about-grid">
            <div class="about-img-wrap fade-left">
                <img src="assets/images/About us.jpg" alt="BK Green Energy team at solar project site" class="about-img">
                <div class="about-badge">
                    <span class="badge-year">2020</span>
                    <span class="badge-label">Founded &amp; Growing</span>
                </div>
                <div class="about-img-accent"></div>
            </div>
            <div class="about-content fade-right">
                <span class="section-eyebrow"><i class="fas fa-leaf"></i> About BK Green Energy</span>
                <h2>We Are Leaders in Solar EPC Execution</h2>
                <p>Founded on 25 September 2020 by Mr. Anbazhagan Bose, BK Green Energy is a trusted solar EPC execution partner delivering civil, mechanical, electrical, installation and commissioning works across South India.</p>
                <p>With a skilled technical team and strong field expertise, we deliver high-quality, safe and timely solar power projects across Tamil Nadu, Karnataka, Maharashtra and Andhra Pradesh.</p>
                <ul class="about-checklist">
                    <li><i class="fas fa-check-circle"></i> High Quality Solar EPC Solutions</li>
                    <li><i class="fas fa-check-circle"></i> Certified Engineers &amp; Field Supervisors</li>
                    <li><i class="fas fa-check-circle"></i> Safety-First Site Management</li>
                    <li><i class="fas fa-check-circle"></i> Responsive Client Coordination</li>
                </ul>
                <a href="contact.php" class="btn-primary-green">Get Free Consultation <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════
     VISION & MISSION — two-column cards
════════════════════════════════════════════════ -->
<section class="vm-section section-pad bg-light-green">
    <div class="container">
        <div class="section-header fade-up">
            <span class="section-eyebrow"><i class="fas fa-solar-panel"></i> Our Purpose</span>
            <h2>Vision &amp; Mission</h2>
        </div>
        <div class="vm-grid">
            <div class="vm-card fade-up">
                <div class="vm-icon"><i class="fas fa-eye"></i></div>
                <h3>Our Vision</h3>
                <p>Our vision is to become one of South India's most trusted and leading solar energy solution providers, expanding our footprint across Tamil Nadu, Karnataka, Maharashtra, and Andhra Pradesh. We aspire to drive the clean energy transition by helping industries and commercial establishments shift towards sustainable power generation.</p>
                <p>BK Green Energy envisions a future where renewable energy is the primary source of power for businesses, reducing carbon emissions and promoting environmental responsibility. By continuously improving our technology, service standards, and operational excellence, we aim to create a greener, energy-secure, and economically sustainable tomorrow for future generations.</p>
            </div>
            <div class="vm-card fade-up">
                <div class="vm-icon"><i class="fas fa-bullseye"></i></div>
                <h3>Our Mission</h3>
                <p>To BK Green Energy, our mission is to accelerate the adoption of solar energy by delivering innovative, reliable, and high-performance solar installation solutions tailored for industrial and commercial sectors. Since our establishment in 2020 in Madurai, Tamil Nadu, we have been committed to empowering businesses with sustainable energy alternatives that reduce operational costs and environmental impact.</p>
                <p>We strive to provide end-to-end solar solutions — from consultation and system design to installation and maintenance — ensuring maximum efficiency, durability, and return on investment for our clients. Through advanced technology, skilled expertise, and strong ethical values, we aim to build long-term partnerships while contributing to India's renewable energy growth.</p>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════
     FEATURES / WHY CHOOSE US
════════════════════════════════════════════════ -->
<section class="features-section section-pad">
    <div class="container">
        <div class="section-header fade-up">
            <span class="section-eyebrow"><i class="fas fa-star"></i> Why Choose Us</span>
            <h2>What Makes BK Green Energy Different</h2>
            <p>We combine skilled site teams, disciplined project coordination and safety-first delivery to help clients complete solar infrastructure efficiently.</p>
        </div>
        <div class="features-grid">
            <div class="feature-card fade-up">
                <div class="feature-icon-wrap">
                    <i class="fas fa-leaf"></i>
                </div>
                <h4>Eco-Friendly Execution</h4>
                <p>Every project is delivered with minimal environmental impact, following green construction practices and responsible site management.</p>
            </div>
            <div class="feature-card fade-up">
                <div class="feature-icon-wrap">
                    <i class="fas fa-rupee-sign"></i>
                </div>
                <h4>Cost-Effective Solutions</h4>
                <p>Optimised execution models that reduce project costs without compromising on quality, safety or delivery timelines.</p>
            </div>
            <div class="feature-card fade-up">
                <div class="feature-icon-wrap">
                    <i class="fas fa-hard-hat"></i>
                </div>
                <h4>Expert Field Teams</h4>
                <p>Experienced engineers, supervisors and technicians with deep domain knowledge in solar EPC civil, mechanical and electrical works.</p>
            </div>
            <div class="feature-card fade-up">
                <div class="feature-icon-wrap">
                    <i class="fas fa-headset"></i>
                </div>
                <h4>Reliable Support</h4>
                <p>Responsive client coordination, transparent reporting and dedicated support throughout every phase of project execution.</p>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════
     STATS COUNTER
════════════════════════════════════════════════ -->
<section class="stats-section section-pad">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item fade-up">
                <div class="stat-icon"><i class="fas fa-solar-panel"></i></div>
                <h3 class="stat-num" data-target="120">0</h3>
                <span class="stat-suffix">MW+</span>
                <p>Execution Support Delivered</p>
            </div>
            <div class="stat-item fade-up">
                <div class="stat-icon"><i class="fas fa-project-diagram"></i></div>
                <h3 class="stat-num" data-target="48">0</h3>
                <span class="stat-suffix">+</span>
                <p>Projects Supported</p>
            </div>
            <div class="stat-item fade-up">
                <div class="stat-icon"><i class="fas fa-map-marked-alt"></i></div>
                <h3 class="stat-num" data-target="4">0</h3>
                <span class="stat-suffix"></span>
                <p>States Covered</p>
            </div>
            <div class="stat-item fade-up">
                <div class="stat-icon"><i class="fas fa-users"></i></div>
                <h3 class="stat-num" data-target="41">0</h3>
                <span class="stat-suffix">+</span>
                <p>Team Members</p>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════
     JOURNEY TIMELINE
════════════════════════════════════════════════ -->
<section class="journey-section section-pad bg-light-green">
    <div class="container">
        <div class="section-header fade-up">
            <span class="section-eyebrow"><i class="fas fa-road"></i> Our Journey</span>
            <h2>Milestones That Define Us</h2>
        </div>
        <div class="timeline-row">
            <div class="tl-item fade-up">
                <div class="tl-dot"><span>2020</span></div>
                <div class="tl-card">
                    <i class="fas fa-flag"></i>
                    <h4>Company Founded</h4>
                    <p>BK Green Energy established on 25 September 2020 by Mr. Anbazhagan Bose in Madurai, Tamil Nadu.</p>
                </div>
            </div>
            <div class="tl-item fade-up">
                <div class="tl-dot"><span>2021</span></div>
                <div class="tl-card">
                    <i class="fas fa-tools"></i>
                    <h4>First Major EPC Project</h4>
                    <p>Successfully delivered first large-scale solar EPC execution support for utility-scale projects in Tamil Nadu.</p>
                </div>
            </div>
            <div class="tl-item fade-up">
                <div class="tl-dot"><span>2023</span></div>
                <div class="tl-card">
                    <i class="fas fa-expand-arrows-alt"></i>
                    <h4>Multi-State Expansion</h4>
                    <p>Expanded operations to Karnataka, Maharashtra and Andhra Pradesh with dedicated field teams.</p>
                </div>
            </div>
            <div class="tl-item fade-up">
                <div class="tl-dot"><span>2025</span></div>
                <div class="tl-card">
                    <i class="fas fa-trophy"></i>
                    <h4>120 MW Milestone</h4>
                    <p>Crossed 120 MW of execution support delivered across 48+ projects with 41+ team members.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════
     TEAM STRENGTH
════════════════════════════════════════════════ -->
<section class="team-section section-pad">
    <div class="container">
        <div class="section-header fade-up">
            <span class="section-eyebrow"><i class="fas fa-users"></i> Our Team</span>
            <h2>The People Behind Our Success</h2>
            <p>A dedicated workforce of engineers, technicians and support staff committed to delivering excellence on every project site.</p>
        </div>
        <div class="team-grid">
            <div class="team-card fade-up">
                <div class="team-icon"><i class="fas fa-user-tie"></i></div>
                <div class="team-count-num" data-target="1">0</div>
                <h4>Management / Head</h4>
            </div>
            <div class="team-card fade-up">
                <div class="team-icon"><i class="fas fa-user-cog"></i></div>
                <div class="team-count-num" data-target="2">0</div>
                <h4>Admin Team</h4>
            </div>
            <div class="team-card fade-up">
                <div class="team-icon"><i class="fas fa-users-cog"></i></div>
                <div class="team-count-num" data-target="8">0</div>
                <h4>Support Staff</h4>
            </div>
            <div class="team-card fade-up">
                <div class="team-icon"><i class="fas fa-hard-hat"></i></div>
                <div class="team-count-num" data-target="12">0</div>
                <h4>Engineers</h4>
            </div>
            <div class="team-card fade-up">
                <div class="team-icon"><i class="fas fa-tools"></i></div>
                <div class="team-count-num" data-target="18">0</div>
                <h4>Technicians</h4>
            </div>
        </div>
        <div class="team-total-bar fade-up">
            <i class="fas fa-users"></i>
            <strong>Total Team Strength: 41 Members</strong>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════
     ORGANISATION STRUCTURE
════════════════════════════════════════════════ -->
<section class="org-section section-pad">
    <div class="container">
        <div class="section-header fade-up">
            <span class="section-eyebrow"><i class="fas fa-sitemap"></i> Our Structure</span>
            <h2>Organization Structure</h2>
            <p>A clear hierarchy built for efficient project delivery — from leadership to field execution.</p>
        </div>
    </div>
    <!-- chart wrapper is OUTSIDE .container so it gets full viewport width to scroll freely -->
    <div id="org-chart-wrap">
        <div id="org-tree-root"></div>
    </div>
    <div class="container">
        <p style="text-align:center;font-size:0.82rem;color:#5a6e60;margin-top:1rem;">
            <i class="fas fa-info-circle" style="color:#0f7c3a;"></i>
            Click any node to learn more &nbsp;·&nbsp; Use <strong>−</strong> button to collapse branches
        </p>
    </div>
</section>

<!-- Org Chart Popup -->
<div id="org-popup" role="dialog" aria-modal="true" aria-labelledby="org-popup-title" aria-hidden="true">
    <div id="org-popup-card">
        <div id="org-popup-header">
            <div id="org-popup-header-left">
                <span id="org-popup-icon"></span>
                <div>
                    <span id="org-popup-role"></span>
                    <h3 id="org-popup-title"></h3>
                </div>
            </div>
            <button id="org-popup-close" aria-label="Close">&times;</button>
        </div>
        <div id="org-popup-body">
            <p id="org-popup-desc"></p>
            <div id="org-popup-names-wrap" hidden>
                <p class="org-popup-names-label">Team Members</p>
                <div id="org-popup-names"></div>
            </div>
        </div>
    </div>
</div>

<!-- ═══════════════════════════════════════════════
     CTA SECTION
════════════════════════════════════════════════ -->
<section class="cta-section">
    <div class="cta-overlay"></div>
    <div class="container cta-inner fade-up">
        <div class="cta-text">
            <span class="section-eyebrow light"><i class="fas fa-bolt"></i> Take Action</span>
            <h2>Switch to Clean Energy Today</h2>
            <p>Partner with BK Green Energy for reliable, safe and timely solar project execution across South India.</p>
        </div>
        <div class="cta-actions">
            <a href="contact.php" class="btn-cta-white">Get Free Consultation <i class="fas fa-arrow-right"></i></a>
            <a href="projects.php" class="btn-cta-outline">View Our Projects</a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/bkn-navbar.js"></script>
<script src="js/no-flash.js"></script>
<script src="js/animate.js"></script>
    <script src="js/bk-animations.js"></script>
<script src="js/about.js"></script>
<script src="js/org-chart.js"></script>

</body>
</html>
