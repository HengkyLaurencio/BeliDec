<!DOCTYPE html>
<html lang="en" class="{{ session('theme', 'light') === 'dark' ? 'dark' : '' }}">

<head>
    <meta charset="UTF-8">
    <title>Add Review</title>
    @include('layouts.head')
</head>

<body class="bg-white dark:bg-gray-800">
    @include('layouts.header')
    <main class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6 text-center dark:text-gray-300">Add Review</h1>
    
            <form action="{{ route('createReview', ['order_item_id' => $orderDetail->id]) }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <label for="stars">Stars:</label>
                <input type="number" name="stars" id="stars" min="1" max="5" required class="block mb-4 p-2 border">
                <label for="comments">Comments:</label>
                <textarea name="comments" id="comments" required class="block mb-4 p-2 border"></textarea>
                <button type="submit" class="bg-green-500 text-white dark:text-black px-6 py-2">
                    Submit Review
                </button>
            </form>
    </main>
    @include('layouts.footer')
</body>

</html>
