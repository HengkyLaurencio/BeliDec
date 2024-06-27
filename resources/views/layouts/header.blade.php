<header class="bg-primary-100 py-3 px-28 flex justify-between items-center sticky top-0 z-30">
    <div class="flex-row items-center">
        <a href="{{ route('home') }}" class="flex items-center">
            <div class="bg-primary-400 rounded-full p-2 mr-5">
                <span class="material-symbols-outlined dark:text-text-200">
                    store
                </span>
            </div>
            <h1 class="text-3xl text-white font-bold">BeliDec</h1>
        </a>
    </div>
    <div class="flex items-center">
        <form action="{{ route('search') }}" method="GET"
            class="bg-primary-500 rounded-full p-2 w-screen max-w-lg flex items-center">
            <span class="material-symbols-outlined justify-center cursor-pointer dark:text-text-200">
                search
            </span>
            <input type="text" name="query" placeholder="Search the products"
                class="bg-transparent border-none focus:outline-none ml-3">
        </form>
    </div>
    <div class="flex items-center space-x-4">
        <div class="flex flex-row items-center justify-center px-3">
            <div class="px-3 mx-5 flex-row items-center justify-center">
                @php
                                        $balance = App\Http\Controllers\UserController::getBalance();
                                        @endphp
                                        <p class="justify-center py-0 my-0">Balance </p>
                                        <p class="justify-center py-0 my-0">Rp {{ number_format($balance, 0, ',', '.') }}</p>
            </div>
            <div class="px-3">
                <a href="{{ route('getCartItems') }}" class="flex flex-col justify-center">
                    <span class="material-symbols-outlined flex justify-center">
                        shopping_cart
                    </span>
                </a>
            </div>
            <div class="px-3">
                <a href="{{ route('viewOrder') }}" class="flex flex-col justify-center">
                    <span class="material-symbols-outlined flex justify-center">
                        list_alt
                    </span>
                </a>
            </div>
            <div class="px-3">
                <a href="{{ route('index') }}" class="flex flex-col justify-center">
                    <span class="material-symbols-outlined flex justify-center">
                        reviews
                    </span>
                </a>
            </div>
        </div>
        <div class="flex flex-row items-center justify-center">
            <div class="p-2 flex cursor-pointer" id="theme-toggle">
                <span class="material-symbols-outlined justify-center" id="theme-icon">
                </span>
            </div>
            <div class="p-2 flex">
                @if (Auth::guest())
                    <a href="{{ route('register') }}">
                        <span class="material-symbols-outlined justify-center">
                            account_circle
                        </span>
                    </a>
                @else
                    <div class="relative p-2 flex " id="account-menu">
                        <span class="material-symbols-outlined justify-center cursor-pointer" id="account-icon">
                            account_circle
                        </span>
                        <div class="absolute hidden bg-primary-500 text-text-200 text-sm dark:bg-primary-500 dark:text-text-200 shadow-lg rounded-md mt-2 w-32 text-center"
                            id="dropdown-account-menu">
                            <ul>
                                <li>
                                    <a href="{{route('updateBalance')}}" class="block p-2 hover:bg-primary-600 dark:bg-primary-600 rounded-md">
                                        Update Balance
                                    </a>
                                </li>
                                <li><a href="{{ route('shopMainDashboard') }}"
                                        class="block p-2 hover:bg-primary-600 dark:hover:bg-primary-600 rounded-md">My
                                        Shop
                                    </a>
                                </li>
                                <li><a href="{{ route('changepassword') }}"
                                        class="block p-2 hover:bg-primary-600 dark:hover:bg-primary-600 rounded-md">Change
                                        Password
                                    </a>
                                </li>
                                <li><a href="{{ route('logout') }}"
                                        class="block p-2 hover:bg-primary-600 dark:hover:bg-primary-600 rounded-md">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
            </div>
            @endif
        </div>
        <div class="p-2">
            @if (isset($cartItemsData) && !$cartItemsData == null)
                <span class="material-symbols-outlined cursor-pointer" id="cart-icon">
                    shopping_cart
                </span>
            @endif
        </div>
        <div id="cart-list"
            class="fixed right-[-700px] top-0 h-full w-2/6 bg-primary-500 dark:bg-primary-dark dark:text-white shadow-lg transition-all duration-300 z-50">
            <div class="p-5 flex justify-between items-center border-b">
                <h2 class="text-2xl font-semibold">Shopping Cart</h2>
                <span class="material-symbols-outlined cursor-pointer" id="close-btn">
                    close
                </span>
            </div>
            <div class="p-4" id="cart-items">
                @include ('layouts.cartHeader')
            </div>
        </div>
    </div>
</header>
