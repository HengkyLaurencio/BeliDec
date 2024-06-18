<!DOCTYPE html>
<html lang="en" class="{{ session('theme', 'light') === 'dark' ? 'dark' : '' }}">
<head>
    @include('layouts.head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Shop</title>
    <!-- Include any necessary stylesheets or scripts -->
    <style>
        /* Example inline styling for demonstration */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group textarea {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group textarea {
            resize: vertical;
            min-height: 100px; /* Adjust as needed */
        }
        .btn-primary {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .btn-primary:hover {
            background-color: #45a049;
        }
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .alert-success {
            background-color: #dff0d8;
            border-color: #d6e9c6;
            color: #3c763d;
        }
        .alert-danger {
            background-color: #f2dede;
            border-color: #ebccd1;
            color: #a94442;
        }
        h1 {
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body class="bg-white dark:bg-gray-700">
    @include('layouts.header')
    <div class="container">
        <h1>Register New Shop</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('createShop') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="shopName">Shop Name:</label>
                <input type="text" id="shopName" name="shopName" value="{{ old('shopName') }}" required>
            </div>

            <div class="form-group">
                <label for="ownerId">Owner ID:</label>
                <input type="number" id="ownerId" name="ownerId" value="{{ old('ownerId') }}" required>
            </div>

            <div class="form-group">
                <label for="Description">Description:</label>
                <textarea id="Description" name="Description" required>{{ old('Description') }}</textarea>
            </div>

            <button type="submit" class="btn-primary">Register Shop</button>
        </form>
    </div>
    @include('layouts.footer')
</body>
</html>
