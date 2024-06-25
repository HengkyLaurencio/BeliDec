<!DOCTYPE html>
<html lang="en" class ="h-full">
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
    <body class ="h-full">
        <!-- <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title">
                    @yield('message')
                </div>
            </div>
        </div> -->
        <!-- <main class="grid min-h-full place-items-center bg-white px-6 py-24 sm:py-32 lg:px-8">
            <div class="text-center">
            
            </div>
        </main> -->
        @yield('message')
    </body>
</html>
