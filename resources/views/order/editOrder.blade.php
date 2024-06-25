<!DOCTYPE html>
<html lang="en" class="{{ session('theme', 'light') === 'dark' ? 'dark' : '' }}">
<head>
    @include('layouts.head')
</head>
<body class="bg-white dark:bg-gray-700">
    @include('layouts.header')
    <main class="px-8 py-4">
        <form method="post" action="{{ route('updateOrder', ['order' => $order->id]) }}">
            @csrf
            @method('put')
            <table class="w-full border-collapse border border-gray-300 dark:border-gray-600">
                <thead>
                    <tr class="bg-gray-100 dark:bg-gray-800">
                        <th class="border border-gray-300 dark:border-gray-600 px-4 py-2">Username</th>
                        <th class="border border-gray-300 dark:border-gray-600 px-4 py-2">Total</th>
                        <th class="border border-gray-300 dark:border-gray-600 px-4 py-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border border-gray-300 dark:border-gray-600">
                        <td class="border border-gray-300 dark:border-gray-600 px-4 py-2">{{  $order->user->username }}</td>
                        <td class="border border-gray-300 dark:border-gray-600 px-4 py-2">{{ $order->total }}</td>
                        <td class="border border-gray-300 dark:border-gray-600 px-4 py-2">{{ $order->status }}</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <div class="text-end flex flex-row justify-end mb-44">
                <input type="text" name="status" placeholder="New Status" class="w-200 mx-28 px-8 py-1 border border-gray-300 dark:border-gray-600 rounded-md ">
                <button type="submit" class="bg-primary-1100 text-[#050303] dark:text-black px-6 py-2 border rounded-md">
                    <b>Update User Data</b>
                </button>
            </div>
        </form>
    </main>
    @include('layouts.footer')
</body>
</html>
