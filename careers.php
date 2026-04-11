<?php
if (session_status() === PHP_SESSION_NONE) session_start();
if (empty($_SESSION['csrf_token'])) $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover, user-scalable=yes, maximum-scale=5">
    <meta name="description" content="Careers at BK Green Energy - Join our team and build a sustainable future in renewable energy.">
    <meta name="keywords" content="BK Green Energy careers, solar jobs, renewable energy jobs, Madurai">
    <meta name="author" content="BK Green Energy">
    <title>Careers - BK Green Energy</title>
    <link href="assets/images/Logo.png" rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/careers-page.css">
    <link rel="stylesheet" href="css/no-flash.css">
    <link rel="stylesheet" href="css/bk-animations.css">
    <link rel="stylesheet" href="css/navbar-premium.css">
</head>
<body class="careers-page">
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
            <li><a href="careers.php" class="active">Careers</a></li>
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
        <a href="about.php"><i class="fas fa-info-circle"></i> About</a>
        <a href="services.php"><i class="fas fa-solar-panel"></i> Services</a>
        <a href="projects.php"><i class="fas fa-project-diagram"></i> Projects</a>
        <a href="careers.php" class="active"><i class="fas fa-briefcase"></i> Careers</a>
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

<!-- PAGE BANNER -->
<section class="page-banner careers-banner">
    <div class="banner-overlay"></div>
    <div class="container banner-inner">
        <div class="banner-text fade-in-up">
            <h1>Careers</h1>
            <p>Join Our Team &amp; Build a Sustainable Future</p>
            <nav aria-label="breadcrumb" class="banner-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Careers</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- CULTURE SECTION -->
<section class="culture-section section-pad">
    <div class="container">
        <div class="culture-grid">
            <div class="culture-img-wrap fade-left">
                <img src="assets/images/Carrers1.jpg" alt="BK Green Energy team" class="culture-img">
                <div class="culture-badge">
                    <i class="fas fa-leaf"></i>
                    <span>Green Energy Careers</span>
                </div>
            </div>
            <div class="culture-content fade-right">
                <span class="section-eyebrow"><i class="fas fa-users"></i> Why Work With Us</span>
                <h2>Why Work With BK Green Energy?</h2>
                <p>At BK Green Energy, we're building more than solar systems — we're building careers, communities and a cleaner future. Join a team that values your growth and your impact.</p>
                <ul class="culture-list">
                    <li><i class="fas fa-check-circle"></i> Innovative &amp; fast-growing environment</li>
                    <li><i class="fas fa-check-circle"></i> Real career growth opportunities</li>
                    <li><i class="fas fa-check-circle"></i> Meaningful sustainable impact</li>
                    <li><i class="fas fa-check-circle"></i> Supportive and collaborative team</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- JOB OPENINGS -->
