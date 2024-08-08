<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Oswald:wght@200..700&family=Tangerine:wght@400;700&display=swap"
        rel="stylesheet">
</head>

<body class="bg-gray-100">
    @include('components.navbar')
    <div class="container mx-auto px-6 lg:px-10 py-8 flex-grow">

        <h1 class="text-3xl font-bold text-center mb-8 mt-10">Our Products</h1>

        <div class="grid grid-cols-1 sm:-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            @foreach ($products as $product)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    @foreach (json_decode($product->images) as $image)
                        <img src="{{ asset('storage/images/' . $image) }}" alt="Product Image"
                            class="w-full h-56 object-cover">
                    @endforeach
                    <div class="p-4">
                        <h2 class="text-xl font-semibold mb-2">{{ $product->name }}</h2>
                        <p class="text-gray-700 mb-4 line-clamp-2">{{ $product->description }}</p>
                        <div class="mt-4 flex justify-between">
                            <p class="text-gray-900 font-semibold my-auto">Rp
                                {{ number_format($product->price, 0, ',', '.') }}</p>
                            <a href="{{ route('product.detail', $product->id) }}"
                                class="bg-yellow-500 text-white py-2 px-4 rounded-lg font-semibold hover:bg-yellow-600 transition duration-300">
                                Detail
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>

    @include('components.footer')

    <script src="{{ asset('js/navbar.js') }}"></script>
</body>

</html>
