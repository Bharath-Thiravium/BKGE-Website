<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<nav class="bk-navbar">
    <div class="bk-navbar-container">
        
        <!-- Brand -->
        <a href="index.php" class="bk-navbar-brand">
            <img src="assets/images/Logo.png" alt="BK Green Energy" class="bk-navbar-logo">
        </a>
        
        <!-- Hamburger -->
        <button class="bk-navbar-toggle" id="menuToggle">
            <span></span>
            <span></span>
            <span></span>
        </button>
        
        <!-- Desktop Menu -->
        <div class="bk-navbar-menu">
            <a href="index.php" class="bk-navbar-link <?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">Home</a>
            <a href="about.php" class="bk-navbar-link <?php echo ($current_page == 'about.php') ? 'active' : ''; ?>">About</a>
            <a href="services.php" class="bk-navbar-link <?php echo ($current_page == 'services.php') ? 'active' : ''; ?>">Services</a>
            <a href="projects.php" class="bk-navbar-link <?php echo ($current_page == 'projects.php') ? 'active' : ''; ?>">Projects</a>
            <a href="careers.php" class="bk-navbar-link <?php echo ($current_page == 'careers.php') ? 'active' : ''; ?>">Careers</a>
            <a href="contact.php" class="bk-navbar-link <?php echo ($current_page == 'contact.php') ? 'active' : ''; ?>">Contact</a>
        </div>

    </div>
</nav>

<!-- Mobile Menu Overlay -->
<div class="menu-overlay" id="menuOverlay"></div>

<!-- Mobile Menu -->
<div class="mobile-menu" id="mobileMenu">
    <a href="index.php">Home</a>
    <a href="about.php">About</a>
    <a href="services.php">Services</a>
    <a href="projects.php">Projects</a>
    <a href="careers.php">Careers</a>
    <a href="contact.php" class="contact-btn">Contact</a>
</div>