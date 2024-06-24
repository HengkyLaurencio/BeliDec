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

<body class="bg-white dark:bg-gray-700">

    @include('layouts.header')

    <main class="px-6 md:px-12 lg:px-24 xl:px-48 py-4">
        <div class="overflow-x-auto">
            <table class="w-full bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                <thead class="bg-gray-200 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-4 text-left border-r border-gray-300 dark:border-gray-600">OrderId</th>
                        <th class="px-6 py-4 text-left border-r border-gray-300 dark:border-gray-600">Username</th>
                        <th class="px-6 py-4 text-left border-r border-gray-300 dark:border-gray-600">Total</th>
                        <th class="px-6 py-4 text-left border-r border-gray-300 dark:border-gray-600">Status</th>
                        {{-- <th class="px-6 py-4">Edit</th>
                        <th class="px-6 py-4">Delete</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orderData as $index => $order)
                    <tr class="{{ $index % 2 == 0 ? 'bg-even' : '' }} hover:bg-gray-100 dark:hover:bg-gray-600">
                        <td class="border-r border-gray-300 dark:border-gray-600 px-6 py-4 text-center">{{ $order->id }}</td>
                        <td class="border-r border-gray-300 dark:border-gray-600 px-6 py-4">{{ $order->user->username }}</td>
                        <td class="border-r border-gray-300 dark:border-gray-600 px-6 py-4">{{ $order->total }}</td>
                        <td class="border-r border-gray-300 dark:border-gray-600 px-6 py-4">{{ $order->status }}</td>
                        {{-- <td class="px-6 py-4 text-center">
                            <a href="{{ route('editUser', ['user' => $user->id]) }}" class="text-blue-500 dark:text-blue-300">Edit</a>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <form method="post" action="{{ route('deleteUser', ['user' => $user]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white dark:text-black px-6 py-2">
                                    Delete
                                </button>
                            </form>
                        </td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>            
        </div>
    </main>

    @include('layouts.footer')

</body>

</html>
