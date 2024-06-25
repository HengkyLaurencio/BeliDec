<!DOCTYPE html>
<html lang="en" class="{{ session('theme', 'light') === 'dark' ? 'dark' : '' }}">
<head>
    @include('layouts.head')
</head>
<body class="bg-white dark:bg-gray-700 overflow-hidden">
    @include('layouts.header')
    <main class="px-8 py-4">
        <form method="post" action="{{ route('updateUser', ['user' => $user->id]) }}">
            @csrf
            @method('put')
            <table class="w-full border-collapse border">
                <thead class="bg-primary-600 dark:bg-primary-900">
                    <tr>
                        <th class="border px-4 py-2">Variable</th>
                        <th class="border px-4 py-2">Current Value</th>
                        <th class="border px-4 py-2">New Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border">
                        <td class="border px-4 py-2">Username</td>
                        <td class="border px-4 py-2">{{ $user->username }}</td>
                        <td class="border px-4 py-2">
                            <input type="text" name="username" placeholder="New Username" value="{{ old('username') }}"
                                class="w-full px-2 py-1 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-500">
                        </td>
                    </tr>
                    <tr class="border">
                        <td class="border px-4 py-2">Email</td>
                        <td class="border px-4 py-2">{{ $user->email }}</td>
                        <td class="border px-4 py-2">
                            <input type="text" name="email" placeholder="New Email" value="{{ old('email') }}"
                                class="w-full px-2 py-1 border rounded-md">
                        </td>
                    </tr>
                    <tr class="border">
                        <td class="border px-4 py-2">Admin</td>
                        <td class="border px-4 py-2"> {{ $user->is_admin ? "True" : "False" }} </td>
                        <td class="border px-4 py-2">
                            <input type="hidden" name="is_admin" value="0">
                            <input type="checkbox" name="is_admin" value="1" {{ old('is_admin', $user->is_admin) ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <br>
            <div class="text-end mb-44">
                <button type="submit" class="bg-primary-1100 text-[#050303] dark:text-black px-6 py-2 border rounded-md">
                    <b>Update User Data</b>
                </button>
            </div>
        </form>
    </main>
    @include('layouts.footer')
</body>
</html>
