<!DOCTYPE html>
<html lang="en">

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

<body class="bg-white dark:bg-primary-dark dark:text-text-dark">
    <!-- component -->
    <div class="min-h-screen bg-gray-50/50 flex">
        <aside class="bg-gradient-to-br from-gray-800 to-gray-900 fixed inset-0 z-50 my-4 ml-4 h-[calc(100vh-32px)] w-72 rounded-xl xl:translate-x-0 flex flex-col">
            <div class="relative border-b border-white/20">
                <a class="flex items-center gap-4 py-6 px-8" href="#/">
                    <h6 class="block antialiased tracking-normal font-sans text-base font-semibold leading-relaxed text-white">Admin Dashboard</h6>
                </a>
                <button class="middle none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-8 max-w-[32px] h-8 max-h-[32px] rounded-lg text-xs text-white hover:bg-white/10 active:bg-white/30 absolute right-0 top-0 grid rounded-br-none rounded-tl-none xl:hidden" type="button">
                    <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" aria-hidden="true" class="h-5 w-5 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </span>
                </button>
            </div>
            <div class="m-4 flex-1">
                <ul class="mb-4 flex flex-col gap-1 h-full">
                    <li>
                        <a aria-current="page" href="{{route('getUser')}}">
                            <button class="middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg text-white hover:bg-white/10 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize" type="button">
                                <span class="material-symbols-outlined w-5 h-5 text-inherit">
                                    group
                                </span>
                                <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">Users</p>
                            </button>
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{route('getProducts')}}">
                            <button class="middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg text-white hover:bg-white/10 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize" type="button">
                                <span class="material-symbols-outlined w-5 h-5 text-inherit">
                                    inventory_2
                                </span>
                                <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">Products</p>
                            </button>
                        </a>
                    </li>
                    <li>
                        <a class="" href="#">
                            <button class="middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg text-white hover:bg-white/10 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize" type="button">
                                <span class="material-symbols-outlined w-5 h-5 text-inherit">
                                    storefront
                                </span>
                                <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">Shops</p>
                            </button>
                        </a>
                    </li>
                    <li>
                        <a class="" href="#">
                            <button class="middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg text-white hover:bg-white/10 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize" type="button">
                                <span class="material-symbols-outlined w-5 h-5 text-inherit">
                                    inventory
                                </span>
                                <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">Orders</p>
                            </button>
                        </a>
                    </li>
                    <li>
                        <a class="" href="#">
                            <button class="middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg text-white hover:bg-white/10 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize" type="button">
                                <span class="material-symbols-outlined w-5 h-5 text-inherit">
                                    reviews
                                </span>
                                <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">Reviews</p>
                            </button>
                        </a>
                    </li>
                    
                    
                    <div class="mt-auto">
                        <li>
                            <a class="justify-items-end" href="#">
                                <button class="middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg text-white hover:bg-white/10 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize" type="button">
                                    <span class="material-symbols-outlined w-5 h-5 text-inherit">
                                        logout
                                    </span>
                                    <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">Logout</p>
                                </button>
                            </a>
                        </li>
                    </div>
                </ul>
            </div>
        </aside>
        <div class="p-4 xl:ml-80 flex-1">
            <div class="mt-4">
                {{$slot}}
            </div>
            <div class="text-blue-gray-600">
                <footer class="py-2">
                    <div class="flex w-full flex-wrap items-center justify-center gap-6 px-2 md:justify-between">
                        <a href="https://github.com/HengkyLaurencio/BeliDec" target="_blank" class="text-gray-800">&copy; 2024 BeliDec. All Rights Reserved.</a>
                        <ul class="flex items-center gap-4">
                            <li>
                                <a href="https://www.creative-tim.com" target="_blank" class="block antialiased font-sans text-sm leading-normal py-0.5 px-1 font-normal text-inherit transition-colors hover:text-blue-500">Creative Tim</a>
                            </li>
                            <li>
                                <a href="https://www.creative-tim.com/presentation" target="_blank" class="block antialiased font-sans text-sm leading-normal py-0.5 px-1 font-normal text-inherit transition-colors hover:text-blue-500">About Us</a>
                            </li>
                            <li>
                                <a href="https://www.creative-tim.com/blog" target="_blank" class="block antialiased font-sans text-sm leading-normal py-0.5 px-1 font-normal text-inherit transition-colors hover:text-blue-500">Blog</a>
                            </li>
                            <li>
                                <a href="https://www.creative-tim.com/license" target="_blank" class="block antialiased font-sans text-sm leading-normal py-0.5 px-1 font-normal text-inherit transition-colors hover:text-blue-500">License</a>
                            </li>
                        </ul>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</body>

</html>
