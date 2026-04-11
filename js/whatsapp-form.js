// BK Green Energy — WhatsApp Form Handler
// Validates the consultation form and opens a pre-filled WhatsApp chat.

(function () {
    'use strict';

    // ── CONFIG ─────────────────────────────────────────────
    // Indian number format: country code 91 + 10-digit mobile (no + or spaces)
    var WA_NUMBER = '917539944358'; // +91 75399 44358

    // ── HELPERS ────────────────────────────────────────────
    function getVal(id) {
        var el = document.getElementById(id);
        return el ? el.value.trim() : '';
    }

    function showError(id, msg) {
        var el = document.getElementById(id);
        if (!el) return;
        el.style.borderColor = '#e53935';
        el.style.boxShadow   = '0 0 0 3px rgba(229,57,53,0.18)';

        // insert or update inline error text
        var errId  = id + '-err';
        var errEl  = document.getElementById(errId);
        if (!errEl) {
            errEl    = document.createElement('span');
            errEl.id = errId;
            errEl.style.cssText = 'display:block;color:#ff6b6b;font-size:0.82rem;margin-top:0.3rem;';
            el.parentNode.insertBefore(errEl, el.nextSibling);
        }
        errEl.textContent = msg;
    }

    function clearError(id) {
        var el = document.getElementById(id);
        if (!el) return;
        el.style.borderColor = '';
        el.style.boxShadow   = '';
        var errEl = document.getElementById(id + '-err');
        if (errEl) errEl.textContent = '';
    }

    function validate(name, email, phone, message) {
        var valid = true;

        // Name: 2–50 letters and spaces
        if (!name || !/^[A-Za-z ]{2,50}$/.test(name)) {
            showError('wf-name', 'Enter a valid name (letters only, 2–50 chars).');
            valid = false;
        } else { clearError('wf-name'); }

        // Email: basic RFC format
        if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            showError('wf-email', 'Enter a valid email address.');
            valid = false;
        } else { clearError('wf-email'); }

        // Phone: Indian mobile — starts with 6-9, exactly 10 digits
        if (!phone || !/^[6-9][0-9]{9}$/.test(phone)) {
            showError('wf-phone', 'Enter a valid 10-digit Indian mobile number.');
            valid = false;
        } else { clearError('wf-phone'); }

        // Message: 5–1000 characters
        if (!message || message.length < 5 || message.length > 1000) {
            showError('wf-message', 'Message must be between 5 and 1000 characters.');
            valid = false;
        } else { clearError('wf-message'); }

        return valid;
    }

    // ── BUILD WHATSAPP MESSAGE ──────────────────────────────
    function buildMessage(name, email, phone, message) {
        return [
            '🌿 *New Consultation Request — BK Green Energy*',
            '',
            '👤 *Name:* '    + name,
            '📧 *Email:* '   + email,
            '📞 *Phone:* +91 ' + phone,
            '',
            '💬 *Message:*',
            message,
            '',
            '─────────────────────',
            'Sent via bkgreenenergy.com'
        ].join('\n');
    }

    // ── SUBMIT HANDLER ─────────────────────────────────────
    function onSubmit(e) {
        e.preventDefault();

        var name    = getVal('wf-name');
        var email   = getVal('wf-email');
        var phone   = getVal('wf-phone');
        var message = getVal('wf-message');

        if (!validate(name, email, phone, message)) return;

        var text = buildMessage(name, email, phone, message);
        var url  = 'https://wa.me/' + WA_NUMBER + '?text=' + encodeURIComponent(text);

        // Open WhatsApp in a new tab
        window.open(url, '_blank', 'noopener,noreferrer');

        // Visual feedback — reset form after short delay
        var btn = e.target.querySelector('button[type="submit"]');
        if (btn) {
            var original = btn.innerHTML;
            btn.innerHTML  = '<i class="fab fa-whatsapp" style="margin-right:0.45rem;"></i> Opening WhatsApp…';
            btn.disabled   = true;
            setTimeout(function () {
                btn.innerHTML = original;
                btn.disabled  = false;
                e.target.reset();
            }, 3000);
        }
    }

    // ── INIT ───────────────────────────────────────────────
    function init() {
        var form = document.getElementById('whatsappForm');
        if (!form) return;
        form.addEventListener('submit', onSubmit);

        // Clear field errors on input so feedback is instant
        ['wf-name', 'wf-email', 'wf-phone', 'wf-message'].forEach(function (id) {
            var el = document.getElementById(id);
            if (el) el.addEventListener('input', function () { clearError(id); });
        });
    }

    document.readyState === 'loading'
        ? document.addEventListener('DOMContentLoaded', init)
        : init();

})();
