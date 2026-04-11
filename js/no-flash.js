// Scroll-to-top on every page load / refresh
// Must run before DOMContentLoaded so the browser has no time to restore position.
(function () {
    // 1. Tell the browser: do NOT restore scroll position automatically
    if ('scrollRestoration' in history) {
        history.scrollRestoration = 'manual';
    }

    // 2. Force top immediately — runs synchronously while page is still parsing
    window.scrollTo(0, 0);

    // 3. Second pass on DOMContentLoaded covers any late layout shifts
    //    (e.g. sticky headers that push content down before paint)
    document.addEventListener('DOMContentLoaded', function () {
        window.scrollTo(0, 0);
    });

    // 4. Third pass on load covers images / fonts that shift layout after parse
    window.addEventListener('load', function () {
        window.scrollTo(0, 0);
    });
})();

// Reveal body — with hard fallback so page never stays invisible
(function () {
    function reveal() { document.body.classList.add('loaded'); }
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', reveal);
    } else {
        reveal();
    }
    // Hard fallback: force visible after 500ms no matter what
    setTimeout(reveal, 500);
})();
