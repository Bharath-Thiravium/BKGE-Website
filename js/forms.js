/**
 * BK Green Energy — Unified Form Handler
 * Covers: consultation (index.php), contact (contact.php), careers (careers.php)
 */

(function () {
    'use strict';

    // ── Shared helpers ───────────────────────────────────────────────────────

    function showMsg(el, status, text) {
        el.textContent = text;
        el.style.display = 'block';
        if (status === 'success') {
            el.style.background = '#e8f7dc';
            el.style.color      = '#1d5d28';
            el.style.border     = '1px solid #bde0aa';
        } else {
            el.style.background = '#fff0ef';
            el.style.color      = '#a0342c';
            el.style.border     = '1px solid #f1c5c0';
        }
        el.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    function setLoading(btn, loading) {
        if (loading) {
            btn.disabled             = true;
            btn.dataset.originalText = btn.innerHTML;
            btn.innerHTML            = '<i class="fas fa-spinner fa-spin" style="margin-right:0.45rem;"></i> Sending…';
        } else {
            btn.disabled  = false;
            btn.innerHTML = btn.dataset.originalText;
        }
    }

    async function submitForm(form, msgEl) {
        const btn  = form.querySelector('[type="submit"]');
        const data = new FormData(form);

        setLoading(btn, true);
        msgEl.style.display = 'none';

        try {
            const res  = await fetch('send_mail.php', { method: 'POST', body: data });
            const json = await res.json();

            if (json.status === 'success') {
                showMsg(msgEl, 'success', json.message);
                form.reset();
                // Reset file label if present
                const fileLabel = form.querySelector('#fileLabel');
                if (fileLabel) fileLabel.textContent = 'Choose file (PDF, DOC — max 5MB)';
            } else {
                showMsg(msgEl, 'error', json.message || 'Something went wrong. Please try again.');
            }
        } catch (err) {
            showMsg(msgEl, 'error', 'Network error. Please check your connection and try again.');
        } finally {
            setLoading(btn, false);
        }
    }

    // ── 1. Consultation form (index.php) ─────────────────────────────────────
    const consultationForm = document.getElementById('consultationForm');
    const consultationMsg  = document.getElementById('consultationMsg');

    if (consultationForm && consultationMsg) {
        consultationForm.addEventListener('submit', function (e) {
            e.preventDefault();
            submitForm(consultationForm, consultationMsg);
        });
    }

    // ── 2. Contact form (contact.php) ────────────────────────────────────────
    const contactForm = document.getElementById('contactForm');
    const contactMsg  = document.getElementById('contactMsg');

    if (contactForm && contactMsg) {
        contactForm.addEventListener('submit', function (e) {
            e.preventDefault();
            submitForm(contactForm, contactMsg);
        });
    }

    // ── 3. Careers form (careers.php) ────────────────────────────────────────
    const careersForm = document.getElementById('careersForm');
    const careersMsg  = document.getElementById('careersMsg');

    if (careersForm && careersMsg) {
        // Show selected filename in the custom label
        const resumeInput = document.getElementById('c-resume');
        const fileLabel   = document.getElementById('fileLabel');

        if (resumeInput && fileLabel) {
            resumeInput.addEventListener('change', function () {
                fileLabel.textContent = this.files[0]
                    ? this.files[0].name
                    : 'Choose file (PDF, DOC — max 5MB)';
            });
        }

        careersForm.addEventListener('submit', function (e) {
            e.preventDefault();

            // Client-side file validation before sending
            if (resumeInput && resumeInput.files[0]) {
                const file        = resumeInput.files[0];
                const maxSize     = 5 * 1024 * 1024;
                const allowedExts = ['pdf', 'doc', 'docx'];
                const ext         = file.name.split('.').pop().toLowerCase();

                if (!allowedExts.includes(ext)) {
                    showMsg(careersMsg, 'error', 'Invalid file type. Only PDF, DOC and DOCX are accepted.');
                    return;
                }
                if (file.size > maxSize) {
                    showMsg(careersMsg, 'error', 'Resume file is too large. Maximum allowed size is 5 MB.');
                    return;
                }
            }

            submitForm(careersForm, careersMsg);
        });
    }

})();
