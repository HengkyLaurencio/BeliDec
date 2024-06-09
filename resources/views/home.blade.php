<!DOCTYPE html>
<html lang="en" class="{{ session('theme', 'light') === 'dark' ? 'dark' : '' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Explore our wide selection of products at Cartzilla. Find the perfect items for you.">
    <meta name="keywords" content="Cartzilla, products, shopping">
    <title>BeliDec</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="bg-white dark:bg-gray-700">
    <header class="bg-indigo-600 py-3 px-28 flex justify-between items-center sticky top-0 z-50">
        <div class="flex-row items-center">
            <a href="#" class="flex items-center">
                <div class="bg-indigo-100 rounded-full p-2 mr-5">
                    <span class="material-symbols-outlined">
                        store
                    </span>
                </div>
                <h1 class="text-3xl text-white font-bold">BeliDec</h1>
            </a>
        </div>
        <div class="flex items-center">
            <form action="{{ route('register') }}" method="GET" class="bg-indigo-200 rounded-full p-2 w-screen max-w-xl flex items-center">
                <span class="material-symbols-outlined cursor-pointer">
                    search
                </span>
                <input type="text" name="query" placeholder="Search the products" class="bg-transparent border-none text-gray-800 focus:outline-none ml-3">
            </form>
        </div>
        <div class="flex items-center space-x-4">
            <div class="relative" id="category-menu">
                <span class="material-symbols-outlined cursor-pointer" id="category-icon">
                    category
                </span>
                <div class="absolute hidden bg-white text-black dark:bg-gray-800 dark:text-white shadow-lg rounded-md mt-2 w-32 text-center" id="dropdown-menu">
                    <ul>
                        <li><a href="#" class="block p-2 hover:bg-gray-200 dark:hover:bg-gray-600 rounded-md">Category 1</a></li>
                        <li><a href="#" class="block p-2 hover:bg-gray-200 dark:hover:bg-gray-600 rounded-md">Category 2</a></li>
                        <li><a href="#" class="block p-2 hover:bg-gray-200 dark:hover:bg-gray-600 rounded-md">Category 3</a></li>
                    </ul>
                </div>
            </div>
            <div class="p-2 cursor-pointer" id="theme-toggle">
                @if(session('theme', 'light')==='light')
                <span class="material-symbols-outlined" id="theme-icon">
                    dark_mode
                </span>
                @elseif(session('theme', 'dark') === 'dark')
                <span class="material-symbols-outlined" id="theme-icon">
                    light_mode
                </span>
                @endif
            </div>
            <div class="p-2">
                <a href="{{ route('register') }}">
                    <span class="material-symbols-outlined">
                        account_circle
                    </span>
                </a>
            </div>
            <div class="p-2">
                <span class="material-symbols-outlined">
                    shopping_cart
                </span>
            </div>
        </div>
    </header>
</body>

</html>
