<!DOCTYPE html>
<html lang="en" class="{{ session('theme', 'light') === 'dark' ? 'dark' : '' }}">
<head>
  <title>Update Shop Details</title>
  @include('layouts.head')
</head>
<body class="bg-white dark:bg-gray-800">  @include('layouts.header')

  <main class="container mx-auto px-4 py-8">
    <section class="bg-white dark:bg-gray-700 shadow-md rounded-lg px-8 py-6">
      <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Update Shop Details</h1>

      @if (session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      @endif

      <form method="post" action="{{ route('updateShop', $shopData->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
          <label for="name" class="block text-gray-700 dark:text-gray-200 font-bold mb-2">Shop Name</label>
          <input type="text" name="name" id="name" placeholder="Shop Name" value="{{ old('name', $shopData->name) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
        </div>

        <div class="mb-6">
          <label for="description" class="block text-gray-700 dark:text-gray-200 font-bold mb-2">Description</label>
          <textarea name="description" id="description" placeholder="Description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">{{ old('description', $shopData->description) }}</textarea>
        </div>

        <div class="flex items-center justify-center">  <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400">Update Shop Data</button>
        </div>
      </form>
    </section>

  </main>

  @include('layouts.footer')
</body>
</html>
