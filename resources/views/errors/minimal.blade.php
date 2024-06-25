<!DOCTYPE html>
<html lang="en" class="h-full">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Explore our wide selection of products at Cartzilla. Find the perfect items for you.">
        <meta name="keywords" content="Cartzilla, products, shopping">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>
    <body class="h-full flex flex-col">
        <main class="flex-grow grid place-items-center bg-white px-6 py-24 sm:py-32 lg:px-8">
            <div class="text-center">
                <p class="text-4    xl font-semibold text-indigo-600">@yield('code')</p>
                <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl">@yield('message')</h1>
                <p class="mt-6 text-base leading-7 text-gray-600">@yield('description')</p>
                <div class="mt-10 flex items-center justify-center gap-x-6">
                    <a href="/" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Go back home</a>
                    <!-- <a href="#" class="text-sm font-semibold text-gray-900">Contact support <span aria-hidden="true">&rarr;</span></a> -->
                </div>
            </div>
        </main>
        <footer class="pl-2 text-center py-4 mt-auto">
            <div class="flex w-full flex-wrap items-center justify-center gap-6 px-2 md:justify-between">
                <a href="https://github.com/HengkyLaurencio/BeliDec" target="_blank" class="text-gray-800">&copy; 2024 BeliDec.</a>
            </div>
        </footer>
    </body>
</html>
