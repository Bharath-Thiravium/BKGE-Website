# Manual Fixes Required - Step by Step Guide

## Overview
7 critical issues have been automatically fixed. 4 high-priority issues require manual fixes. Follow this guide to complete them.

---

## MANUAL FIX #1: Add Session Start to index.php

**File:** `index.php`  
**Location:** Top of PHP block (before line 1)  
**Time:** 2 minutes

### Current Code (Lines 1-5):
```php
<?php
// Form submission handler
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
```

### Replace With:
```php
<?php
// Start session for CSRF token
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Generate CSRF token if not exists
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Form submission handler
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verify CSRF token
    if (empty($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $errors = ["Security token validation failed. Please try again."];
    } else {
        $name = trim($_POST['name'] ?? '');
```

### Then Find (Around line 30):
```php
    // Send email if no errors
    if (empty($errors)) {
```

### Replace With:
```php
    }
    // Send email if no errors
    if (empty($errors)) {
```

---

## MANUAL FIX #2: Add CSRF Validation to contact.php

**File:** `contact.php`  
**Location:** Top of PHP block (before line 1)  
**Time:** 2 minutes

### Current Code (Lines 1-5):
```php
<?php
// Form submission handler
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
```

### Replace With:
```php
<?php
// Start session for CSRF token
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Generate CSRF token if not exists
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Form submission handler
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verify CSRF token
    if (empty($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $errors = ["Security token validation failed. Please try again."];
    } else {
        $name = trim($_POST['name'] ?? '');
```

### Then Find (Around line 30):
```php
    // Send email if no errors
    if (empty($errors)) {
```

### Replace With:
```php
    }
    // Send email if no errors
    if (empty($errors)) {
```

---

## MANUAL FIX #3: Rename Mission Section Class

**File:** `about.php`  
**Location:** Line 95  
**Time:** 1 minute

### Current Code (Line 95):
```html
     <!-- VISION SECTION -->
    <section class="vision-section">
        <div class="container">
            <div class="vision-content">
                <div class="vision-image fade-up">
                    <div class="icon-circle">
                        <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="50" r="35" fill="none" stroke="#0f7c3a" stroke-width="2" />
                            <path d="M 50 20 L 55 40 L 75 40 L 60 52 L 65 72 L 50 60 L 35 72 L 40 52 L 25 40 L 45 40 Z"
                                fill="#0f7c3a" />
                        </svg>
                    </div>
                    <div class="accent-line"></div>
                </div>
                <div class="vision-text fade-up">
                    <h2>Our Mission</h2>
```

### Replace With:
```html
     <!-- MISSION SECTION -->
    <section class="mission-section">
        <div class="container">
            <div class="mission-content">
                <div class="mission-image fade-up">
                    <div class="icon-circle">
                        <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="50" r="35" fill="none" stroke="#0f7c3a" stroke-width="2" />
                            <path d="M 50 20 L 55 40 L 75 40 L 60 52 L 65 72 L 50 60 L 35 72 L 40 52 L 25 40 L 45 40 Z"
                                fill="#0f7c3a" />
                        </svg>
                    </div>
                    <div class="accent-line"></div>
                </div>
                <div class="mission-text fade-up">
                    <h2>Our Mission</h2>
```

### Also Replace (Line 120):
```html
                </div></p>
                </div>
            </div>
        </div>
    </section>
```

With:
```html
                </div>
                </div>
            </div>
        </div>
    </section>
```

---

## MANUAL FIX #4: Add Mission Section CSS

**File:** `css/about.css`  
**Location:** End of file (after last CSS rule)  
**Time:** 3 minutes

### Add This CSS:
```css
/* ===================================
   MISSION SECTION - SEPARATE FROM VISION
   =================================== */

.mission-section {
    padding: 100px 20px;
    background: #90cf4d;
}

.mission-section .container {
    max-width: 1200px;
    margin: 0 auto;
}

.mission-content {
    display: flex;
    gap: 60px;
    align-items: center;
    background: var(--white);
    padding: 50px;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
}

.mission-image {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.mission-text {
    flex: 2;
}

.mission-text h2 {
    font-size: 2.5rem;
    color: var(--primary-green);
    margin-bottom: 20px;
    font-weight: 700;
}

.mission-text p {
    font-size: 1.2rem;
    line-height: 1.8;
    color: #555;
    margin-bottom: 15px;
}

/* Tablet responsive */
@media (max-width: 968px) {
    .mission-content {
        flex-direction: column;
        text-align: center;
        gap: 30px;
    }

    .mission-text h2 {
        font-size: 2rem;
    }

    .mission-text p {
        font-size: 1.05rem;
    }
}

/* Mobile responsive */
@media (max-width: 768px) {
    .mission-section {
        padding: 60px 20px;
    }

    .mission-content {
        flex-direction: column;
        padding: 30px 20px;
        gap: 20px;
    }

    .mission-text h2 {
        font-size: 1.8rem;
    }

    .mission-text p {
        font-size: 1rem;
        line-height: 1.7;
    }
}
```

