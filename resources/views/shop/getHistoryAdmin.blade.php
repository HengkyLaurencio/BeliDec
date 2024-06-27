<x-shop-template>
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
                <table class="w-full bg-black dark:bg-primary-100 rounded-lg overflow-hidden">
                    <thead class="bg-primary-600 dark:bg-primary-200">
                        <tr>
                            <th class="px-6 py-4 text-center border-r border-b">Product Name</th>
                            <th class="px-6 py-4 text-center border-r border-b w-48">Quantity</th>
                            <th class="px-6 py-4 text-center border-r border-b">Total Price</th>
                            <th class="px-6 py-4 text-center border-r">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderData as $index => $order)
                            <td class="border-r border-b px-6 py-4 text-center">{{ $order->product->name }}</td>
                            <td class="border-r border-b px-6 py-4 text-center">{{ $order->quantity }}</td>
                            <td class="border-r border-b px-6 py-4 text-center w-48">Rp {{ number_format($order->price * $order->quantity, 0, ',', '.') }}</td> <!-- Adjusted width -->
                            <td class="border-r border-b px-6 py-4 text-center">{{ $order->order->status }}</td>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </x-shop-template>