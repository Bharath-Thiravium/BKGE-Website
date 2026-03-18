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
