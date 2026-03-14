// Home Page Mobile Drawer Menu
// Only runs on pages with body.home-page class

if (document.body.classList.contains('home-page')) {
    const hamburger = document.getElementById('customHamburger');
    const drawerMenu = document.getElementById('drawerMenu');
    const drawerOverlay = document.getElementById('drawerOverlay');
    const drawerClose = document.getElementById('drawerClose');
    const drawerLinks = document.querySelectorAll('.drawer-link');

    function openDrawer() {
        drawerMenu.classList.add('active');
        drawerOverlay.classList.add('active');
        document.body.classList.add('menu-open');
    }

    function closeDrawer() {
        drawerMenu.classList.remove('active');
        drawerOverlay.classList.remove('active');
        document.body.classList.remove('menu-open');
    }

    // Open drawer
    if (hamburger) {
        hamburger.addEventListener('click', openDrawer);
    }

    // Close on overlay click
    if (drawerOverlay) {
        drawerOverlay.addEventListener('click', closeDrawer);
    }

    // Close on close button
    if (drawerClose) {
        drawerClose.addEventListener('click', closeDrawer);
    }

    // Close on link click
    drawerLinks.forEach(link => {
        link.addEventListener('click', closeDrawer);
    });
}
