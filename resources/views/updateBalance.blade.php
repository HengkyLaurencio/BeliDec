<!DOCTYPE html>
<html lang="en" class="{{ session('theme', 'light') === 'dark' ? 'dark' : '' }}">

@include('layouts.head')

<body class="bg-white dark:bg-primary-dark dark:text-text-dark">
    @include('layouts.header')
    @include('layouts.menu')
    <main class="px-28">
    <div class="container mx-auto p-4 m-20">
        <h1 class="text-2xl font-bold mb-4">Update Balance</h1>
        
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('balance.update') }}" method="POST" class="bg-white p-6 rounded shadow-md">
            @csrf
            <div class="mb-4">
                <label for="balance" class="block text-gray-700 font-bold mb-2">Balance</label>
                <input type="text" name="balance" id="balance" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('balance', $user->balance) }}">
                @if ($errors->has('balance'))
                    <div class="text-red-500 text-sm mt-2">
                        {{ $errors->first('balance') }}
                    </div>
                @endif
            </div>
            <button type="submit" class="bg-primary-100 hover:bg-primary-dark hover:text-text-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Update Balance
            </button>
        </form>
    </div>
    </main>
    @include('layouts.footer')
</body>

</html>
