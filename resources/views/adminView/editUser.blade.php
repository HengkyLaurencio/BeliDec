<!DOCTYPE html>
<html lang="en" class="{{ session('theme', 'light') === 'dark' ? 'dark' : '' }}">
<head>
    <link rel="stylesheet" href="{{ asset('css/adminView.css') }}">
    @include('layouts.head')
</head>
<body class="bg-white dark:bg-gray-700">
    @include('layouts.header')
    <main class="px-28 py-4">
        <form method="post" action="{{ route('updateUser', ['user' => $user->id]) }}" class="user-table">
            @csrf
            @method('put')
            <table class="user-table">
                <tr>
                    <th>Variable</th>
                    <th>Current Value</th>
                    <th>New Value</th>
                </tr>
                <tr>
                    <td>Username</td>
                    <td>{{ $user->username }}</td>
                    <td><input type="text" name="username" placeholder="New Username" value="{{ old('username') }}"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $user->email }}</td>
                    <td><input type="text" name="email" placeholder="New Email" value="{{ old('email') }}"></td>
                </tr>
            </table>
            <div>
                <br>
                <input type="submit" value="Update User Data" class="update">
            </div>
        </form>
    </main>
    @include('layouts.footer')
</body>
</html>
