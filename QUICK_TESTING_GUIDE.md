# Quick Testing Guide - 15 Minutes

## Test 1: Home Page Form (3 minutes)

### Valid Submission
1. Go to `index.php`
2. Scroll to "Get a Free Consultation" section
3. Fill form:
   - Name: "John Smith"
   - Email: "john@example.com"
   - Message: "I'm interested in solar solutions"
4. Click "Submit Request"
5. ✅ Verify: Success message appears

### Invalid Submission
1. Try to submit with:
   - Name: "123" (numbers)
   - Email: "invalid-email"
   - Message: "Hi" (too short)
2. ✅ Verify: Error messages display

---

## Test 2: Contact Page Form (3 minutes)

### Valid Submission
1. Go to `contact.php`
2. Scroll to contact form
3. Fill form:
   - Name: "Jane Doe"
   - Email: "jane@example.com"
   - Phone: "9876543210"
   - Message: "I want to know more about your services"
4. Click "Send Message"
5. ✅ Verify: Success message appears

### Invalid Submission
1. Try to submit with:
   - Phone: "1234567890" (invalid format)
   - Email: "not-an-email"
2. ✅ Verify: Error messages display

---

## Test 3: About Page Mission Section (3 minutes)

### Desktop (1200px+)
1. Go to `about.php`
2. Scroll to "Our Mission" section
3. ✅ Verify:
   - Icon on left side
   - Text on right side
   - Icon is 150px
   - Text is left-aligned
   - Heading is 2.5rem

### Tablet (768px - 1199px)
1. Resize browser to 900px width
2. Scroll to "Our Mission" section
3. ✅ Verify:
   - Icon above text (vertical stack)
   - Icon is 140px
   - Text is centered
   - Heading is 2.2rem

### Mobile (480px - 767px)
1. Resize browser to 600px width
2. Scroll to "Our Mission" section
3. ✅ Verify:
   - Icon above text (vertical stack)
   - Icon is 110px
   - Text is centered
   - Heading is 1.9rem
   - No horizontal scroll

---

## Test 4: CSRF Protection (3 minutes)

### Check Token Presence
1. Go to `index.php`
2. Open browser DevTools (F12)
3. Go to Console tab
4. Type: `document.querySelector('input[name="csrf_token"]').value`
5. ✅ Verify: Token value displays (long hex string)

### Check Token Validation
1. Go to `contact.php`
2. Open DevTools
3. Go to Network tab
4. Fill and submit form
5. ✅ Verify: Form submits successfully with token

---

## Test 5: Responsive Design (3 minutes)

### Mobile View
1. Open DevTools (F12)
2. Click device toggle (mobile icon)
3. Select "iPhone 12" or similar
4. Navigate through all pages
5. ✅ Verify:
   - No horizontal scroll
   - Text readable
   - Buttons clickable
   - Forms work

### Tablet View
1. Select "iPad" or similar
2. Navigate through all pages
3. ✅ Verify:
   - Layout looks good
   - Mission section stacked
   - Forms work

---

## Quick Checklist

- [ ] Home page form submits
- [ ] Contact page form submits
- [ ] Error messages display
- [ ] Success messages display
- [ ] CSRF token present
- [ ] Mission section responsive
- [ ] No console errors
- [ ] No broken links
- [ ] Mobile layout works
- [ ] Tablet layout works

---

## If Issues Found

1. Check browser console for errors (F12)
2. Check server error logs
3. Verify all files uploaded correctly
4. Clear browser cache (Ctrl+Shift+Delete)
5. Test in incognito/private mode

---

## Success Criteria

✅ All tests pass = Ready for production  
❌ Any test fails = Review and fix before deployment

---

**Estimated Time:** 15 minutes  
**Difficulty:** Easy  
**No technical knowledge required**
