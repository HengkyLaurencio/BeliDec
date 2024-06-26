<!DOCTYPE html>
<html lang="en" class="{{ session('theme', 'light') === 'dark' ? 'dark' : '' }}">

@include('layouts.head')

<body class="bg-white dark:bg-primary-dark dark:text-text-dark">
    @include('layouts.header')

    @if (isset($shops) && $shops->isNotEmpty())
        <div class="px-28">
            <div class="mt-6 grid grid-cols-4 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                @foreach ($shops as $shop)
                    <div class="group relative">
                        <div
                            class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                            <img src="https://img.freepik.com/free-vector/we-are-open-shop-young-pine-trees_23-2148548812.jpg?t=st=1719411834~exp=1719415434~hmac=d53b3a7f81665f3bed97708f9f374aba323941436454da267ab0b080bfdb7b4c&w=740"
                                alt="Front of men&#039;s Basic Tee in black."
                                class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                        </div>
                        <div class="mt-4 flex justify-between">
                            <div>
                                <h3 class="text-lg text-black-700">
                                    <a href="{{ route('getShops', ['id' => $shop->id]) }}">
                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                        {{ $shop->name }}
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

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

    @include('layouts.footer')
</body>

</html>
