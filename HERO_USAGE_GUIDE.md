# Hero Section - Reusable PHP Include Guide

## 📁 File Created
- `includes/hero.php` - Reusable hero component

## 🎯 Usage Instructions

### Step 1: Define Hero Variables (Before including hero.php)

```php
<?php
// Define hero content variables
$hero_title = "Your Page Title";
$hero_description = "Your page description text here...";

// Optional: Subtitle
$hero_subtitle = "Optional subtitle text";

// Optional: Buttons
$hero_buttons = [
    ['url' => '#section', 'text' => 'Button 1'],
    ['url' => 'page.php', 'text' => 'Button 2']
];

// Background: Choose ONE method

// METHOD 1: Image Slider
$hero_slider = true;
$hero_images = [
    'assets/images/image1.jpg',
    'assets/images/image2.jpg',
    'assets/images/image3.jpg'
];

// METHOD 2: Static Background
$hero_slider = false;
$hero_bg = 'assets/images/background.jpg';
?>
```

### Step 2: Include Hero Component

```php
<?php include 'includes/hero.php'; ?>
```

---

## 📄 Page-Specific Examples

### index.php (Home Page)

```php
<?php
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

<?php include 'includes/hero.php'; ?>
```

---

### about.php (About Page)

```php
<?php
$hero_title = "About BK Green Energy";
$hero_subtitle = "Innovation Inspired by Sustainability";
$hero_description = "Founded on 25 September 2020 by Mr. Anbazhagan Bose, we are a trusted solar EPC execution partner specializing in civil, mechanical, electrical, installation, and commissioning works.";
$hero_buttons = [
    ['url' => '#team', 'text' => 'Meet Our Team'],
    ['url' => 'contact.php', 'text' => 'Contact Us']
];
$hero_slider = false;
$hero_bg = 'assets/images/About us.jpg';
?>

<?php include 'includes/hero.php'; ?>
```

---

### services.php (Services Page)

```php
<?php
$hero_title = "Our Services";
$hero_subtitle = "Comprehensive Renewable Energy Solutions";
$hero_description = "BK Green Energy provides end-to-end on-site execution services for solar power plant projects. From civil works to commissioning, we deliver excellence.";
$hero_buttons = [
    ['url' => '#services', 'text' => 'View All Services'],
    ['url' => 'contact.php', 'text' => 'Request Quote']
];
$hero_slider = false;
$hero_bg = 'assets/images/Our-projects.avif';
?>

<?php include 'includes/hero.php'; ?>
```

---

### projects.php (Projects Page)

```php
<?php
$hero_title = "Our Projects";
$hero_subtitle = "Innovative Renewable Solutions Across India";
$hero_description = "Explore our portfolio of successful solar installations across homes, industries, and communities. Over 11 completed projects powering a sustainable future.";
$hero_buttons = [
    ['url' => '#projects', 'text' => 'View Projects'],
    ['url' => 'contact.php', 'text' => 'Start Your Project']
];
$hero_slider = false;
$hero_bg = 'assets/images/Our-projects.avif';
?>

<?php include 'includes/hero.php'; ?>
```

---

### careers.php (Careers Page)

```php
<?php
$hero_title = "Careers at BK Green Energy";
$hero_subtitle = "🌿 Build Your Future While Powering the Nation";
$hero_description = "Join our team and be part of the renewable energy revolution. We're building a sustainable future and we'd love to have you on our team.";
$hero_buttons = [
    ['url' => '#openings', 'text' => 'View Openings'],
    ['url' => 'mailto:careers@bkgreenenergy.com', 'text' => 'Apply Now']
];
$hero_slider = false;
$hero_bg = 'assets/images/Carrers.jpg';
?>

<?php include 'includes/hero.php'; ?>
```

---

### contact.php (Contact Page)

```php
<?php
$hero_title = "Contact Us";
$hero_subtitle = "Let's Power a Greener Future Together";
$hero_description = "Have questions about solar solutions? Planning to switch to renewable energy? Our team is here to guide you every step of the way.";
$hero_buttons = [
    ['url' => '#contact-form', 'text' => 'Send Message'],
    ['url' => 'tel:+917539944358', 'text' => 'Call Us Now']
];
$hero_slider = false;
$hero_bg = 'assets/images/contact.jpg';
?>

<?php include 'includes/hero.php'; ?>
```

---

## 🎨 CSS (Already in css/hero.css)

The CSS is already created in `css/hero.css`. Make sure it's included in all pages:

```html
<link rel="stylesheet" href="css/hero.css">
```

---

## ✅ Implementation Checklist

For each page:

1. ✅ Add `<link rel="stylesheet" href="css/hero.css">` in `<head>`
2. ✅ Define hero variables before `<body>` or at top of page
3. ✅ Replace existing hero HTML with `<?php include 'includes/hero.php'; ?>`
4. ✅ Test responsive behavior
5. ✅ Verify slider/background works
6. ✅ Check button links

---

## 🔧 Customization Options

### No Buttons
```php
// Simply don't define $hero_buttons or set it to empty array
$hero_buttons = [];
```

### No Subtitle
```php
// Simply don't define $hero_subtitle
```

### Single Button
```php
$hero_buttons = [
    ['url' => 'contact.php', 'text' => 'Contact Us']
];
```

---

## 📱 Responsive Behavior

- **Desktop (>968px)**: Logo left (200px), text right-aligned
- **Tablet (≤968px)**: Stacked, logo centered (160px)
- **Mobile (≤640px)**: Stacked, logo centered (140px), full-width buttons

---

## 🎉 Benefits

✅ Single source of truth (no code duplication)
✅ Easy to update all pages at once
✅ Consistent design across website
✅ Dynamic content per page
✅ Supports both slider and static backgrounds
✅ Optional buttons and subtitle
✅ Fully responsive
✅ Maintains exact index.php layout
