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
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                @foreach ($userData as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td><a href="{{ route('editUser', ['user' => $user->id]) }}">Edit</a></td>
                    <td>
                        <form method="post" action="{{ route('deleteUser', ['user' => $user]) }}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </main>
    @include('layouts.footer')
</body>

</html>
