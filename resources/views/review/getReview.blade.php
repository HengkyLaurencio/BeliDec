<!DOCTYPE html>
<html lang="en" class="{{ session('theme', 'light') === 'dark' ? 'dark' : '' }}">

@include('layouts.head')

<body class="bg-white dark:bg-primary-dark dark:text-text-dark">
    @include('layouts.header')
</body>
<main class="container mx-auto px-4 py-8">
        @if (isset($reviews) && !$reviews->isEmpty())
            <div class="container mx-auto p-4">
                <div class="bg-white dark:bg-xgray-800 rounded-lg shadow p-6">
                    <!-- Header Kolom -->
                    <div class="grid grid-cols-6 gap-4 p-4 border-b border-gray-200 dark:border-gray-700">
                        <div class="col-span-2 text-gray-600 dark:text-gray-300">ReviewId</div>
                        <div class="text-gray-600 dark:text-gray-300">OrderItemId</div>
                        <div class="text-gray-600 dark:text-gray-300">Stars</div>
                        <div class="text-gray-600 dark:text-gray-300">Comments</div>
                    </div>
                    <!-- Daftar Barang -->
                    <div class="flex flex-col space-y-4 mt-4">
                        @foreach ($reviews as $review)
                            <div class="grid grid-cols-6 gap-4 items-center justify-between p-4 border-b border-gray-200 dark:border-gray-700">
                                <div class="col-span-2 flex items-center">
                                    <div class="dark:text-gray-300">
                                        <h2 class="text-lg font-semibold dark:text-gray-300">{{ $review->id }}
                                        </h2>
                                    </div>
                                </div>
                
                                <div>
                                    {{ $review->order_item_id }}
                                </div>
                                <div class="text-gray-700 dark:text-gray-200">
                                    {{ $review->stars }}
                                </div>
                                <div class="text-gray-700 dark:text-gray-200">
                                    {{ $review->comments }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @else
        @endif

        <script>
            function toggleDarkMode() {
                document.documentElement.classList.toggle('dark');
            }
        </script>
        @include('layouts.footer')
    </main>
</html>
