<!DOCTYPE html>
<html lang="en" class="{{ session('theme', 'light') === 'dark' ? 'dark' : '' }}">

@include('layouts.head')

<body class="bg-white dark:bg-primary-dark dark:text-text-dark">
    @include('layouts.header')
    
    @include('layouts.menu')
    <main class="px-28">
      <div class="mt-6 grid grid-cols-4 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
      @foreach ($productData -> sortBy('id') as $product)
      <div class="group relative">
        <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
          <img src="https://www.waktushop.com/wp-content/uploads/2023/03/9286-1.jpg" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center lg:h-full lg:w-full">
        </div>
            <div class="mt-4 flex justify-between">
              <div>
                <h3 class="text-sm text-gray-700">
                    <a href="{{ route ('detailProduct',  ['id' => $product->id]) }}">
                      <span aria-hidden="true" class="absolute inset-0"></span>
                      {{$product -> name}}
                    </a>
                  </h3>
                  <p class="mt-1 text-sm text-gray-500">{{$product -> description}}</p>
                </div>
                <p class="text-sm font-medium text-gray-900">{{$product -> price}}</p>
              </div>
            </div>
        @endforeach 
      <!-- More products... -->
    </div>  
    <div>
            {{ $productData->links() }}
        </div>
        <div>
            <!-- Custom Next Page Button -->
            @if ($productData->hasMorePages())
                <a href="{{ $productData->nextPageUrl() }}">
                   
                </a>
            @endif
        </div>
    </main>
    @include('layouts.footer')
</body>

</html>