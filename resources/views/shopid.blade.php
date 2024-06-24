<!DOCTYPE html>
<html lang="en" class="{{ session('theme', 'light') === 'dark' ? 'dark' : '' }}">

<head>
  @include('layouts.head')
  <style>
    .bg-even {
      background-color: #f1f1f1;
    }

    .dark .bg-even {
      background-color: #282222;
    }

    table {
      width: 150%; 
    }
  </style>
</head>

<body class="bg-white dark:bg-primary-dark dark:text-text-dark">
  @include('layouts.header')

  <main class="px-6 md:px-12 lg:px-24 xl:px-48 py-4">
    <div class="overflow-x-auto">
      <table class="w-full bg-white dark:bg-primary-dark dark:text-text-dark">
        <thead class="bg-primary-200 dark:bg-gray">
          <tr>
            <th class="px-6 py-4 text-left dark:text-center">Name</th>
            <th class="px-6 py-4 text-left dark:text-center">Owner Name</th>
            <th class="px-6 py-4 text-left dark:text-center">Owner ID</th>
            <th class="px-6 py-4 text-left dark:text-center">Description</th>
          </tr>
        </thead>
        <tbody>
            <td class="px-6 py-4 text-left">{{ $shopData->name }}</td>
            <td class="px-6 py-4 text-left">{{ $shopData->user->username }}</td>
            <td class="px-6 py-4 text-left">{{ $shopData->owner_id }}</td>
            <td class="px-6 py-4 text-left">{{ $shopData->description }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </main>

  @include('layouts.footer')

</body>

</html>
