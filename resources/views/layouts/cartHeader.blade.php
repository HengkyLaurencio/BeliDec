@if (isset($cartItemsData) && !$cartItemsData==null)
    <div class="p-4 space-y-4">
        @php
            $total = 0;
        @endphp
        @foreach($cartItemsData as $item)   
            <div class="flex items-center justify-between p-4 border-b border-gray-200">
                <div class="flex items-center">
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold">{{ $item->product->name }}</h3>
                        <p class="text-gray-600">Quantity: {{ $item->quantity }}</p>
                    </div>
                </div>
                <div class="flex items-center">
                    <form action="{{ route('deleteItem', ['cart_id' => $item->cart_id, 'product_id' => $item->product->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Remove</button>
                    </form>
                    <div class="ml-4 text-gray-700">
                        @php
                            $price = $item->quantity * $item->product->price;
                            $formatted_price = number_format($price, 0, ',', '.');
                            $total += $price;
                        @endphp
                        Rp. {{ $formatted_price }}
                    </div>
                </div>
            </div>
        @endforeach
        <div class="flex justify-between items-center mt-4">
            <div class="text-xl font-semibold">Total: Rp. {{ number_format($total, 0, ',', '.') }}</div>
            <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Checkout</button>
        </div>
    </div>
@else
    <p class="text-gray-600">Your cart is empty.</p>
@endif
