import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    const themeToggle = document.getElementById('theme-toggle');
    const themeIcon = document.getElementById('theme-icon');

    if (document.documentElement.classList.contains('dark')) {
        themeIcon.textContent = 'light_mode';
    } else {
        themeIcon.textContent = 'dark_mode';
    }

    themeToggle.addEventListener('click', () => {
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            themeIcon.textContent = 'dark_mode';
        } else {
            document.documentElement.classList.add('dark');
            themeIcon.textContent = 'light_mode';
        }
    });

    const dropdownMenu = document.getElementById('dropdown-menu');
    const dropdownAccountMenu = document.getElementById('dropdown-account-menu');
    const categoryMenu = document.getElementById('category-menu');
    const accountMenu = document.getElementById('account-menu');

    let hideDropdownTimeout;

    const showDropdown = (menu) => {
        clearTimeout(hideDropdownTimeout);
        if (menu === 'category' && dropdownMenu) {
            dropdownMenu.classList.remove('hidden');
        } else if (menu === 'account' && dropdownAccountMenu) {
            dropdownAccountMenu.classList.remove('hidden');
        }
    };

    const hideDropdown = () => {
        hideDropdownTimeout = setTimeout(() => {
            if (dropdownMenu) dropdownMenu.classList.add('hidden');
            if (dropdownAccountMenu) dropdownAccountMenu.classList.add('hidden');
        }, 300);
    };

    if (categoryMenu) {
        categoryMenu.addEventListener('mouseenter', () => showDropdown('category'));
        categoryMenu.addEventListener('mouseleave', hideDropdown);
    }

    if (accountMenu) {
        accountMenu.addEventListener('mouseenter', () => showDropdown('account'));
        accountMenu.addEventListener('mouseleave', hideDropdown);
    }

    const cartIcon = document.getElementById('cart-icon');
    const cartList = document.getElementById('cart-list');
    const closeBtn = document.getElementById('close-btn');

    cartIcon.addEventListener('click', function () {
        cartList.classList.remove('right-[-700px]');
        cartList.classList.add('right-0');
    });

    closeBtn.addEventListener('click', function () {
        cartList.classList.remove('right-0');
        cartList.classList.add('right-[-700px]');
    });
});
