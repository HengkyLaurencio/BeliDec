<x-admin-template>
@include('layouts.notification')
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
                </tbody>
            </table>
            <br>
            <div class="text-end flex flex-row justify-end mb-72">
                <button type="submit" class="bg-primary-1100 text-[#050303] dark:text-black px-6 py-2 border rounded-md">
                    <b>Update Product Data</b>
                </button>
            </div>
        </form>
    </main>
</x-admin-template>