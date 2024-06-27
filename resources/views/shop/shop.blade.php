<x-admin-template>
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

    <main class="px-6  py-4">
        <div class="overflow-x-auto">
            <table class="w-full bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                <thead class="bg-primary-600 dark:bg-primary-900">
                    <tr>
                        <th class="px-6 py-4 text-center border-r border-b">Name</th>
                        <th class="px-6 py-4 text-center border-r border-b">Owner Name</th>
                        <th class="px-6 py-4 text-center border-r border-b">Shop ID</th>
                        <th class="px-6 py-4 text-center border-r border-b">Description</th>
                        <th class="px-6 py-4 text-center border-r border-b">History</th>
                        <th class="px-6 py-4 border-r border-b">Edit</th>
                        <th class="px-6 py-4 border-b">Delete</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($shopData as $index => $shop)
                  <tr class="{{ $index % 2 == 0 ? 'bg-even' : '' }} hover:bg-primary-100 dark:hover:bg-primary-100">
                        <td class="border-r border-b px-6 py-4 text-center">{{ $shop->name }}</td>
                        <td class="border-r border-b px-6 py-4">{{ $shop->user->username }}</td>
                        <td class="border-r border-b px-6 py-4">{{ $shop->owner_id }}</td>
                        <td class="border-r border-b px-6 py-4">{{ $shop->description }}</td>
                        <td class="border-r border-b px-6 py-4 text-center">
                          <!-- <a href="">History</a> -->
                        </td>
                        <td class="border-r border-b px-6 py-4 text-center">
                            <a href="{{ route('adminEditShop', ['shop' => $shop->id]) }}">Edit</a>
                        </td>
                        <td class="px-6 py-4 text-center border-b">
                            <form method="post" action="{{ route('deleteShop', ['shop' => $shop]) }}">
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
            {{ $shopData->links() }}
        </div>
        <div>
            @if ($shopData->hasMorePages())
                <a href="{{ $shopData->nextPageUrl() }}">
                   
                </a>
            @endif
        </div>
    </main>
</x-admin-template  >