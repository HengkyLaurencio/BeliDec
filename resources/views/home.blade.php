<!DOCTYPE html>
<html lang="en" class="{{ session('theme', 'light') === 'dark' ? 'dark' : '' }}">

@include('layouts.head')

<body class="bg-white dark:bg-gray-700">
    @include('layouts.header')
    <main class="px-28 py-4">
        <p>test</p>
    </main>
    @include('layouts.footer')
</body>

</html>
