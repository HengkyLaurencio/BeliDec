<!-- resources/views/cart/index.blade.php -->
<!DOCTYPE html>
<html lang="en" class="{{ session('theme', 'light') === 'dark' ? 'dark' : '' }}">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
    @include('layouts.head')
</head>

<body class="bg-white dark:bg-gray-800">
    @include('layouts.header')
    <main class="container mx-auto px-4 py-8">
        @if (isset($cartItemsData) && !$cartItemsData == null)
        <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-6 text-center dark:text-gray-300">Cart</h1>
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <!-- Header Kolom -->
            <div class="grid grid-cols-6 gap-4 p-4 border-b border-gray-200 dark:border-gray-700">
                <div class="col-span-2 text-gray-600 dark:text-gray-300">PRODUCTS</div>
                <div class="text-gray-600 dark:text-gray-300">PRICE</div>
                <div class="text-gray-600 dark:text-gray-300">REMOVE</div>
                <div class="text-gray-600 dark:text-gray-300">QUANTITY</div>
                <div class="text-gray-600 dark:text-gray-300">TOTAL</div>
            </div>
           <!-- Daftar Barang -->
           <div class="flex flex-col space-y-4 mt-4">
            @php
                $total = 0;
            @endphp
                @foreach($cartItemsData as $item)
                    <div class="grid grid-cols-6 gap-4 items-center justify-between p-4 border-b border-gray-200 dark:border-gray-700">
                        <div class="col-span-2 flex items-center">
                            <div class="dark:text-gray-300">
                                <h2 class="text-lg font-semibold dark:text-gray-300">{{ $item->product->name }}</h2>
                            </div>
                        </div>
                        <div class="text-gray-700 dark:text-gray-200">
                            Rp. {{ number_format(($item->product->price), 0, ',', '.') }}
                        </div>
                        <div>
                            <!-- Tambahkan tautan untuk menghapus item -->
                            <form action="{{ route('deleteItem', ['cart_id' => $item->cart_id, 'product_id' => $item->product->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="cart_id" value="{{ $item->cart_id }}">
                                <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                                <button type="submit" class="text-red-500">Remove</button>
                            </form>
                        </div>
                        <div class="text-gray-700 dark:text-gray-200">
                            {{ $item->quantity }}
                        </div>
                        <div class="text-gray-700 dark:text-gray-200">
                            @php
                                $price = $item->quantity * $item->product->price;
                                $formatted_price = number_format($price, 0, ',', '.');
                                $total += $price;
                            @endphp
                            Rp. {{ $formatted_price }}
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="flex justify-between items-center mt-6">
    <a href="#" class="text-gray-700 dark:text-gray-200 hover:underline">&larr; Back to shopping</a>
    <div class="text-gray-700 dark:text-gray-200" style="margin-left: 650px; white-space: nowrap;">
    Total <strong>Rp. {{ number_format($total, 0, ',', '.') }}</strong>
</div>
    <button class="bg-gray-800 text-white py-2 px-4 rounded hover:bg-gray-700 dark:bg-white dark:text-gray-700 dark:hover:bg-gray-200">Checkout</button>
</div>

        </div>
    </div>
    @else
    
    @endif

        <script>
            function toggleDarkMode() {
                document.documentElement.classList.toggle('dark');
            }
        </script>
    @include('layouts.footer')
    </main>
    
</body>
</html>