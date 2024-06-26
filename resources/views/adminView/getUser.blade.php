<x-admin-template>
@include('layouts.notification')
<style>
    .bg-even {
        background-color: #f1f1f1; 
    }
</style>
<main class="px-2 md:px-12 lg:px-24 xl:px-4 py-4">

        <div class="overflow-x-auto">
            <table class="w-full bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                <thead class="bg-primary-600 dark:bg-primary-900">
                    <tr>
                        <th class="px-6 py-4 text-center border-r border-b">ID</th>
                        <th class="px-6 py-4 text-left border-r border-b">Username</th>
                        <th class="px-6 py-4 text-left border-r border-b">Email</th>
                        <th class="px-6 py-4 text-center border-r border-b">Edit</th>
                        <th class="px-6 py-4 border-b">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($userData as $index => $user)
                    <tr class="{{ $index % 2 == 0 ? 'bg-even' : '' }} hover:bg-primary-100 dark:hover:bg-primary-100">
                        <td class="border-r  border-b px-6 py-4 text-center">{{ $user->id }}</td>
                        <td class="border-r  border-b px-6 py-4">{{ $user->username }}</td>
                        <td class="border-r  border-b px-6 py-4">{{ $user->email }}</td>
                        <td class="px-6 py-4 border-r  border-b text-center">
                            <a href="{{ route('editUser', ['user' => $user->id]) }}">Edit</a>
                        </td>
                        <td class="px-6 py-4 text-center  border-b">
                            <form method="post" action="{{ route('deleteUser', ['user' => $user]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-text-300 text-[#FFFFFF] dark:text-black px-6 py-2 rounded-lg">
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
            {{ $userData->links() }}
        </div>
        <div>
            <!-- Custom Next Page Button -->
            @if ($userData->hasMorePages())
                <a href="{{ $userData->nextPageUrl() }}">
                   
                </a>
            @endif
        </div>
    </main>
</x-admin-template>