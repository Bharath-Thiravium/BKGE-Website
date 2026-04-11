// BK Green Energy — contact.js
// Intercepts the contact form and sends data to WhatsApp via wa.me

(function () {
    'use strict';

    // ── CONFIG ─────────────────────────────────────────────
    var WA_NUMBER = '917539944358'; // +91 75399 44358

    // ── FIELD IDS ──────────────────────────────────────────
    var FIELDS = {
        name:    'ct-name',
        email:   'ct-email',
        phone:   'ct-phone',
        subject: 'ct-subject',
        message: 'ct-message'
    };

    // ── HELPERS ────────────────────────────────────────────
    function val(id) {
        var el = document.getElementById(id);
        return el ? el.value.trim() : '';
    }

    function setError(id, msg) {
        var el = document.getElementById(id);
        if (!el) return;
        el.style.borderColor = '#e53935';
        el.style.boxShadow   = '0 0 0 3px rgba(229,57,53,0.18)';
        var errId = id + '-err';
        var err   = document.getElementById(errId);
        if (!err) {
            err    = document.createElement('span');
            err.id = errId;
            err.style.cssText = 'display:block;color:#e53935;font-size:0.8rem;margin-top:0.3rem;font-weight:500;';
            el.parentNode.appendChild(err);
        }
        err.textContent = msg;
    }

    function clearError(id) {
        var el = document.getElementById(id);
        if (!el) return;
        el.style.borderColor = '';
        el.style.boxShadow   = '';
        var err = document.getElementById(id + '-err');
        if (err) err.textContent = '';
    }

    // ── VALIDATION ─────────────────────────────────────────
    function validate(data) {
        var ok = true;

        if (!data.name || !/^[A-Za-z ]{2,50}$/.test(data.name)) {
            setError(FIELDS.name, 'Enter a valid name (letters only, 2–50 chars).'); ok = false;
        } else { clearError(FIELDS.name); }

        if (!data.email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(data.email)) {
            setError(FIELDS.email, 'Enter a valid email address.'); ok = false;
        } else { clearError(FIELDS.email); }

        if (!data.phone || !/^[6-9][0-9]{9}$/.test(data.phone)) {
            setError(FIELDS.phone, 'Enter a valid 10-digit Indian mobile number.'); ok = false;
        } else { clearError(FIELDS.phone); }

        if (!data.subject || data.subject.length < 3) {
            setError(FIELDS.subject, 'Subject is required (min 3 characters).'); ok = false;
        } else { clearError(FIELDS.subject); }

        if (!data.message || data.message.length < 5 || data.message.length > 1000) {
            setError(FIELDS.message, 'Message must be between 5 and 1000 characters.'); ok = false;
        } else { clearError(FIELDS.message); }

        return ok;
    }

    // ── BUILD WHATSAPP MESSAGE ──────────────────────────────
    function buildMessage(d) {
        return [
            '📩 *New Contact Enquiry — BK Green Energy*',
            '',
            '👤 *Name:*    ' + d.name,
            '📧 *Email:*   ' + d.email,
            '📞 *Phone:*   +91 ' + d.phone,
            '📌 *Subject:* ' + d.subject,
            '',
            '💬 *Message:*',
            d.message,
            '',
            '─────────────────────',
            'Sent via bkgreenenergy.com/contact'
        ].join('\n');
    }

    // ── BUTTON STATE ───────────────────────────────────────
    function setBtn(btn, loading) {
        if (!btn) return;
        if (loading) {
            btn.dataset.orig = btn.innerHTML;
            btn.innerHTML    = '<i class="fab fa-whatsapp" style="margin-right:0.4rem;"></i> Opening WhatsApp…';
            btn.disabled     = true;
        } else {
            btn.innerHTML = btn.dataset.orig || btn.innerHTML;
            btn.disabled  = false;
        }
    }

    // ── SUBMIT HANDLER ─────────────────────────────────────
    function onSubmit(e) {
        e.preventDefault();

        var data = {
            name:    val(FIELDS.name),
            email:   val(FIELDS.email),
            phone:   val(FIELDS.phone),
            subject: val(FIELDS.subject),
            message: val(FIELDS.message)
        };

        if (!validate(data)) return;

        var btn = e.target.querySelector('button[type="submit"]');
        setBtn(btn, true);

        var url = 'https://wa.me/' + WA_NUMBER + '?text=' + encodeURIComponent(buildMessage(data));
        window.open(url, '_blank', 'noopener,noreferrer');

        setTimeout(function () {
            setBtn(btn, false);
            e.target.reset();
            // clear all inline errors after reset
            Object.values(FIELDS).forEach(clearError);
        }, 3000);
    }

    // ── INPUT EFFECTS (existing behaviour kept) ────────────
    function initInputEffects() {
        document.querySelectorAll('.cform-group input, .cform-group textarea').forEach(function (el) {
            function toggle() { el.classList.toggle('has-value', el.value.trim() !== ''); }
            el.addEventListener('input', toggle);
            toggle();
        });
    }

    // ── SMOOTH SCROLL (existing behaviour kept) ────────────
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(function (a) {
            a.addEventListener('click', function (e) {
                var target = document.querySelector(this.getAttribute('href'));
                if (!target) return;
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            });
        });
    }

    // ── INIT ───────────────────────────────────────────────
    function init() {
        var form = document.getElementById('contact-form');
        if (form) {
            form.addEventListener('submit', onSubmit);
            // clear field error on next keystroke
            Object.values(FIELDS).forEach(function (id) {
                var el = document.getElementById(id);
                if (el) el.addEventListener('input', function () { clearError(id); });
            });
        }
        initInputEffects();
        initSmoothScroll();
    }

    document.readyState === 'loading'
        ? document.addEventListener('DOMContentLoaded', init)
        : init();

})();
