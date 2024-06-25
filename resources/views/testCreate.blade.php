<!DOCTYPE html>
<html lang="en" class="{{ session('theme', 'light') === 'dark' ? 'dark' : '' }}">

@include('layouts.head')

<body class="bg-white dark:bg-primary-dark dark:text-text-dark">
    @include('layouts.header')
    @include('layouts.menu')
    <main class="px-28">
        <form action="{{ route('testCreate.post') }}" method="POST">
            @csrf
            <button type="submit" class="w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Create Order
            </button>
        </form>
    </main>
    @include('layouts.footer')
</body>

</html>
