// BK Green Energy — careers.js
// Intercepts the careers application form and sends data to WhatsApp via wa.me

(function () {
    'use strict';

    // ── CONFIG ─────────────────────────────────────────────
    var WA_NUMBER = '917539944358'; // +91 75399 44358

    // ── FIELD IDS ──────────────────────────────────────────
    var FIELDS = {
        name:     'c-name',
        email:    'c-email',
        phone:    'c-phone',
        position: 'c-position',
        resume:   'c-resume',
        message:  'c-message'
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

    // ── RESUME NOTICE ──────────────────────────────────────
    // Shows a persistent info banner explaining resume must be emailed separately.
    function showResumeNotice() {
        var existing = document.getElementById('resume-wa-notice');
        if (existing) return;

        var wrap = document.getElementById(FIELDS.resume);
        if (!wrap) return;
        var container = wrap.closest('.cform-group') || wrap.parentNode;

        var notice    = document.createElement('div');
        notice.id     = 'resume-wa-notice';
        notice.style.cssText = [
            'display:flex',
            'align-items:flex-start',
            'gap:0.55rem',
            'background:rgba(255,183,3,0.12)',
            'border:1px solid rgba(255,183,3,0.45)',
            'border-radius:0.65rem',
            'padding:0.75rem 0.9rem',
            'margin-top:0.6rem',
            'font-size:0.85rem',
            'line-height:1.5',
            'color:#7a5800'
        ].join(';');

        notice.innerHTML =
            '<i class="fas fa-info-circle" style="margin-top:0.15rem;flex-shrink:0;color:#f59e0b;"></i>' +
            '<span>' +
                '<strong>Resume cannot be sent via WhatsApp.</strong> ' +
                'Please email your resume to ' +
                '<a href="mailto:careers@bkgreenenergy.com" ' +
                   'style="color:#0f6a33;font-weight:700;text-decoration:underline;">' +
                    'careers@bkgreenenergy.com' +
                '</a> ' +
                'after submitting this form.' +
            '</span>';

        container.appendChild(notice);
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

        if (!data.position) {
            setError(FIELDS.position, 'Please select a position.'); ok = false;
        } else { clearError(FIELDS.position); }

        return ok;
    }

    // ── BUILD WHATSAPP MESSAGE ──────────────────────────────
    function buildMessage(d) {
        var lines = [
            '💼 *Job Application — BK Green Energy*',
            '',
            '👤 *Name:*      ' + d.name,
            '📧 *Email:*     ' + d.email,
            '📞 *Phone:*     +91 ' + d.phone,
            '🔧 *Position:*  ' + d.position,
            ''
        ];

        if (d.message) {
            lines.push('📝 *Cover Message:*');
            lines.push(d.message);
            lines.push('');
        }

        lines.push('📎 *Resume:* Will be emailed to careers@bkgreenenergy.com');
        lines.push('');
        lines.push('─────────────────────');
        lines.push('Sent via bkgreenenergy.com/careers');

        return lines.join('\n');
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

    // ── SUCCESS BANNER ─────────────────────────────────────
    function showSuccess(form) {
        var banner = document.getElementById('formSuccess');
        if (!banner) return;
        banner.style.display = 'flex';
        banner.innerHTML =
            '<i class="fas fa-check-circle" style="margin-right:0.5rem;color:#22c55e;"></i>' +
            'Application sent! Please also email your resume to ' +
            '<a href="mailto:careers@bkgreenenergy.com" ' +
               'style="color:#0f6a33;font-weight:700;margin-left:0.25rem;">' +
                'careers@bkgreenenergy.com' +
            '</a>.';
        setTimeout(function () { banner.style.display = 'none'; }, 10000);
    }

    // ── SUBMIT HANDLER ─────────────────────────────────────
    function onSubmit(e) {
        e.preventDefault();

        var data = {
            name:     val(FIELDS.name),
            email:    val(FIELDS.email),
            phone:    val(FIELDS.phone),
            position: val(FIELDS.position),
            message:  val(FIELDS.message)
        };

        if (!validate(data)) return;

        var btn = e.target.querySelector('button[type="submit"]');
        setBtn(btn, true);

        var url = 'https://wa.me/' + WA_NUMBER + '?text=' + encodeURIComponent(buildMessage(data));
        window.open(url, '_blank', 'noopener,noreferrer');

        setTimeout(function () {
            setBtn(btn, false);
            showSuccess(e.target);
            e.target.reset();
            document.getElementById('fileLabel').textContent = 'Choose file (PDF, DOC — max 5MB)';
            Object.values(FIELDS).forEach(clearError);
        }, 3000);
    }

    // ── FILE UPLOAD LABEL (existing behaviour kept) ────────
    function initFileUpload() {
        var input = document.getElementById(FIELDS.resume);
        var label = document.getElementById('fileLabel');
        if (!input || !label) return;
        input.addEventListener('change', function () {
            label.textContent = input.files.length
                ? input.files[0].name
                : 'Choose file (PDF, DOC — max 5MB)';
        });
    }

    // ── INIT ───────────────────────────────────────────────
    function init() {
        showResumeNotice();
        initFileUpload();

        var form = document.getElementById('careersForm');
        if (!form) return;

        form.addEventListener('submit', onSubmit);

        // clear field error on next keystroke
        Object.values(FIELDS).forEach(function (id) {
            var el = document.getElementById(id);
            if (el) el.addEventListener('input', function () { clearError(id); });
        });
    }

    document.readyState === 'loading'
        ? document.addEventListener('DOMContentLoaded', init)
        : init();

})();
