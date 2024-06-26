<x-admin-template>
@if(session('error'))
    <div class="bg-red-500 text-white p-4 rounded mb-4 inline-block" >
        {{ session('error') }}
    </div>
    @elseif (session('success'))
    <div class="bg-green-500 text-white p-4 rounded mb-4 inline-block">
        {{ session('success') }}
    </div>
    @endif

    <main class="px-6 md:px-12 lg:px-24 xl:px-1 py-10">
        <div class="overflow-x-auto">
            <table class="w-full bg-primary-dark dark:bg-primary-100 rounded-lg overflow-hidden">
                <thead class="bg-primary-600 dark:bg-primary-200">
                    <tr>
                        <th class="px-2 py-2 text-center border-r border-b w-16">Product ID</th> <!-- Adjusted width -->
                        <th class="px-6 py-4 text-center border-r border-b">Product Name</th>
                        <th class="px-6 py-4 text-center border-r border-b">Description</th>
                        <th class="px-6 py-4 text-center border-r border-b w-48">Price</th> <!-- Adjusted width -->
                        <th class="px-6 py-4 text-center border-r border-b">Stock</th>
                        <th class="px-6 py-4 text-center border-r border-b">ShopID</th>
                        <th class="px-1 py-1 text-center border-r border-b">Edit</th>
                        <th class="px-6 py-4 text-center border-r">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productData->sortBy('id') as $product)
                    <tr class="bg-primary-400 dark:bg-primary-100">
                        <td class="border-r border-b px-6 py-4 text-center">{{ $product->id }}</td>
                        <td class="border-r border-b px-6 py-4 text-center">{{ $product->name }}</td>
                        <td class="border-r border-b px-6 py-4 text-center">{{ $product->description }}</td>
                        <td class="border-r border-b px-6 py-4 text-center w-48">Rp {{ number_format($product->price, 0, ',', '.') }}</td> <!-- Adjusted width -->
                        <td class="border-r border-b px-6 py-4 text-center">{{ $product->stock }}</td>
                        <td class="border-r border-b px-6 py-4 text-center">{{ $product->shop_id }}</td>

                        <td class="px-6 py-4 text-center border-r border-b">
                            <a href="{{ route('adminEditProduct', ['product' => $product->id]) }}"
                                class="bg-white-800 text-white-500 dark:text-white-300 px-6 py-2">Edit</a>
                        </td>

                        <td class="px-6 py-4 border-b">
                            <form method="post"
                                action="{{ route('deleteProduct', ['product' => $product]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-primary-1200 rounded-lg dark:text-black px-6 py-2">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            <div>
                {{ $productData->links() }}
            </div>
            <div>
                <!-- Custom Next Page Button -->
                @if ($productData->hasMorePages())
                <a href="{{ $productData->nextPageUrl() }}">

                </a>
                @endif
            </div>
        </div>
    </main>
</x-admin-template>