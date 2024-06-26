<x-admin-template>

    <head>
        <style>
            .bg {
                background-color: #f1f1f1; 
            }
        </style>
    </head>
    
    <body class="bg-primary-400 dark:bg-primary-dark">
    
    
        <main class="px-6 md:px-12 lg:px-24 xl:px-70 py-4">
            <div class="overflow-x-auto">
                <table class="w-full bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                    <thead class="bg-primary-600 dark:bg-primary-900">
                        <tr>
                            <th class="px-6 py-4 text-center border-r border-b">Name</th>
                            <th class="px-6 py-4 text-center border-r border-b">Owner Name</th>
                            <th class="px-6 py-4 text-center border-r border-b">Owner ID</th>
                            <th class="px-6 py-4 text-center border-r border-b">Description</th>
                            <th class="px-6 py-4 text-center border-r border-b">History</th>
                            <th class="px-6 py-4 border-r border-b">Edit</th>
                            <th class="px-6 py-4 border-b">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class ="bg">
                            <td class="border-r px-6 py-4 text-center">{{ $shopData->name }}</td>
                            <td class="border-r px-6 py-4 text-center">{{ $shopData->user->username }}</td>
                            <td class="border-r px-6 py-4 text-center">{{ $shopData->owner_id }}</td>
                            <td class="border-r px-6 py-4 text-center">{{ $shopData->description }}</td>
                            <td class="border-r border-b px-6 py-4 text-center">
                                <a href="{{ route('getHistory') }}">History</a>
                              </td>
                            <td class="border-r border-b px-6 py-4 text-center">
                                <a href="{{ route('editShop', $shopData->owner_id) }}">Edit</a>
                            </td>
                            <td class="px-6 py-4 text-center border-b">
                                <form method="post" action="{{ route('deleteShop', ['shop' => $shopData]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-text-300 rounded-lg text-[#FFFFFF] dark:text-black px-6 py-2">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>            
            </div>
        </main>
    </body>
    

</x-admin-template>