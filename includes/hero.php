<!-- HERO SECTION -->
<section class="hero">
    
    <?php if (isset($hero_slider) && $hero_slider): ?>
        <!-- Image Slider -->
        <div class="hero-slider">
            <?php foreach ($hero_images as $index => $image): ?>
                <img src="<?php echo $image; ?>" class="slide <?php echo $index === 0 ? 'active' : ''; ?>">
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <!-- Static Background -->
        <div class="hero-bg" style="background-image: url('<?php echo $hero_bg; ?>');"></div>
    <?php endif; ?>
    
    <!-- Overlay -->
    <div class="hero-overlay"></div>
    
    <!-- Content -->
    <div class="hero-content">
        
        <!-- LEFT: Logo Block -->
        <div class="hero-logo-block fade-up">
            <img src="assets/images/Logo.png" alt="BK Green Energy Logo" class="hero-big-logo">
        </div>
        
        <!-- RIGHT: Text Content -->
        <div class="hero-text-block">
            <h1><?php echo $hero_title; ?></h1>
            
            <?php if (isset($hero_subtitle)): ?>
                <p class="hero-subtitle"><?php echo $hero_subtitle; ?></p>
            <?php endif; ?>
            
            <p><?php echo $hero_description; ?></p>
            
            <?php if (isset($hero_buttons) && !empty($hero_buttons)): ?>
                <div class="hero-buttons">
                    <?php foreach ($hero_buttons as $button): ?>
                        <a href="<?php echo $button['url']; ?>" class="btn btn-primary"><?php echo $button['text']; ?></a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
        
    </div>
</section>