---

## VERIFICATION CHECKLIST

After applying all manual fixes, verify:

### ✅ index.php
- [ ] Session starts at top of file
- [ ] CSRF token generated
- [ ] CSRF token field in form
- [ ] Form validates token
- [ ] Form still submits correctly

### ✅ contact.php
- [ ] Session starts at top of file
- [ ] CSRF token generated
- [ ] CSRF token field in form
- [ ] Form validates token
- [ ] Error messages display
- [ ] Success message displays

### ✅ about.php
- [ ] Mission section uses `mission-section` class
- [ ] Mission section uses `mission-content` class
- [ ] Mission section uses `mission-image` class
- [ ] Mission section uses `mission-text` class
- [ ] No more `</p>` tag errors

### ✅ css/about.css
- [ ] Mission section CSS added
- [ ] Responsive styles included
- [ ] No CSS errors

---

## TESTING AFTER FIXES

### Test 1: Form Submission (index.php)
1. Go to home page
2. Scroll to "Get a Free Consultation" section
3. Fill in form with valid data
4. Click "Submit Request"
5. Verify success message appears
6. Verify email is sent

### Test 2: Form Validation (index.php)
1. Go to home page
2. Try to submit form with invalid name (numbers)
3. Verify error message displays
4. Try to submit with invalid email
5. Verify error message displays

### Test 3: Form Submission (contact.php)
1. Go to contact page
2. Fill in form with valid data
3. Click "Send Message"
4. Verify success message appears
5. Verify email is sent

### Test 4: Form Validation (contact.php)
1. Go to contact page
2. Try to submit form with invalid phone
3. Verify error message displays
4. Try to submit with invalid email
5. Verify error message displays

### Test 5: About Page
1. Go to about page
2. Scroll to "Our Mission" section
3. Verify section displays correctly
4. Verify styling matches "Our Vision" section
5. Verify responsive on mobile

### Test 6: CSRF Protection
1. Open browser console
2. Go to home page
3. Check that CSRF token is in form
4. Verify token value is not empty
5. Repeat for contact page

---

## DEPLOYMENT STEPS

### Step 1: Backup
```bash
# Backup current files
cp index.php index.php.backup
cp contact.php contact.php.backup
cp about.php about.php.backup
cp css/about.css css/about.css.backup
```

### Step 2: Apply Fixes
1. Apply Manual Fix #1 to index.php
2. Apply Manual Fix #2 to contact.php
3. Apply Manual Fix #3 to about.php
4. Apply Manual Fix #4 to css/about.css

### Step 3: Test Locally
1. Run all tests from "Testing After Fixes" section
2. Check console for errors
3. Verify all forms work
4. Test on mobile, tablet, desktop

### Step 4: Deploy
1. Upload fixed files to server
2. Clear browser cache
3. Test on production
4. Monitor for errors

### Step 5: Verify
1. Check all pages load
2. Test forms
3. Verify emails send
4. Check console for errors
5. Monitor error logs

---

## TROUBLESHOOTING

### Issue: CSRF token not working
**Solution:** Ensure `session_start()` is called before any output

### Issue: Forms not submitting
**Solution:** Check that CSRF token field is in form and token is valid

### Issue: Mission section styling wrong
**Solution:** Verify CSS class names match HTML class names

### Issue: Emails not sending
**Solution:** Check mail() function is enabled on server

### Issue: Error messages not showing
**Solution:** Verify error display code is in form

---

## ESTIMATED TIME

- Manual Fix #1: 2 minutes
- Manual Fix #2: 2 minutes
- Manual Fix #3: 1 minute
- Manual Fix #4: 3 minutes
- Testing: 15 minutes
- Deployment: 5 minutes

**Total: ~30 minutes**

---

## SUPPORT

If you encounter issues:
1. Check the troubleshooting section
2. Review the PRODUCTION_QA_REPORT.md
3. Check CRITICAL_FIXES_APPLIED.md
4. Verify all code changes match exactly

