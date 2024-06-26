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
    @foreach ($orders as $order)
    <main class="px-6 md:px-12 lg:px-24 xl:px-48 py-4">
        <div class="overflow-x-auto">
            <table class="w-full bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                <thead class="bg-primary-600 dark:bg-primary-900">
                    <tr>
                        <th class="px-6 py-4 text-center border-r border-b">Product Name</th>
                        <th class="px-6 py-4 text-center border-r border-b">Quantity</th>
                        <th class="px-6 py-4 text-center border-b">Price</th>
                        @if($order->status === "Completed")
                        <th class="px-6 py-4 text-center border-b">
                            Review
                        </th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    <tr class ="bg">
                        <td class="border-r px-6 py-4 text-center">{{ $order->product->name }}</td>
                        <td class="border-r px-6 py-4 text-center">{{ $order->quantity }}</td>
                        <td class="px-6 py-4 text-center">{{ $order->price }}</td>
                        @if($order->order->status === "Completed")
                        <td class="px-6 py-4 text-center border-b">
                            <a href="{{ route('createReview', ['order_item_id' => $order->id]) }}" class="bg-green-500 text-white dark:text-black px-6 py-2 inline-block text-center">
                                Review
                            </a>
                        </td>
                        @endif
                        
                    </tr>
                </tbody>
            </table>            
        </div>
    </main>
    @endforeach

    @include('layouts.footer')

</body>

</html>
