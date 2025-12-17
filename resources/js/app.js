import './bootstrap';

// Toggle menu pada tampilan mobile
document.addEventListener("DOMContentLoaded", () => {
    const navBtn = document.getElementById("nav"); // tombol hamburger
    const menu = document.querySelector(".menu");
    const hideElements = document.querySelectorAll(".hide-when-mobile-open");

    navBtn.addEventListener("click", () => {
        menu.classList.toggle("hidden");

        hideElements.forEach(el => {
            el.classList.toggle("hidden");
        });
    });
});


    // Hamburger
    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const iconHamburger = document.getElementById('icon-hamburger');
    const iconClose = document.getElementById('icon-close');

    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
        iconHamburger.classList.toggle('hidden');
        iconClose.classList.toggle('hidden');
    });

    // Live Search
    function liveSearch(inputId, menuId) {
        const input = document.getElementById(inputId);
        const items = document.querySelectorAll(`#${menuId} .menu-item`);

        input.addEventListener('keyup', () => {
            const value = input.value.toLowerCase();

            items.forEach(item => {
                const text = item.textContent.toLowerCase();
                item.classList.toggle('hidden', !text.includes(value));

                // efek glow saat match
                item.classList.toggle('text-blue-600', text.includes(value) && value !== '');
            });
        });
    }

    liveSearch('search-desktop', 'menu-desktop');
    liveSearch('search-mobile', 'menu-mobile');





