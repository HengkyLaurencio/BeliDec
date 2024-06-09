import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    const themeToggle = document.getElementById('theme-toggle');
    const themeIcon = document.getElementById('theme-icon');

    // Update icon based on the current theme
    if (document.documentElement.classList.contains('dark')) {
        themeIcon.textContent = 'light_mode';
    } else {
        themeIcon.textContent = 'dark_mode';
    }

    themeToggle.addEventListener('click', () => {
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('theme', 'light');
            themeIcon.textContent = 'dark_mode';
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('theme', 'dark');
            themeIcon.textContent = 'light_mode';
        }
    });
    const categoryIcon = document.getElementById('category-icon');
    const dropdownMenu = document.getElementById('dropdown-menu');
    const categoryMenu = document.getElementById('category-menu');

    let hideDropdownTimeout;

    const showDropdown = () => {
        clearTimeout(hideDropdownTimeout);
        dropdownMenu.classList.remove('hidden');
    };

    const hideDropdown = () => {
        hideDropdownTimeout = setTimeout(() => {
            dropdownMenu.classList.add('hidden');
        }, 300);
    };

    categoryIcon.addEventListener('mouseenter', showDropdown);
    categoryMenu.addEventListener('mouseleave', hideDropdown);
    dropdownMenu.addEventListener('mouseenter', showDropdown);
    dropdownMenu.addEventListener('mouseleave', hideDropdown);
});
