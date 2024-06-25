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


<body class="bg-primary-400 dark:bg-primary-dark">
    @include('layouts.header')

    <main class="px-6 md:px-12 lg:px-24 xl:px-48 py-4">
        <div class="overflow-x-auto">
            <table class="w-full bg-primary-dark dark:bg-primary-100 shadow-lg rounded-lg overflow-hidden">
                <thead class="bg-primary-600 dark:bg-primary-200">
                    <tr>
                        <th class="px-6 py-4 text-center border-r border-gray-300">Product ID</th>
                        <th class="px-6 py-4 text-center border-r border-gray-300">Product Name</th>
                        <th class="px-6 py-4 text-center border-r border-gray-300">Description</th>
                        <th class="px-6 py-4 text-center border-r border-gray-300">Price</th>
                        <th class="px-6 py-4 text-center border-r border-gray-300">Stock</th>
                        <th class="px-6 py-4 text-center border-r border-gray-300">ShopID</th>
                        <th class="px-6 py-4 text-center border-r border-gray-300">Edit</th>
                        <th class="px-6 py-4">Delete</th>
                        <th class="px-6 py-4">Add to Cart</th>
                    </tr>
                </thead>
                <tbody>
                    {{auth()->user()->id}}
                    @foreach ($productData -> sortBy('id') as $product)
                    <tr class ="bg-primary-400 dark:bg-primary-1000">
                        <td class="border-r border-gray-300 px-6 py-4 text-center">{{ $product->id}}</td>
                        <td class="border-r border-gray-300 px-6 py-4 text-center">{{ $product->name}}</td>
                        <td class="border-r border-gray-300 px-6 py-4 text-center">{{ $product->description }}</td>
                        <td class="border-r border-gray-300 px-6 py-4 text-center">{{ $product->price }}</td>
                        <td class="border-r border-gray-300 px-6 py-4 text-center">{{ $product->stock }}</td>
                        <td class="border-r border-gray-300 px-6 py-4 text-center">{{ $product->shop_id }}</td>

                        <td class="px-6 py-4 text-center border-r border-gray-300">
                            <a href="{{ route('editProduct', ['product' => $product->id]) }}" class="bg-white-800 text-white-500 dark:text-white-300 px-6 py-2">Edit</a>
                        </td>

                        <td class="px-6 py-4">
                            <form method="post" action="{{ route('deleteProduct', ['product' => $product]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white dark:text-black px-6 py-2">
                                    Delete
                                </button>
                            </form>
                        </td>

                    <td class="px-6 py-4">
                        <form method="post" action="{{ route('putItem', ['cart_id' => $product->cart_id, 'product_id' => $product->id]) }}">
                            @csrf
                            @method('POST')
                            <input type="number" name="quantity" id="quantity" min="1" value="1" class="border rounded px-2 py-1">
                            <button type="submit" class="bg-red-500 text-white dark:text-black px-6 py-2">
                                Add to Cart
                            </button>
                        </form>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </main>

    @include('layouts.footer')

</body>

</html>
