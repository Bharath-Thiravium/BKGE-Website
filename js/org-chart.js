// BK Green Energy — Org Chart  (production rewrite)
(function () {
    'use strict';

    /* ═══════════════════════════════════════════════════════
       ORG DATA
       names[] = FULL list — card shows preview, popup shows all
    ═══════════════════════════════════════════════════════ */
    var ORG = {
        id: 'gm', icon: '👔', title: 'General Manager',
        role: 'Leadership',
        names: ['Anbazhagan'],
        desc: 'Oversees all operations, strategy and business development across South India.',
        children: [
            {
                id: 'oa', icon: '🏢', title: 'Office Admin',
                role: 'Administration',
                names: ['Harini'],
                desc: 'Manages office operations, documentation and administrative coordination.',
                children: [
                    {
                        id: 'fin', icon: '💰', title: 'Finance',
                        role: 'Finance Dept',
                        names: ['Ragavi', 'Nalini'],
                        desc: 'Handles budgeting, accounts, payroll and financial reporting.'
                    },
                    {
                        id: 'mkt', icon: '📣', title: 'Marketing',
                        role: 'Marketing Dept',
                        names: ['Saisabarish', 'Vasan'],
                        desc: 'Manages brand presence, client outreach and digital marketing.'
                    },
                    {
                        id: 'hr', icon: '🤝', title: 'HR',
                        role: 'Human Resources',
                        names: ['Rithika', 'Nandhini'],
                        desc: 'Recruitment, employee welfare, training and HR compliance.'
                    }
                ]
            },
            {
                id: 'sa', icon: '🏗️', title: 'Site Admin',
                role: 'Site Management',
                names: ['John Kennady'],
                desc: 'Coordinates all on-site activities, logistics and safety compliance.',
                children: [
                    {
                        id: 'si', icon: '👷', title: 'Site Incharge',
                        role: 'Site Operations',
                        names: ['Karthick', 'Ananthan'],
                        desc: 'Supervises daily site activities, quality checks and team coordination.'
                    },
                    {
                        id: 'eng', icon: '⚙️', title: 'Engineers',
                        role: 'Engineering Team',
                        names: [],
                        desc: '12 certified engineers handling civil, mechanical and electrical works.',
                        children: [
                            {
                                id: 'se', icon: '🦺', title: 'Safety Engineers',
                                role: 'Safety Engineering',
                                names: ['Vishva'],
                                desc: 'Ensures site safety compliance, risk assessment and HSE standards.',
                                children: [
                                    {
                                        id: 'ase', icon: '📋', title: 'Assistant SE',
                                        role: 'Asst. Safety Engineer',
                                        names: ['Ramesh'],
                                        desc: 'Supports safety engineer in daily HSE inspections and reporting.'
                                    }
                                ]
                            },
                            {
                                id: 'qe', icon: '🔍', title: 'Quality Engineers',
                                role: 'Quality Engineering',
                                names: ['Nelson'],
                                desc: 'Manages quality control, inspections and commissioning standards.',
                                children: [
                                    {
                                        id: 'aqe', icon: '📐', title: 'Assistant QE',
                                        role: 'Asst. Quality Engineer',
                                        names: ['Hari'],
                                        desc: 'Assists in quality checks, documentation and site inspections.'
                                    }
                                ]
                            },
                            {
                                id: 'ce', icon: '🏛️', title: 'Civil Engineers',
                                role: 'Civil Engineering',
                                names: ['Ameer Pasha', 'Pushparaj', 'Sankar', 'Karthik Balan'],
                                desc: 'Handles civil works including foundations, structures and site preparation.'
                            },
                            {
                                id: 'ee', icon: '⚡', title: 'Electrical Engineers',
                                role: 'Electrical Engineering',
                                names: ['Sengutuvan', 'Mahesh Hebballi', 'Pradeep Kumar', 'Dinesh'],
                                desc: 'Manages electrical installations, wiring, inverters and grid connectivity.'
                            }
                        ]
                    },
                    {
                        id: 'tech', icon: '🔧', title: 'Technicians',
                        role: 'Technical Team',
                        names: [
                            'Nimai', 'Dhanajey', 'Rajkumar', 'Murugesan', 'Sivaraman',
                            'Amarnath', 'Veerapandi', 'Rajadurai', 'Vinoth Kumar',
                            'Santhosh', 'Arun', 'Vivek', 'Ravin', 'Prakash',
                            'Haridhas', 'Prabu', 'Jayakumar'
                        ],
                        desc: '17 skilled technicians executing solar panel installation, wiring and commissioning tasks across all project sites.'
                    }
                ]
            }
        ]
    };

    /* ═══════════════════════════════════════════════════════
       PARTICLES
    ═══════════════════════════════════════════════════════ */
    function initParticles() {
        var canvas = document.getElementById('bk-particles');
        if (!canvas) return;
        var ctx = canvas.getContext('2d');
        var W, H, pts = [];

        function resize() { W = canvas.width = window.innerWidth; H = canvas.height = window.innerHeight; }
        resize();
        window.addEventListener('resize', resize, { passive: true });

        for (var i = 0; i < 38; i++) {
            pts.push({
                x: Math.random() * 1920, y: Math.random() * 1080,
                r: Math.random() * 2.5 + 0.8,
                dx: (Math.random() - 0.5) * 0.4, dy: (Math.random() - 0.5) * 0.4,
                a: Math.random() * 0.5 + 0.15
            });
        }
        (function draw() {
            ctx.clearRect(0, 0, W, H);
            pts.forEach(function (p) {
                ctx.beginPath();
                ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
                ctx.fillStyle = 'rgba(15,124,58,' + p.a + ')';
                ctx.fill();
                p.x += p.dx; p.y += p.dy;
                if (p.x < 0) p.x = W; if (p.x > W) p.x = 0;
                if (p.y < 0) p.y = H; if (p.y > H) p.y = 0;
            });
            requestAnimationFrame(draw);
        }());
    }

    /* ═══════════════════════════════════════════════════════
       BUILD NODE
       Key design decisions:
       1. data-* attributes written onto .org-node — popup reads
          from the DOM, never from a JS closure. This means the
          full names array is always available regardless of what
          the card preview shows.
       2. Toggle button gets its OWN click listener with
          stopPropagation. The node click listener checks
          e.target.closest('.org-toggle') and returns early —
          so clicking the toggle NEVER opens the popup.
       3. Node click uses `this` (the .org-node element) so it
          always refers to the correct element even after the
          tree is re-rendered.
    ═══════════════════════════════════════════════════════ */
    function buildNode(data, isRoot, isMid) {
        var wrap = document.createElement('div');
        wrap.className = 'org-node-wrap';

        /* ── card element ── */
        var node = document.createElement('div');
        node.className = 'org-node' +
            (isRoot ? ' org-root' : isMid ? ' org-mid' : '');

        /* Write ALL data as attributes — single source of truth for popup */
        node.setAttribute('data-id',    data.id);
        node.setAttribute('data-icon',  data.icon  || '');
        node.setAttribute('data-role',  data.role  || '');
        node.setAttribute('data-title', data.title || '');
        node.setAttribute('data-desc',  data.desc  || '');
        /* Full names joined with §§ (safe separator, never appears in names) */
        node.setAttribute('data-names',
            (data.names && data.names.length) ? data.names.join('§§') : '');

        /* tooltip */
        var tip = document.createElement('span');
        tip.className = 'org-tooltip';
        tip.textContent = data.role;
        node.appendChild(tip);

        /* icon */
        var iconEl = document.createElement('span');
        iconEl.className = 'org-node-icon';
        iconEl.textContent = data.icon;
        node.appendChild(iconEl);

        /* title */
        var titleEl = document.createElement('span');
        titleEl.className = 'org-node-title';
        titleEl.textContent = data.title;
        node.appendChild(titleEl);

        /* names preview — card shows max 2, popup shows ALL */
        if (data.names && data.names.length) {
            var namesEl = document.createElement('span');
            namesEl.className = 'org-node-names';
            var preview = data.names.slice(0, 2);
            namesEl.textContent = preview.join(', ') +
                (data.names.length > 2 ? ' +' + (data.names.length - 2) + ' more' : '');
            node.appendChild(namesEl);
        }

        /* ── node click → popup ──
           Guard: if the click came from inside .org-toggle, ignore it.
           This is the fix for parent nodes never opening the popup. */
        node.addEventListener('click', function (e) {
            if (e.target.closest && e.target.closest('.org-toggle')) return;
            e.stopPropagation();
            openPopup(this);   /* `this` = the .org-node element */
        });

        wrap.appendChild(node);

        /* ── children ── */
        if (data.children && data.children.length) {
            /* toggle button — stopPropagation so it never bubbles to node */
            var toggle = document.createElement('div');
            toggle.className = 'org-toggle';
            toggle.setAttribute('role', 'button');
            toggle.setAttribute('aria-label', 'Toggle children');
            toggle.innerHTML =
                '<svg viewBox="0 0 10 6" aria-hidden="true">' +
                '<path d="M1 1l4 4 4-4" stroke="#fff" stroke-width="1.8"' +
                ' fill="none" stroke-linecap="round"/></svg>';
            node.appendChild(toggle);

            var vLine = document.createElement('div');
            vLine.className = 'org-v-line';
            wrap.appendChild(vLine);

            var childrenWrap = document.createElement('div');
            childrenWrap.className = 'org-children';

            var hBar = document.createElement('div');
            hBar.className = 'org-h-bar';
            childrenWrap.appendChild(hBar);

            var levelRow = document.createElement('div');
            levelRow.className = 'org-level';
            data.children.forEach(function (child) {
                levelRow.appendChild(buildNode(child, false, !isRoot));
            });
            childrenWrap.appendChild(levelRow);
            wrap.appendChild(childrenWrap);

            /* toggle: stopPropagation prevents node click from also firing */
            toggle.addEventListener('click', function (e) {
                e.stopPropagation();
                var collapsed = childrenWrap.classList.toggle('collapsed');
                toggle.classList.toggle('collapsed', collapsed);
            });
        }

        return wrap;
    }

    /* ═══════════════════════════════════════════════════════
       RENDER CHART
    ═══════════════════════════════════════════════════════ */
    function renderChart() {
        var container = document.getElementById('org-tree-root');
        if (!container) return;

        var tree = document.createElement('div');
        tree.className = 'org-tree';
        tree.appendChild(buildNode(ORG, true, false));
        container.appendChild(tree);

        /* stagger fade-in — add oc-anim AFTER layout so opacity:0
           doesn't affect getBoundingClientRect measurements */
        var wraps = container.querySelectorAll('.org-node-wrap');
        wraps.forEach(function (w) { w.classList.add('oc-anim'); });

        if ('IntersectionObserver' in window) {
            var io = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (!entry.isIntersecting) return;
                    var idx = Array.prototype.indexOf.call(wraps, entry.target);
                    setTimeout(function () {
                        entry.target.classList.add('oc-visible');
                    }, Math.max(0, idx) * 55);
                    io.unobserve(entry.target);
                });
            }, { threshold: 0.05 });
            wraps.forEach(function (w) { io.observe(w); });
        } else {
            wraps.forEach(function (w) { w.classList.add('oc-visible'); });
        }
    }

    /* ═══════════════════════════════════════════════════════
       POPUP — openPopup / closePopup
       Reads exclusively from data-* attributes on the clicked
       .org-node element. No closure, no stale references.
    ═══════════════════════════════════════════════════════ */
    function openPopup(nodeEl) {
        var popup = document.getElementById('org-popup');
        if (!popup) return;

        /* Read data attributes */
        var icon  = nodeEl.getAttribute('data-icon')  || '';
        var role  = nodeEl.getAttribute('data-role')  || '';
        var title = nodeEl.getAttribute('data-title') || '';
        var desc  = nodeEl.getAttribute('data-desc')  || '';
        var raw   = nodeEl.getAttribute('data-names') || '';

        /* Parse full names — split on §§ separator */
        var names = raw ? raw.split('§§').map(function (n) { return n.trim(); }).filter(Boolean) : [];

        /* Populate header */
        var elIcon  = document.getElementById('org-popup-icon');
        var elRole  = document.getElementById('org-popup-role');
        var elTitle = document.getElementById('org-popup-title');
        var elDesc  = document.getElementById('org-popup-desc');
        if (elIcon)  elIcon.textContent  = icon;
        if (elRole)  elRole.textContent  = role;
        if (elTitle) elTitle.textContent = title;
        if (elDesc)  elDesc.textContent  = desc;

        /* Populate names — bullet list, one per line, FULL list */
        var namesWrap  = document.getElementById('org-popup-names');
        var namesOuter = document.getElementById('org-popup-names-wrap');

        if (namesWrap) namesWrap.innerHTML = '';

        if (names.length && namesWrap && namesOuter) {
            names.forEach(function (name, idx) {
                var li = document.createElement('div');
                li.className = 'org-popup-name-row';

                var num = document.createElement('span');
                num.className = 'org-popup-name-num';
                num.textContent = idx + 1;

                var txt = document.createElement('span');
                txt.className = 'org-popup-name-txt';
                txt.textContent = name;

                li.appendChild(num);
                li.appendChild(txt);
                namesWrap.appendChild(li);
            });
            namesOuter.removeAttribute('hidden');
        } else if (namesOuter) {
            namesOuter.setAttribute('hidden', '');
        }

        /* Show popup */
        popup.removeAttribute('aria-hidden');
        popup.classList.add('org-popup-open');
        document.body.style.overflow = 'hidden';

        /* Focus close button for keyboard users */
        var closeBtn = document.getElementById('org-popup-close');
        if (closeBtn) {
            setTimeout(function () { closeBtn.focus(); }, 60);
        }
    }

    function closePopup() {
        var popup = document.getElementById('org-popup');
        if (!popup) return;
        popup.classList.remove('org-popup-open');
        popup.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    }

    /* ═══════════════════════════════════════════════════════
       TEAM CARD STAGGER
    ═══════════════════════════════════════════════════════ */
    function initTeamStagger() {
        var cards = document.querySelectorAll('.team-grid .team-card');
        if (!cards.length) return;
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
                if (!e.isIntersecting) return;
                e.target.classList.add('tc-visible');
                io.unobserve(e.target);
            });
        }, { threshold: 0.15 });
        cards.forEach(function (c) { io.observe(c); });
    }

    /* ═══════════════════════════════════════════════════════
       INIT
    ═══════════════════════════════════════════════════════ */
    function init() {
        if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            initParticles();
        }

        renderChart();
        initTeamStagger();

        /* ── Close: X button ── */
        var closeBtn = document.getElementById('org-popup-close');
        if (closeBtn) {
            closeBtn.addEventListener('click', function (e) {
                e.stopPropagation();
                closePopup();
            });
        }

        /* ── Close: click on overlay (the #org-popup element itself,
              NOT on the card inside it) ── */
        var popup = document.getElementById('org-popup');
        if (popup) {
            popup.addEventListener('click', function (e) {
                /* e.target === popup means the click landed on the
                   dark overlay, not on #org-popup-card or its children */
                if (e.target === popup) closePopup();
            });
        }

        /* ── Close: ESC key ── */
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') closePopup();
        });
    }

    /* ── Boot ── */
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

}());
