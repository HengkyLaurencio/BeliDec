<!DOCTYPE html>
<html lang="en" class="{{ session('theme', 'light') === 'dark' ? 'dark' : '' }}">
<head>
    @include('layouts.head')
</head>
<body class="bg-white dark:bg-gray-700">
    @include('layouts.header')
    <main class="px-8 py-4">
        <form method="post" action="{{ route('updateUser', ['user' => $user->id]) }}">
            @csrf
            @method('put')
            <table class="w-full border-collapse border border-gray-300 dark:border-gray-600">
                <thead>
                    <tr class="bg-gray-100 dark:bg-gray-800">
                        <th class="border border-gray-300 dark:border-gray-600 px-4 py-2">Variable</th>
                        <th class="border border-gray-300 dark:border-gray-600 px-4 py-2">Current Value</th>
                        <th class="border border-gray-300 dark:border-gray-600 px-4 py-2">New Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border border-gray-300 dark:border-gray-600">
                        <td class="border border-gray-300 dark:border-gray-600 px-4 py-2">Username</td>
                        <td class="border border-gray-300 dark:border-gray-600 px-4 py-2">{{ $user->username }}</td>
                        <td class="border border-gray-300 dark:border-gray-600 px-4 py-2">
                            <input type="text" name="username" placeholder="New Username" value="{{ old('username') }}"
                                class="w-full px-2 py-1 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-500">
                        </td>
                    </tr>
                    <tr class="border border-gray-300 dark:border-gray-600">
                        <td class="border border-gray-300 dark:border-gray-600 px-4 py-2">Email</td>
                        <td class="border border-gray-300 dark:border-gray-600 px-4 py-2">{{ $user->email }}</td>
                        <td class="border border-gray-300 dark:border-gray-600 px-4 py-2">
                            <input type="text" name="email" placeholder="New Email" value="{{ old('email') }}"
                                class="w-full px-2 py-1 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-500">
                        </td>
                    </tr>
                    <tr class="border border-gray-300 dark:border-gray-600">
                        <td class="border border-gray-300 dark:border-gray-600 px-4 py-2">Admin</td>
                        <td class="border border-gray-300 dark:border-gray-600 px-4 py-2"> {{ $user->is_admin ? "True" : "False" }} </td>
                        <td class="border border-gray-300 dark:border-gray-600 px-4 py-2">
                            <input type="hidden" name="is_admin" value="0">
                            <input type="checkbox" name="is_admin" value="1" {{ old('is_admin', $user->is_admin) ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><button type="submit" class="px-4 py-2 bg-blue-500 text-black">Update User Data</button></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </main>
    @include('layouts.footer')
</body>
</html>
