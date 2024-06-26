<x-admin-template>
    <main class="px-4 py-4 mb-64 mt-8">
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
                <input type="text" name="status" placeholder="New Status" class="w-200 mx-10 px-6 py-1 border border-gray-300 dark:border-gray-600 rounded-md ">
                <button type="submit" class="bg-primary-1100 text-[#050303] dark:text-black px-6 py-2 border rounded-md">
                    <b>Update User Data</b>
                </button>
            </div>
        </form>
    </main>
</x-admin-template>