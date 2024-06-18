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

<body class="bg-white dark:bg-gray-700">

    @include('layouts.header')

    <main class="px-6 md:px-12 lg:px-24 xl:px-48 py-4">
        <div class="overflow-x-auto">
            <table class="w-full bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                <thead class="bg-gray-200 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-4 text-left border-r border-gray-300">ID</th>
                        <th class="px-6 py-4 text-left border-r border-gray-300">Username</th>
                        <th class="px-6 py-4 text-left border-r border-gray-300">Email</th>
                        <th class="px-6 py-4">Edit</th>
                        <th class="px-6 py-4">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($userData as $index => $user)
                    <tr class="{{ $index % 2 == 0 ? 'bg-even' : '' }} hover:bg-gray-100 dark:hover:bg-gray-600">
                        <td class="border-r border-gray-300 px-6 py-4 text-center">{{ $user->id }}</td>
                        <td class="border-r border-gray-300 px-6 py-4">{{ $user->username }}</td>
                        <td class="border-r border-gray-300 px-6 py-4">{{ $user->email }}</td>
                        <td class="px-6 py-4 text-center">
                            <a href="{{ route('editUser', ['user' => $user->id]) }}">Edit</a>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <form method="post" action="{{ route('deleteUser', ['user' => $user]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 text-black px-6 py-2 ">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>            
        </div>
    </main>

    @include('layouts.footer')

</body>

</html>
