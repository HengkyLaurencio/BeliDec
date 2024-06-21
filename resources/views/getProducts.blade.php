<!DOCTYPE html>
<html lang="en" class="{{ session('theme', 'light') === 'dark' ? 'dark' : '' }}">


<head>
@include('layouts.head')    
    <style>
            .bg {
                background-color: #f1f1f1; 
            }
        </style>
</head>


<body class="bg-white dark:bg-gray-700">
    @include('layouts.header')

    <main class="px-6 md:px-12 lg:px-24 xl:px-48 py-4">
        <div class="overflow-x-auto">
            <table class="w-full bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                <thead class="bg-gray-200 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-4 text-left border-r border-gray-300">Product Name</th>
                        <th class="px-6 py-4 text-left border-r border-gray-300">Description</th>
                        <th class="px-6 py-4 text-left border-r border-gray-300">Price</th>
                        <th class="px-6 py-4 text-left border-r border-gray-300">Stock</th>
                        <th class="px-6 py-4 text-left border-r border-gray-300">ShopID</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productData as $product)
                    <tr class ="bg">
                        <td class="border-r border-gray-300 px-6 py-4 text-center">{{ $product->name}}</td>
                        <td class="border-r border-gray-300 px-6 py-4 text-center">{{ $product->description }}</td>
                        <td class="border-r border-gray-300 px-6 py-4 text-center">{{ $product->price }}</td>
                        <td class="border-r border-gray-300 px-6 py-4 text-center">{{ $product->stock }}</td>
                        <td class="border-r border-gray-300 px-6 py-4 text-center">{{ $product->shop_id }}</td>
                    </tr>
                    @endforeach
                </tbody>
        </table>            
    </main>

    @include('layouts.footer')

</body>

</html>
