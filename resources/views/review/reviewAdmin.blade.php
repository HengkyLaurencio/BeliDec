<!DOCTYPE html>
<html lang="en" class="{{ session('theme', 'light') === 'dark' ? 'dark' : '' }}">

@include('layouts.head')

<body class="bg-white dark:bg-primary-dark dark:text-text-dark">
    @include('layouts.header')
    @include('layouts.menu')
    <main class="px-28">
    </main>
    @include('layouts.footer')
</body>

</html>
