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
    @include('layouts.notification')
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
                                <a href="{{ route('createReview', ['order_item_id' => $order->id]) }}" class="bg-green-500 text-white dark:text-black px-6 py-2 inline-block text-center">
                                    Review
                                </a>
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
            <a href="{{ route('viewOrder') }}"
            class="text-blue-600 hover:underline">Back to Orders</a>
        </div>        
    </main>
    
    @include('layouts.footer')
</body>

</html>
