# Hero Section Implementation Guide - All Pages

## ✅ Files Created
- `css/hero.css` - Reusable hero styles for all pages

## 📋 HTML Template (Use on ALL pages)

```html
<!-- HERO SECTION -->
<section class="hero">
    <!-- Background (choose one method) -->
    
    <!-- METHOD 1: Static Background Image -->
    <div class="hero-bg" style="background-image: url('assets/images/YOUR-IMAGE.jpg');"></div>
    
    <!-- METHOD 2: Image Slider (like index.php) -->
    <div class="hero-slider">
        <img src="assets/images/image-1.jpg" class="slide active">
        <img src="assets/images/image-2.jpg" class="slide">
        <img src="assets/images/image-3.jpg" class="slide">
    </div>
    
    <!-- Overlay -->
    <div class="hero-overlay"></div>
    
    <!-- Content -->
    <div class="hero-content">
        <!-- LEFT: Logo -->
        <div class="hero-logo-block">
            <img src="assets/images/Logo.png" alt="BK Green Energy">
        </div>
        
        <!-- RIGHT: Text Content -->
        <div class="hero-text-block">
            <h1>Page Title Here</h1>
            <p class="hero-subtitle">Optional subtitle</p>
            <p>Page description text here...</p>
            
            <!-- Optional: Buttons -->
            <div class="hero-buttons">
                <a href="#" class="btn btn-primary">Button 1</a>
                <a href="#" class="btn btn-primary">Button 2</a>
            </div>
        </div>
    </div>
</section>
```

## 🔧 Implementation Steps for Each Page

### 1. Add CSS Link (in <head>)
```html
<link rel="stylesheet" href="css/hero.css">
```

### 2. Replace Existing Hero Section
Replace the current hero/banner section with the template above.

### 3. Customize Content
- Update h1 with page title
- Update p with page description
- Add/remove buttons as needed
- Choose background method (static or slider)

## 📄 Page-Specific Content

### index.php ✅ (Already Done)
- Title: "Smart Renewable Energy Solutions"
- Background: Image slider (3 images)
- Buttons: 3 buttons

### about.php
- Title: "About BK Green Energy"
- Subtitle: "Innovation Inspired by Sustainability"
- Background: `assets/images/About us.jpg`
- Description: Company introduction

### services.php
- Title: "Our Services"
- Subtitle: "Comprehensive Renewable Energy Solutions"
- Background: `assets/images/Our-projects.avif`
- Description: Services overview

### projects.php
- Title: "Our Projects"
- Subtitle: "Innovative Renewable Solutions"
- Background: Existing project image
- Description: Projects overview

### careers.php
- Title: "Careers at BK Green Energy"
- Subtitle: "🌿 Build Your Future While Powering the Nation"
- Background: `assets/images/Carrers.jpg`
- Description: Career opportunities

### contact.php
- Title: "Contact Us"
- Subtitle: "Let's Power a Greener Future Together"
- Background: `assets/images/contact.jpg`
- Description: Contact information

## 🎨 Design Features

### Desktop (>968px)
- Logo: 200px height, left side
- Text: Right-aligned
- Two-column flexbox layout
- Gap: 60px

### Tablet (≤968px)
- Logo: 160px height, centered
- Text: Center-aligned
- Stacked vertically
- Gap: 40px

### Mobile (≤640px)
- Logo: 140px height
- Text: Smaller fonts
- Buttons: Full width, stacked
- Fully responsive

## ✨ Features
- ✅ Reusable CSS (no duplication)
- ✅ Consistent spacing across all pages
- ✅ Proper z-index layering
- ✅ Smooth animations
- ✅ Green theme maintained
- ✅ Fully responsive
- ✅ Professional design

## 🚀 Quick Implementation

For each page, follow these 3 steps:

1. **Add CSS link** in `<head>`:
   ```html
   <link rel="stylesheet" href="css/hero.css">
   ```

2. **Replace hero HTML** with template

3. **Customize** title, subtitle, description, and background image

That's it! The hero section will automatically work with consistent styling.
