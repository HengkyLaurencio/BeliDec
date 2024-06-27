<x-shop-template>

<section class="bg-white">
  <div class="container mx-auto px-4 py-8 sm:px-6 lg:px-8">
    <main class="flex flex-col items-start justify-start px-4 py-8 sm:px-8 lg:flex-row lg:items-center lg:justify-between lg:py-12">
      <div class="max-w-xl lg:max-w-3xl w-full lg:w-2/3">

        <h1 class="mt-6 text-2xl font-bold text-gray-900 sm:text-3xl md:text-4xl">
          {{$shop->name}} Shop
        </h1>

        <p class="mt-4 leading-relaxed text-gray-500">
          {{$shop->description}}
        </p>

        <form method="post" action="{{ route('updateShop', $shop->id) }}" class="mt-12 space-y-6">
          @csrf
          @method('PUT')
          <div class="mb-5">
            <label for="name" class="mb-3 block text-base font-medium text-[#07074D] dark:text-[#FFFFFF]">
              New Shop Name
            </label>
            <input type="text" name="name" id="name" placeholder="Enter New Shop Name" value="{{ old('name', $shop->name ) }}"
              class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
          </div>

          <div class="mb-5">
            <label for="description" class="mb-3 block text-base font-medium text-[#07074D] dark:text-[#FFFFFF]">
              Description
            </label>
            <input type="text" name="description" id="description" placeholder="Enter The Desc" value="{{ old('description', $shop->description) }}"
              class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
          </div>

          <div>
            <button class="hover:shadow-form w-full rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">
              Submit
            </button>
          </div>
        </form>
      </div>
    </main>
  </div>
</section>
</x-shop-template>
