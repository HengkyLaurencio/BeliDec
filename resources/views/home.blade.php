<!DOCTYPE html>
<html lang="en" class="{{ session('theme', 'light') === 'dark' ? 'dark' : '' }}">

@include('layouts.head')

<body class="bg-white dark:bg-primary-dark dark:text-text-dark">
    @include('layouts.notification')
    @include('layouts.header')
    @include('layouts.menu')
    @include('layouts.footer')
</body>

</html>