<section class="jobs-section section-pad bg-light-green">
    <div class="container">
        <div class="section-header fade-up">
            <span class="section-eyebrow"><i class="fas fa-briefcase"></i> Open Positions</span>
            <h2>Current Job Openings</h2>
            <p>We're always looking for talented professionals to join our growing team across South India.</p>
        </div>
        <div class="jobs-grid">

            <div class="job-card fade-up">
                <div class="job-card-top">
                    <div class="job-icon"><i class="fas fa-tools"></i></div>
                    <span class="job-type">Full Time</span>
                </div>
                <h3>Solar Technician</h3>
                <div class="job-meta">
                    <span><i class="fas fa-map-marker-alt"></i> Madurai, Tamil Nadu</span>
                    <span><i class="fas fa-briefcase"></i> 1–3 Years Exp.</span>
                </div>
                <p>Install, maintain and troubleshoot solar PV systems on residential and commercial sites. Work with civil and electrical teams on EPC projects.</p>
                <a href="#apply-form" class="job-apply-btn">Apply Now <i class="fas fa-arrow-right"></i></a>
            </div>

            <div class="job-card fade-up">
                <div class="job-card-top">
                    <div class="job-icon"><i class="fas fa-hard-hat"></i></div>
                    <span class="job-type">Full Time</span>
                </div>
                <h3>Site Engineer</h3>
                <div class="job-meta">
                    <span><i class="fas fa-map-marker-alt"></i> Tamil Nadu / Karnataka</span>
                    <span><i class="fas fa-briefcase"></i> 2–5 Years Exp.</span>
                </div>
                <p>Supervise on-site civil, mechanical and electrical works for utility-scale solar projects. Ensure quality, safety and timely delivery.</p>
                <a href="#apply-form" class="job-apply-btn">Apply Now <i class="fas fa-arrow-right"></i></a>
            </div>

            <div class="job-card fade-up">
                <div class="job-card-top">
                    <div class="job-icon"><i class="fas fa-chart-line"></i></div>
                    <span class="job-type">Full Time</span>
                </div>
                <h3>Sales Executive</h3>
                <div class="job-meta">
                    <span><i class="fas fa-map-marker-alt"></i> Madurai, Tamil Nadu</span>
                    <span><i class="fas fa-briefcase"></i> 1–3 Years Exp.</span>
                </div>
                <p>Generate leads, build client relationships and close solar energy contracts for residential and commercial segments across South India.</p>
                <a href="#apply-form" class="job-apply-btn">Apply Now <i class="fas fa-arrow-right"></i></a>
            </div>

            <div class="job-card fade-up">
                <div class="job-card-top">
                    <div class="job-icon"><i class="fas fa-project-diagram"></i></div>
                    <span class="job-type">Full Time</span>
                </div>
                <h3>Project Manager</h3>
                <div class="job-meta">
                    <span><i class="fas fa-map-marker-alt"></i> South India</span>
                    <span><i class="fas fa-briefcase"></i> 5+ Years Exp.</span>
                </div>
                <p>Lead end-to-end execution of solar EPC projects. Coordinate civil, mechanical and electrical teams to ensure on-time, on-budget delivery.</p>
                <a href="#apply-form" class="job-apply-btn">Apply Now <i class="fas fa-arrow-right"></i></a>
            </div>

            <div class="job-card fade-up">
                <div class="job-card-top">
                    <div class="job-icon"><i class="fas fa-bolt"></i></div>
                    <span class="job-type">Full Time</span>
                </div>
                <h3>Electrical Supervisor</h3>
                <div class="job-meta">
                    <span><i class="fas fa-map-marker-alt"></i> Tamil Nadu / Maharashtra</span>
                    <span><i class="fas fa-briefcase"></i> 3–6 Years Exp.</span>
                </div>
                <p>Oversee DC/AC cable laying, termination, inverter installation and commissioning activities on utility-scale solar project sites.</p>
                <a href="#apply-form" class="job-apply-btn">Apply Now <i class="fas fa-arrow-right"></i></a>
            </div>

            <div class="job-card fade-up">
                <div class="job-card-top">
                    <div class="job-icon"><i class="fas fa-desktop"></i></div>
                    <span class="job-type">Full Time</span>
                </div>
                <h3>SCADA Technician</h3>
                <div class="job-meta">
                    <span><i class="fas fa-map-marker-alt"></i> South India</span>
                    <span><i class="fas fa-briefcase"></i> 2–4 Years Exp.</span>
                </div>
                <p>Install and commission SCADA monitoring systems, communication cabling and data integration for solar power plant operations.</p>
                <a href="#apply-form" class="job-apply-btn">Apply Now <i class="fas fa-arrow-right"></i></a>
            </div>

        </div>
    </div>
</section>

