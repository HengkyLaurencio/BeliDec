<!DOCTYPE html>
<html lang="en" class="{{ session('theme', 'light') === 'dark' ? 'dark' : '' }}">
<link rel="stylesheet" href="{{ asset('css/adminView.css') }}">
@include('layouts.head')


<body class="bg-white dark:bg-gray-700">
    @include('layouts.header')
    <main class="px-28 py-4">
        <div>
            <table class="user-table">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                </tr>
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
            </table>
        </div>
    @include('layouts.footer')
</body>
</html>
