<!DOCTYPE html>
<html lang="en" class="{{ session('theme', 'light') === 'dark' ? 'dark' : '' }}">

@include('layouts.head')

<body class="bg-white dark:bg-primary-dark dark:text-text-dark">
    @include('layouts.header')
    @if (isset($products) && $products->isNotEmpty())
        <div class="px-28">
            <div class="mt-6 grid grid-cols-4 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                @foreach ($products as $product)
                    <div class="group relative">
                        <div
                            class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                            <img src="https://www.waktushop.com/wp-content/uploads/2023/03/9286-1.jpg"
                                alt="Front of men&#039;s Basic Tee in black."
                                class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                        </div>
                        <div class="mt-4 flex justify-between">
                            <div>
                                <h3 class="text-sm text-gray-700">
                                    <a href="{{ route('detailProduct', ['id' => $product->id]) }}">
                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                        {{ $product->name }}
                                    </a>
                                </h3>

                            </div>
                            <p class="text-sm font-medium text-gray-900">Rp
                                {{ number_format($product->price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    @if (isset($shops) && $shops->isNotEmpty())
        <main class="px-6 md:px-12 lg:px-24 xl:px-48 py-4">
            <div class="overflow-x-auto">
                <table class="w-full bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                    <thead class="bg-primary-600 dark:bg-primary-900">
                        <tr>
                            <th class="px-6 py-4 text-center border-r border-b">Name</th>
                            <th class="px-6 py-4 text-center border-r border-b">Owner Name</th>
                            <th class="px-6 py-4 text-center border-r border-b">Shop ID</th>
                            <th class="px-6 py-4 text-center border-r border-b">Description</th>
                            <th class="px-6 py-4 text-center border-r border-b">History</th>
                            <th class="px-6 py-4 border-r border-b">Edit</th>
                            <th class="px-6 py-4 border-b">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($shops as $index => $shop)
                    <tr class="{{ $index % 2 == 0 ? 'bg-even' : '' }} hover:bg-primary-100 dark:hover:bg-primary-100">
                            <td class="border-r border-b px-6 py-4 text-center">{{ $shop->name }}</td>
                            <td class="border-r border-b px-6 py-4">{{ $shop->user->username }}</td>
                            <td class="border-r border-b px-6 py-4">{{ $shop->owner_id }}</td>
                            <td class="border-r border-b px-6 py-4">{{ $shop->description }}</td>
                            <td class="border-r border-b px-6 py-4 text-center">
                            <a href="{{ route('getHistory') }}">History</a>
                            </td>
                            <td class="border-r border-b px-6 py-4 text-center">
                                <a href="{{ route('editShop', $shop->owner_id) }}">Edit</a>
                            </td>
                            <td class="px-6 py-4 text-center border-b">
                                <form method="post" action="{{ route('deleteShop', ['shop' => $shop]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-text-300 text-[#FFFFFF] dark:text-black px-6 py-2">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    @endif
    @include('layouts.footer')
</body>

</html>
