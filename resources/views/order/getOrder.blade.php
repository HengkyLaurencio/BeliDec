<!DOCTYPE html>
<html lang="en" class="{{ session('theme', 'light') === 'dark' ? 'dark' : '' }}">

<head>
    @include('layouts.head')
    <style>
        .bg-even {
            background-color: #f1f1f1; 
        }
        .dark .bg-even {
            background-color: #282222; 
            color: white;
        }
        .dark {
            color: white;
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
                        <th class="px-6 py-4 text-center border-r border-b">Order Id</th>
                        <th class="px-6 py-4 text-left border-r border-b">Username</th>
                        <th class="px-6 py-4 text-left border-r border-b">Total</th>
                        <th class="px-6 py-4 text-left border-r border-b">Status</th>
                        <th class="px-6 py-4 border-r border-b">Edit</th>
                        <th class="px-6 py-4 border-b">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orderData as $index => $order)
                    <tr class="{{ $index % 2 == 0 ? 'bg-even' : '' }} hover:bg-primary-100 dark:hover:bg-primary-100">
                        <td class="border-r border-b px-6 py-4 text-center">{{ $order->id }}</td>
                        <td class="border-r border-b px-6 py-4">{{ $order->user->username }}</td>
                        <td class="border-r border-b px-6 py-4">{{ $order->total }}</td>
                        <td class="border-r border-b px-6 py-4">{{ $order->status }}</td>
                        <td class="border-r border-b px-6 py-4 text-center">
                            <a href="{{ route('editOrder', ['order' => $order->id]) }}">Edit</a>
                        </td>
                        <td class="px-6 py-4 text-center border-b">
                            <form method="post" action="{{ route('deleteOrder', ['order' => $order]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-text-300 text-[#FFFFFF] dark:text-black px-6 py-2">
                                    Delete
                                </button>
                            </form>
                        </td>
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
