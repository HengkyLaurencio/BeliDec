<x-admin-template>
<main class="px-6 md:px-12 lg:px-24 xl:px-48 py-4">
        <div class="overflow-x-auto">
            <table class="w-full bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                <thead class="bg-primary-600 dark:bg-primary-900">
                    <tr>
                        <th class="px-6 py-4 text-center border-r border-b">Product Name</th>
                        <th class="px-6 py-4 text-center border-r border-b">Quantity</th>
                        <th class="px-6 py-4 text-center border-r border-b">Price</th>
                        <th class="px-6 py-4 text-center border-b">Action</th>
                    </tr>
                    
                </thead>
                @foreach($orders as $order)
                <tbody>
                    <tr class ="bg">
                        <td class="border-r px-6 py-4 text-center">{{ $order->product->name }}</td>
                        <td class="border-r px-6 py-4 text-center">{{ $order->quantity }}</td>
                        <td class="px-6 py-4 text-center">Rp {{ number_format($order->price, 0, ',', '.') }}</td>
                        @if($order->order->status === "Completed")
                            @if($order->is_review === false)
                            <td class="px-6 py-4 text-center border-b">
                                Not Review
                            </td> 
                            @else 
                            <td class="px-6 py-4 text-center">
                                Reviewed
                            </td>
                            @endif
                        @else
                        <td class="px-6 py-4 text-center">
                            
                            </td>
                        @endif
                    </tr>
                </tbody>
                @endforeach
            </table>    
        </div>
        <div class="mt-4 text-center">
            <a href="{{ route('getOrder')    }}"
            class="text-blue-600 hover:underline">Back to Orders</a>
        </div>  
    </main>
</x-admin-template>