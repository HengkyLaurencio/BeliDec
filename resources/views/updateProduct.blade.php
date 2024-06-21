<!DOCTYPE html>
<html lang="en" class="{{ session('theme', 'light') === 'dark' ? 'dark' : '' }}">
<head>
    @include('layouts.head')
</head>
<body class="bg-white dark:bg-gray-700">
    @include('layouts.header')
    <main class="px-8 py-4">
        <form method="post" action="{{ route('updateProduct', ['product' => $product->id]) }}" class="product-table">
            @csrf
            @method('put')
            <table class="w-full border-collapse border border-gray-300 dark:border-gray-600">
                <thead>
                    <tr class="bg-gray-100 dark:bg-gray-800">
                        <th class="border border-gray-300 dark:border-gray-600 px-4 py-2">Variable</th>
                        <th class="border border-gray-300 dark:border-gray-600 px-4 py-2">Current Value</th>
                        <th class="border border-gray-300 dark:border-gray-600 px-4 py-2">New Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border border-gray-300 dark:border-gray-600">
                        <td class="border border-gray-300 dark:border-gray-600 px-4 py-2">Product Name</td>
                        <td class="border border-gray-300 dark:border-gray-600 px-4 py-2">{{ $product->name }}</td>
                        <td class="border border-gray-300 dark:border-gray-600 px-4 py-2">
                            <input type="text" name="name" placeholder="New Product Name" value="{{ old('name') }}"
                                class="w-full px-2 py-1 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-500">
                        </td>
                    </tr>

                    <tr class="border border-gray-300 dark:border-gray-600">
                        <td class="border border-gray-300 dark:border-gray-600 px-4 py-2">Description</td>
                        <td class="border border-gray-300 dark:border-gray-600 px-4 py-2">{{ $product->description }}</td>
                        <td class="border border-gray-300 dark:border-gray-600 px-4 py-2">
                            <input type="text" name="description" placeholder="New Desc" value="{{ old('description') }}"
                                class="w-full px-2 py-1 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-500">
                        </td>
                    </tr>

                    <tr class="border border-gray-300 dark:border-gray-600">
                        <td class="border border-gray-300 dark:border-gray-600 px-4 py-2">Price</td>
                        <td class="border border-gray-300 dark:border-gray-600 px-4 py-2">{{ $product->price }}</td>
                        <td class="border border-gray-300 dark:border-gray-600 px-4 py-2">
                            <input type="text" name="price" placeholder="New Price" value="{{ old('price') }}"
                                class="w-full px-2 py-1 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-500">
                        </td>
                    </tr>

                    <tr class="border border-gray-300 dark:border-gray-600">
                        <td class="border border-gray-300 dark:border-gray-600 px-4 py-2">Stock</td>
                        <td class="border border-gray-300 dark:border-gray-600 px-4 py-2">{{ $product->stock }}</td>
                        <td class="border border-gray-300 dark:border-gray-600 px-4 py-2">
                            <input type="text" name="stock" placeholder="New Stock" value="{{ old('stock') }}"
                                class="w-full px-2 py-1 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-500">
                        </td>
                    </tr>

                    <tr class="border border-gray-300 dark:border-gray-600">
                        <td class="border border-gray-300 dark:border-gray-600 px-4 py-2">ShopID</td>
                        <td class="border border-gray-300 dark:border-gray-600 px-4 py-2">{{ $product->shop_id }}</td>
                        <td class="border border-gray-300 dark:border-gray-600 px-4 py-2">
                            <input type="text" name="shop_id" placeholder="New ShopID" value="{{ old('shop_id') }}"
                                class="w-full px-2 py-1 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-500">
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td><button type="submit" class="px-4 py-2 bg-blue-500 text-white">Update Product Data</button></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </main>
    @include('layouts.footer')
</body>
</html>
