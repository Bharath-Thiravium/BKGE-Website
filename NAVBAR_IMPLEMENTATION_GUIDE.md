# UNIFIED MOBILE NAVBAR - IMPLEMENTATION GUIDE

## Files Created:
1. `/includes/navbar.php` - Shared navbar HTML
2. `/css/mobile-navbar.css` - Unified mobile navbar styles
3. `/js/mobile-navbar.js` - Auto-close menu on link click

## How to Update Each Page:

### STEP 1: Add CSS Link (in <head> section)
Find this line:
```html
<link rel="stylesheet" href="css/bootstrap.min.css">
```

Add this line RIGHT AFTER it:
```html
<link rel="stylesheet" href="css/mobile-navbar.css">
```

### STEP 2: Replace Navbar HTML
Find the entire `<nav>` section (starts with `<nav class="navbar"...` and ends with `</nav>`)

Replace it with:
```php
<?php include 'includes/navbar.php'; ?>
```

### STEP 3: Add JS Script (before </body>)
Find this line:
```html
<script src="js/bootstrap.bundle.min.js"></script>
```

Add this line RIGHT AFTER it:
```html
<script src="js/mobile-navbar.js"></script>
```

## Pages to Update:
- ✅ contact.php (DONE - example)
- ⬜ index.php
- ⬜ about.php
- ⬜ services.php
- ⬜ projects.php
- ⬜ careers.php

## Features:
✅ Green pill navbar on mobile (92% width, centered)
✅ White brand text on left
✅ White hamburger icon on right (always visible)
✅ Centered dropdown menu (88% width, max 320px)
✅ White background with rounded corners
✅ Vertical stacked links
✅ Auto-close on link click
✅ Desktop navbar unchanged
✅ No horizontal scroll or white gaps
✅ Works on all pages consistently

## Testing:
1. Open each page on mobile (or resize browser to < 768px)
2. Verify green pill navbar appears
3. Click hamburger - dropdown should appear centered
4. Click any link - menu should close automatically
5. Check desktop view - should show normal horizontal navbar
