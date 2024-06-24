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
                        <th class="px-6 py-4 text-left border-r border-gray-300 dark:border-gray-600">Name</th>
                        <th class="px-6 py-4 text-left border-r border-gray-300 dark:border-gray-600">Owner Name</th>
                        <th class="px-6 py-4 text-left border-r border-gray-300 dark:border-gray-600">Owner ID</th>
                        <th class="px-6 py-4 text-left border-r border-gray-300 dark:border-gray-600">Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($shopData as $index => $shop)
                    <tr class="{{ $index % 2 == 0 ? 'bg-even' : '' }} hover:bg-gray-100 dark:hover:bg-gray-600">
                        <td class="border-r border-gray-300 dark:border-gray-600 px-6 py-4">{{ $shop->name }}</td>
                        <td class="border-r border-gray-300 dark:border-gray-600 px-6 py-4">{{ $shop->user->username }}</td>
                        <td class="border-r border-gray-300 dark:border-gray-600 px-6 py-4 text-center">{{ $shop->owner_id }}</td>
                        <td class="border-r border-gray-300 dark:border-gray-600 px-6 py-4">{{ $shop->description }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>            
        </div>
    </main>

    @include('layouts.footer')

</body>

</html>




