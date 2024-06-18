<!DOCTYPE html>
<html lang="en" class="{{ session('theme', 'light') === 'dark' ? 'dark' : '' }}">
<head>
    @include('layouts.head')
</head>
<body class="bg-white dark:bg-gray-800">
    @include('layouts.header')
    <main class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-200 text-center">SHOP LIST</h1>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white dark:bg-gray-900 border-collapse border border-gray-200 dark:border-gray-700">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700 text-left text-gray-800 dark:text-gray-200">Name</th>
                        <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700 text-center text-gray-800 dark:text-gray-200">Owner ID</th>
                        <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700 text-left text-gray-800 dark:text-gray-200">Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($shopData as $shop)
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700 text-gray-800 dark:text-gray-200">{{ $shop->name }}</td>
                            <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700 text-center text-gray-800 dark:text-gray-200">{{ $shop->owner_id }}</td>
                            <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700 text-gray-800 dark:text-gray-200">{{ $shop->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
    @include('layouts.footer')
</body>
</html>
