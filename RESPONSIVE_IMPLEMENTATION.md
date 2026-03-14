# BK GREEN ENERGY - RESPONSIVE IMPLEMENTATION GUIDE

## FILES CREATED:
1. css/no-flash-global.css (FOUC prevention)
2. css/global-responsive.css (Main responsive system)
3. js/no-flash-global.js (FOUC removal script)

## EXACT <HEAD> ORDER FOR ALL PAGES:

```html
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- 1. NO-FLASH CSS - MUST BE FIRST -->
    <link rel="stylesheet" href="css/no-flash-global.css">
    
    <!-- 2. BOOTSTRAP (if used) -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- 3. FONT AWESOME (if used) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- 4. GLOBAL RESPONSIVE CSS -->
    <link rel="stylesheet" href="css/global-responsive.css">
    
    <!-- 5. PAGE-SPECIFIC CSS -->
    <link rel="stylesheet" href="css/careers.css">
    <!-- OR -->
    <link rel="stylesheet" href="css/about.css">
    <!-- OR -->
    <link rel="stylesheet" href="css/services.css">
    <!-- etc. -->
    
    <!-- 6. FOOTER CSS -->
    <link rel="stylesheet" href="css/footer.css">
    
    <title>Page Title</title>
</head>
```

## EXACT <BODY> CLOSING:

```html
    <!-- Your page content -->
    
    <!-- NO-FLASH JS - BEFORE CLOSING </body> -->
    <script src="js/no-flash-global.js"></script>
    
    <!-- Other scripts -->
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
```

## APPLY TO THESE PAGES:
- index.php
- about.php
- services.php
- projects.php
- careers.php
- contact.php

## WHAT THIS FIXES:
✅ Navbar consistent size/alignment (desktop + mobile)
✅ Mobile navbar brand centered on all pages
✅ Typography consistent with clamp()
✅ Grids responsive (3→2→1 columns)
✅ Careers grid (3 top, 2 centered)
✅ Footer consistent layout
✅ No horizontal overflow
✅ No FOUC/blinking between pages
✅ All pages load smoothly

## REMOVE FROM PAGE-SPECIFIC CSS:
Delete these from about.css, services.css, careers.css, etc.:
- Navbar font-size overrides
- Custom navbar padding/height
- Brand text font-size
- Any !important navbar rules

Keep only page-specific content styles (hero backgrounds, section colors, etc.)
