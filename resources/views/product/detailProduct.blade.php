<!DOCTYPE html>
<html lang="en" class="{{ session('theme', 'light') === 'dark' ? 'dark' : '' }}">

@include('layouts.head')

<body class="bg-white dark:bg-primary-dark dark:text-text-dark">
    @include('layouts.header')
    <section class="text-gray-700 body-font overflow-hidden bg-white">
    <div class="container px-5 py-24 mx-auto">
    @if(session('error'))
    <div class="bg-red-500 text-white p-4 rounded mb-4 inline-block" >
        {{ session('error') }}
    </div>
    @elseif (session('success'))
    <div class="ml-32 lg:w-4/5 bg-green-500 text-white p-4 rounded mb-4 inline-block">
        {{ session('success') }}
        <a href="{{ route('getCartItems') }}" class="ml-4 text-white-300 hover:text-blue-500 font-bold underline">Go to Cart</a>
    </div>

    @endif
        <div class="lg:w-4/5 mx-auto flex flex-wrap">

        <img alt="ecommerce" class="lg:w-1/3 object-cover object-center rounded border border-gray-200" src="https://www.waktushop.com/wp-content/uploads/2023/03/9286-1.jpg">
        <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
            <h1 class="text-gray-900 text-5xl title-font font-medium mb-1">{{$product -> name}}</h1>
            <div class="flex mb-4">
            <span class="flex items-center">
                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                </svg>
                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                </svg>
                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                </svg>
                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                </svg>
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                </svg>
                <span class="text-gray-600 ml-3">4 Reviews</span>
            </span>

            <!-- <p class="leading-relaxed">{{$product->shop->shop_name}}</p> -->
        </div>
        <p class="leading-relaxed font-bold " >{{$product->shop->name}}</p>
            <p class="leading-relaxed">{{$product -> description}}</p>
            <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5">

            </div>

            <div class="flex ">
                <span class="title-font font-medium text-2xl text-gray-900">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                <form method="post"
                action="{{ route('putItem', ['cart_id' => $product->cart_id, 'product_id' => $product->id]) }}">
                @csrf
                @method('POST')
                <input type="number" name="quantity" id="quantity" min="1" value="1" class="border rounded px-2 py-1 ml-28 mr- w-16 text-center focus:outline-none focus:border-blue-500">
                <button class=" ml-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">Add to Cart</button>
               </form>
            </div>
        </div>
        </div>

    </div>
    </section>
    </body>
    @include('layouts.footer')
</html>