<!-- APPLICATION FORM -->
<section class="apply-section section-pad" id="apply-form">
    <div class="container">
        <div class="apply-grid">
            <div class="apply-info fade-left">
                <span class="section-eyebrow"><i class="fas fa-paper-plane"></i> Apply Now</span>
                <h2>Start Your Application</h2>
                <p>Fill out the form and our HR team will get back to you within 3 business days.</p>
                <ul class="apply-perks">
                    <li><i class="fas fa-check-circle"></i> Competitive compensation</li>
                    <li><i class="fas fa-check-circle"></i> On-site project exposure</li>
                    <li><i class="fas fa-check-circle"></i> Learning &amp; development support</li>
                    <li><i class="fas fa-check-circle"></i> Safety-first work culture</li>
                </ul>
                <div class="apply-contact">
                    <p><i class="fas fa-envelope"></i> <a href="mailto:careers@bkgreenenergy.com">careers@bkgreenenergy.com</a></p>
                    <p><i class="fas fa-phone"></i> <a href="tel:+917539944358">+91 75399 44358</a></p>
                </div>
            </div>
            <div class="apply-form-wrap fade-right">
                <div id="careersMsg" style="display:none;margin-bottom:16px;padding:12px 16px;border-radius:8px;font-weight:600;"></div>
                <form class="careers-form" id="careersForm" enctype="multipart/form-data" novalidate>
                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token'] ?? ''; ?>">
                    <input type="hidden" name="form_type" value="careers">
                    <div class="form-row">
                        <div class="cform-group">
                            <label for="c-name">Full Name <span>*</span></label>
                            <input type="text" id="c-name" name="name" placeholder="Your full name" required>
                        </div>
                        <div class="cform-group">
                            <label for="c-email">Email Address <span>*</span></label>
                            <input type="email" id="c-email" name="email" placeholder="your@email.com" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="cform-group">
                            <label for="c-phone">Phone Number <span>*</span></label>
                            <input type="tel" id="c-phone" name="phone" placeholder="10-digit mobile number" required>
                        </div>
                        <div class="cform-group">
                            <label for="c-position">Position Applying For <span>*</span></label>
                            <select id="c-position" name="position" required>
                                <option value="" disabled selected>Select a position</option>
                                <option>Solar Technician</option>
                                <option>Site Engineer</option>
                                <option>Sales Executive</option>
                                <option>Project Manager</option>
                                <option>Electrical Supervisor</option>
                                <option>SCADA Technician</option>
                                <option>Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="cform-group">
                        <label for="c-resume">Upload Resume <span>*</span></label>
                        <div class="file-upload-wrap">
                            <input type="file" id="c-resume" name="resume" accept=".pdf,.doc,.docx" required>
                            <label for="c-resume" class="file-upload-label">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <span id="fileLabel">Choose file (PDF, DOC — max 5MB)</span>
                            </label>
                        </div>
                    </div>
                    <div class="cform-group">
                        <label for="c-message">Cover Message</label>
                        <textarea id="c-message" name="message" rows="4" placeholder="Tell us about yourself and why you want to join BK Green Energy..."></textarea>
                    </div>
                    <button type="submit" class="careers-submit-btn">
                        <i class="fas fa-paper-plane" style="margin-right:0.45rem;"></i> Submit Application
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-section">
    <div class="cta-overlay"></div>
    <div class="container cta-inner fade-up">
        <div class="cta-text">
            <span class="section-eyebrow light"><i class="fas fa-bolt"></i> Join Us</span>
            <h2>Be Part of the Green Energy Revolution</h2>
            <p>Help us power a cleaner, greener South India — one solar project at a time.</p>
        </div>
        <div class="cta-actions">
            <a href="#apply-form" class="btn-cta-white">Apply Today <i class="fas fa-arrow-right"></i></a>
            <a href="contact.php" class="btn-cta-outline">Contact Us</a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/bkn-navbar.js"></script>
<script src="js/no-flash.js"></script>
<script src="js/animate.js"></script>
    <script src="js/bk-animations.js"></script>
<script src="js/careers.js"></script>
<script src="js/forms.js"></script>

</body>
</html>
