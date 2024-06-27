<!DOCTYPE html>
<html lang="en" class="{{ session('theme', 'light') === 'dark' ? 'dark' : '' }}">

@include('layouts.head')

<body class="bg-white dark:bg-primary-dark dark:text-text-dark">
    @include('layouts.header')

    <main class="px-28">
        <div class="mt-6 grid grid-cols-4 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
            @foreach ($productData->sortBy('id') as $product)
                <div class="group relative">
                    <a href="{{ route('detailProduct', ['id' => $product->id]) }}">
                        <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                            <img src="https://www.waktushop.com/wp-content/uploads/2023/03/9286-1.jpg" alt="Front of men's Basic Tee in black." class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                        </div>
                    </a>
                    <div class="mt-4 flex justify-between items-center">
                        <h3 class="text-m text-gray-700">
                            <a href="{{ route('detailProduct', ['id' => $product->id]) }}">
                                {{$product->name}}
                            </a>
                        </h3>
                        <p class="text-sm font-medium text-gray-900">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    </div>
                    <a href="{{ route('getShops', ['id' => $product->shop->id]) }}">
                        <h3 class="flex flex-col text-l font-bold text-gray-700">
                            {{$product->shop->name}}
                        </h3>
                    </a>
                </div>
            @endforeach
        </div>
        <div>
            {{ $productData->links() }}
        </div>
        <div>
            <!-- Custom Next Page Button -->
            @if ($productData->hasMorePages())
                <a href="{{ $productData->nextPageUrl() }}">
                    <!-- Add any content or styling for the next page button here -->
                </a>
            @endif
        </div>
    </main>
    @include('layouts.footer')
</body>

</html>
