<!DOCTYPE html>
<html lang="en" class="{{ session('theme', 'light') === 'dark' ? 'dark' : '' }}">

<head>
    @include('layouts.head')
    <style>
        .bg-even {
            background-color: #f1f1f1; 
        }
    </style>
</head>

<body class="bg-primary-400 dark:bg-primary-dark">

    @include('layouts.header')

    <main class="px-6 md:px-12 lg:px-24 xl:px-48 py-4">
        <div class="overflow-x-auto">
            <table class="w-full bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                <thead class="bg-primary-600 dark:bg-primary-900">
                    <tr>
                        <th class="px-6 py-4 text-left border-r border-b">Username</th>
                        <th class="px-6 py-4 text-left border-r border-b">Total</th>
                        <th class="px-6 py-4 text-left border-r border-b">Status</th>
                        <th class="px-6 py-4 text-center border-r border-b">View Order</th>
                        <th class="px-6 py-4 border-b">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orderData as $index => $order)
                    <tr class="{{ $index % 2 == 0 ? 'bg-even' : '' }} hover:bg-primary-100 dark:hover:bg-primary-100">
                        <td class="border-r border-b px-6 py-4">{{ $order->user->username }}</td>
                        <td class="border-r border-b px-6 py-4">Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                        <td class="border-r border-b px-6 py-4">{{ $order->status }}</td>
                        <td class="border-r border-b px-6 py-4 text-center">
                            <a href="{{ route('getOrders', ['order_id' => $order->id]) }}">View</a>
                        </td>
                        @if ($order->status ===  "Awaiting Payment")
                        <td class="px-3 py-4 text-center border-b flex justify-center flex-row">
                            <form method="post" class="flex-row" action="{{ route('balance.add', ['balance' => $order->total, 'order_id' => $order->id]) }}">
                                @csrf
                                @method('POST')
                                <button type="submit" class="bg-primary-1100 text-[#FFFFFF] dark:text-black mx-8 px-16 py-2 rounded-lg">
                                    Pay
                                </button>
                            </form>
                            <form method="post" class="flex-row" action="{{ route('deleteOrderData', ['order' => $order]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-text-300 text-[#FFFFFF] dark:text-black px-8 py-2 rounded-lg">
                                    Cancel Order
                                </button>
                            </form>
                        </td>
                        @else
                        <td class="px-6 py-4 text-center border-b">

                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>            
        </div>
        <br>
        <div>
            {{ $orderData->links() }}
        </div>
        <div>
            <!-- Custom Next Page Button -->
            @if ($orderData->hasMorePages())
                <a href="{{ $orderData->nextPageUrl() }}">
                   
                </a>
            @endif
        </div>
    </main>

    @include('layouts.footer')

</body>

</html>
