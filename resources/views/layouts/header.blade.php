<header class="bg-primary-100 py-3 px-28 flex justify-between items-center sticky top-0 z-50">
    <div class="flex-row items-center">
        <a href="#" class="flex items-center">
            <div class="bg-primary-400 rounded-full p-2 mr-5">
                <span class="material-symbols-outlined dark:text-text-200">
                    store
                </span>
            </div>
            <h1 class="text-3xl text-white font-bold">BeliDec</h1>
        </a>
    </div>
    <div class="flex items-center">
        <form action="{{ route('register') }}" method="GET" class="bg-primary-500 rounded-full p-2 w-screen max-w-xl flex items-center">
            <span class="material-symbols-outlined cursor-pointer dark:text-text-200">
                search
            </span>
            <input type="text" name="query" placeholder="Search the products" class="bg-transparent border-none focus:outline-none ml-3">
        </form>
    </div>
    <div class="flex items-center space-x-4">
        <div class="relative p-2" id="category-menu">
            <span class="material-symbols-outlined cursor-pointer" id="category-icon">
                category
            </span>
            <div class="absolute hidden bg-primary-500 text-text-200 dark:bg-primary-500 dark:text-text-200 shadow-lg rounded-md mt-2 w-32 text-center" id="dropdown-menu">
                <ul>
                    <li><a href="#" class="block p-2 hover:bg-primary-600 dark:hover:bg-primary-600 rounded-md">Category 1</a></li>
                    <li><a href="#" class="block p-2 hover:bg-primary-600 dark:hover:bg-primary-600 rounded-md">Category 2</a></li>
                    <li><a href="#" class="block p-2 hover:bg-primary-600 dark:hover:bg-primary-600 rounded-md">Category 3</a></li>
                </ul>
            </div>
        </div>
        <div class="p-2 cursor-pointer" id="theme-toggle">
            <span class="material-symbols-outlined" id="theme-icon">
            </span>
        </div>
        <div class="p-2">
            @if (Request::is('/'))
            <a href="{{ route('register') }}">
                <span class="material-symbols-outlined">
                    account_circle
                </span>
            </a>
            @else
            @auth
            <a href="{{ route('login') }}">
                <span class="material-symbols-outlined">
                    account_circle
                </span>
            </a>
            @endauth
            @endif
        </div>
        <div class="p-2">
            @if (Request::is('/'))
            <span class="material-symbols-outlined cursor-pointer" id="cart-icon">
                shopping_cart
            </span>
            @else
            @auth
            <span class="material-symbols-outlined cursor-pointer" id="cart-icon">
                shopping_cart
            </span>
            @endauth
            @endif
        </div>
        <div id="cart-list" class="fixed right-[-700px] top-0 h-full w-2/6 bg-primary-500 dark:bg-primary-dark dark:text-white shadow-lg transition-all duration-300 z-50">
            <div class="p-5 flex justify-between items-center border-b">
                <h2 class="text-2xl font-semibold">Shopping Cart</h2>
                <span class="material-symbols-outlined cursor-pointer" id="close-btn">
                    close
                </span>
            </div>
            <div class="p-4" id="cart-items">
            </div>
        </div>
    </div>
</header>
