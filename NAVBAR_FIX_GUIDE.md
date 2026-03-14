# Navbar Consistency Fix - Implementation Guide

## Problem Identified
The navbar had inconsistent font sizes across different pages:
- **careers.css**: 22px (desktop), 18px (mobile)
- **projects.css**: 33px (desktop)
- **contact.css**: 32px (desktop)
- **services.css**: 32px (desktop)
- **about.css**: 20px (desktop)

## Solution Implemented

### 1. Created Shared Navbar CSS
**File**: `css/navbar-shared.css`

**Standardized Sizes**:
- Brand text: 22px (desktop), 18px (mobile)
- Nav links: 18px (desktop), 16px (mobile)
- Contact button: 18px (desktop), 16px (mobile)

### 2. Updated careers.php
- Added `<link rel="stylesheet" href="css/navbar-shared.css">` before careers.css
- Removed conflicting navbar styles from careers.css

### 3. Next Steps - Apply to All Pages

Add this line to the `<head>` section of each page (after bootstrap.min.css, before page-specific CSS):

```html
<link rel="stylesheet" href="css/navbar-shared.css">
```

**Pages to update**:
- ✅ careers.php (DONE)
- ⬜ index.php
- ⬜ about.php
- ⬜ services.php
- ⬜ projects.php
- ⬜ contact.php

### 4. Remove Conflicting Styles

From each page-specific CSS file, remove or comment out:
- `.navbar-brand` font-size declarations
- `.brand-text` font-size declarations
- `.custom-navbar .nav-link` font-size declarations
- Any navbar-specific sizing overrides

**Files to clean**:
- ✅ css/careers.css (DONE)
- ⬜ css/style.css
- ⬜ css/contact.css
- ⬜ css/projects.css
- ⬜ css/services.css
- ⬜ css/about.css

## Final Result

All pages will have:
- **Desktop**: Brand 22px, Links 18px
- **Mobile**: Brand 18px, Links 16px
- Same font weight (900 for brand, 700 for links)
- Same spacing and alignment
- Same hover effects
- Same responsive behavior

## Testing Checklist

After applying to all pages, verify:
- [ ] Brand text size matches on all pages
- [ ] Nav link sizes match on all pages
- [ ] Vertical alignment is consistent
- [ ] Mobile responsive behavior works
- [ ] Hover effects work correctly
- [ ] No visual jumps when navigating between pages
