<!DOCTYPE html>
<html lang="en" class="{{ session('theme', 'light') === 'dark' ? 'dark' : '' }}">
<head>
    @include('layouts.head')
</head>
<body class="bg-white dark:bg-primary-dark dark:text-text-dark overflow-hidden">
    @include('layouts.header')
    <main class="px-1 py-9 flex justify-center items-center min-h-scren ">
        <div class="w-full max-w-xl">
        <form method="POST" action="{{ route('newProduct') }}" class="product-table dark:text-text-100">
            @csrf
            @method('POST')
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Create Product</h2>
            </div>

            <div class="mb-5">
                <label for="name" class="mb-3 block text-base font-medium text-[#07074D] dark:text-[#FFFFFF]">
                    Create Product Name
                </label>
                <input type="text" name="productName" id="productName" placeholder="Enter The Product Name" value="{{ old('productName') }}"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
            </div>

            <div class="mb-5">
                <label for="desc" class="mb-3 block text-base font-medium text-[#07074D] dark:text-[#FFFFFF]">
                    Description
                </label>
                <input type="text" name="Description" id="Description" placeholder="Enter The Desc" value="{{ old ('Description') }}"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
            </div>

            <div class="mb-5">
                <label for="price" class="mb-3 block text-base font-medium text-[#07074D] dark:text-[#FFFFFF]">
                    Insert Price
                </label>
                <input type="decimal" name="Price" id="Price" placeholder="Insert Price" value="{{ old ('Price') }}"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
            </div>

            <div class="mb-5">
                <label for="stock" class="mb-3 block text-base font-medium text-[#07074D] dark:text-[#FFFFFF]">
                    Insert Stock
                </label>
                <input type="integer" name="Stock" id="Stock" stock="Enter Your Stock" value="{{ old ('Stock') }}"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
            </div>

            <div class="mb-5">
                <label for="stock" class="mb-3 block text-base font-medium text-[#07074D] dark:text-[#FFFFFF]">
                    Shop ID
                </label>
                <input type="integer" name="shopID" id="shopID" stock="Enter Your Stock" value="{{ old ('shopID') }}"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
            </div>

            <div>
                <button
                    class="hover:shadow-form w-full rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">
                    Submit
                </button>
            </div>

        </form>
    </main>
    @include('layouts.footer')
</body>
</html>
