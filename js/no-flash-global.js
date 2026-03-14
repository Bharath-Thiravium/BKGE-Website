// NO-FLASH / FOUC PREVENTION
// Add this at the END of <body> before closing tag
(function() {
    document.documentElement.classList.add('loaded');
})();
