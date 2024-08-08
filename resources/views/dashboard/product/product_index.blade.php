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

<body class="flex flex-col min-h-screen bg-gray-100">
    @include('components.navbar')

    <div class="container mx-auto px-6 py-8 flex-1 mt-10">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Data Products</h2>
        <div class="px-10">
            @if (session('success'))
                <div class="bg-green-200 text-green-800 border-green-400 border-2 rounded-lg px-4 py-3 mb-4">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="bg-red-200 text-red-800 border-red-400 border-2 rounded-lg px-4 py-3 mb-4">
                    {{ session('error') }}
                </div>
            @endif
        </div>
        <div class="overflow-x-auto px-6 lg:px-10">
            <a href="{{ route('product.create') }}">
                <button class="py-2 px-4 bg-amber-500 rounded-lg text-white font-semibold mb-3"><i
                        class="fa-solid fa-plus mr-3"></i>Tambah</button>
            </a>
            <table class="min-w-full bg-white border border-gray-300 shadow-sm rounded-lg">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-3 px-4 text-left border-b border-gray-400">Image</th>
                        <th class="py-3 px-4 text-left border-b border-gray-400">Name</th>
                        <th class="py-3 px-4 text-left border-b border-gray-400">Price</th>
                        <th class="py-3 px-4 text-left border-b border-gray-400">Category</th>
                        <th class="py-3 px-4 text-left border-b border-gray-400">Description</th>
                        <th class="py-3 px-4 text-left border-b border-gray-400 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td class="py-3 px-4 border-b border-gray-400">
                                @foreach (json_decode($product->images) as $image)
                                    <img src="{{ asset('storage/images/' . $image) }}" alt="Product Image"
                                        class="w-24 h-24 object-cover rounded-lg">
                                @endforeach
                            </td>
                            <td class="py-3 px-4 border-b border-gray-400">{{ $product->name }}</td>
                            <td class="py-3 px-4 border-b border-gray-400">Rp
                                {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td class="py-3 px-4 border-b border-gray-400">{{ $product->category }}</td>
                            <td class="py-3 px-4 border-b border-gray-400">{{ $product->description }}</td>
                            <td class="py-3 px-4 border-b border-gray-400">
                                <a href="{{ route('product.edit', $product->id) }}">
                                    <button
                                        class="bg-blue-500 text-white py-2 px-4 w-full rounded-lg hover:bg-blue-600 transition duration-300 mb-2">
                                        Edit
                                    </button>
                                </a>
                                <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Are you sure you want to delete this product?')"
                                        class="bg-red-500 text-white py-2 px-4 w-full rounded-lg hover:bg-red-600 transition duration-300">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('components.footer')

    <script src="{{ asset('js/navbar.js') }}"></script>
</body>

</html>
