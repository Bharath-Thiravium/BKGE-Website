# Hero Section - Quick Implementation Summary

## ✅ What Was Created

1. **`includes/hero.php`** - Reusable hero component
2. **`css/hero.css`** - Hero styles (already exists)
3. **`HERO_USAGE_GUIDE.md`** - Complete documentation

## 🚀 Quick Start - Apply to Any Page

### Step 1: Add CSS Link (in `<head>`)
```html
<link rel="stylesheet" href="css/hero.css">
```

### Step 2: Define Variables (after `<body>` tag)
```php
<?php
$hero_title = "Your Page Title";
$hero_description = "Your description here...";
$hero_buttons = [
    ['url' => '#link', 'text' => 'Button Text']
];
$hero_slider = false;
$hero_bg = 'assets/images/your-image.jpg';
?>
```

### Step 3: Include Hero
```php
<?php include 'includes/hero.php'; ?>
```

## 📋 Copy-Paste Examples

### About Page
```php
<?php
$hero_title = "About BK Green Energy";
$hero_subtitle = "Innovation Inspired by Sustainability";
$hero_description = "Founded on 25 September 2020 by Mr. Anbazhagan Bose, we are a trusted solar EPC execution partner.";
$hero_buttons = [
    ['url' => '#team', 'text' => 'Meet Our Team'],
    ['url' => 'contact.php', 'text' => 'Contact Us']
];
$hero_slider = false;
$hero_bg = 'assets/images/About us.jpg';
?>
<?php include 'includes/hero.php'; ?>
```

### Services Page
```php
<?php
$hero_title = "Our Services";
$hero_subtitle = "Comprehensive Renewable Energy Solutions";
$hero_description = "End-to-end solar power plant execution services.";
$hero_buttons = [
    ['url' => '#services', 'text' => 'View Services']
];
$hero_slider = false;
$hero_bg = 'assets/images/Our-projects.avif';
?>
<?php include 'includes/hero.php'; ?>
```

### Projects Page
```php
<?php
$hero_title = "Our Projects";
$hero_subtitle = "Innovative Renewable Solutions";
$hero_description = "Explore our portfolio of successful solar installations.";
$hero_buttons = [
    ['url' => '#projects', 'text' => 'View Projects']
];
$hero_slider = false;
$hero_bg = 'assets/images/Our-projects.avif';
?>
<?php include 'includes/hero.php'; ?>
```

### Careers Page
```php
<?php
$hero_title = "Careers at BK Green Energy";
$hero_subtitle = "🌿 Build Your Future While Powering the Nation";
$hero_description = "Join our team and be part of the renewable energy revolution.";
$hero_buttons = [
    ['url' => '#openings', 'text' => 'View Openings'],
    ['url' => 'mailto:careers@bkgreenenergy.com', 'text' => 'Apply Now']
];
$hero_slider = false;
$hero_bg = 'assets/images/Carrers.jpg';
?>
<?php include 'includes/hero.php'; ?>
```

### Contact Page
```php
<?php
$hero_title = "Contact Us";
$hero_subtitle = "Let's Power a Greener Future Together";
$hero_description = "Our team is here to guide you every step of the way.";
$hero_buttons = [
    ['url' => '#contact-form', 'text' => 'Send Message']
];
$hero_slider = false;
$hero_bg = 'assets/images/contact.jpg';
?>
<?php include 'includes/hero.php'; ?>
```

## 🎯 Layout Features

✅ **Left**: Big BK logo (200px height)
✅ **Right**: Title + description + buttons (right-aligned)
✅ **Background**: Slider or static image with overlay
✅ **Responsive**: Stacks on mobile, centers content
✅ **Consistent**: Same spacing and styling across all pages
✅ **Reusable**: Single source, no code duplication

## 📱 Responsive Breakpoints

- **Desktop (>968px)**: Two columns, logo 200px
- **Tablet (≤968px)**: Stacked, logo 160px, centered
- **Mobile (≤640px)**: Stacked, logo 140px, full-width buttons

## ✨ Done!

index.php is already updated. Just apply the same pattern to the remaining 5 pages!
