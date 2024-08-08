<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Oswald:wght@200..700&family=Tangerine:wght@400;700&display=swap"
        rel="stylesheet">
</head>

<body class="flex flex-col min-h-screen bg-gray-100">
    @include('components.navbar')

    <div class="flex justify-center items-center min-h-screen mt-20 mb-5 p-3">
        <div class="max-w-2xl w-full bg-white p-6 rounded shadow-md">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Edit Product</h2>
                <a href="{{ route('index') }}"
                    class="text-gray-600 hover:text-gray-800 focus:outline-none focus:text-gray-800">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                    role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                    role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif
            <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('price')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                    <select name="category" id="category"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="favorite"
                            {{ old('category', $product->category) === 'favorite' ? 'selected' : '' }}>
                            Favorite</option>
                        <option value="biasa" {{ old('category', $product->category) === 'biasa' ? 'selected' : '' }}>
                            Biasa</option>
                    </select>
                    @error('category')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('description', $product->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="images" class="block text-sm font-medium text-gray-700">Images</label>
                    <input type="file" name="images[]" id="images" multiple
                        class="mt-1 block w-full py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('images')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    @if ($product->images)
                        <div class="mt-2">
                            <p class="text-gray-600 text-sm">Foto Sekarang:</p>
                            @foreach (json_decode($product->images) as $image)
                                <img src="{{ asset('storage/images/' . $image) }}" alt="Product Image"
                                    class="w-32 h-32 object-cover rounded-lg shadow-md mt-2">
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="mb-4">
                    <label for="video" class="block text-sm font-medium text-gray-700">Video</label>
                    <input type="file" name="video" id="video"
                        class="mt-1 block w-full py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('video')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    @if ($product->video)
                        <div class="mt-2">
                            <p class="text-gray-600 text-sm">Video Sekarang:</p>
                            <video width="320" height="240" controls class="mt-2 mx-auto block">
                                <source src="{{ asset('storage/videos/' . $product->video) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>

                        </div>
                    @endif
                </div>

                <div class="flex items-center justify-center mt-2">
                    <button type="submit"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white font-medium py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Update
                        Product</button>
                </div>
            </form>
        </div>
    </div>

    @include('components.footer')

    <script src="{{ asset('js/navbar.js') }}"></script>
</body>

</html>
