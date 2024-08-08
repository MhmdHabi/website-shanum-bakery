<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Card with Slideshow</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Oswald:wght@200..700&family=Tangerine:wght@400;700&display=swap"
        rel="stylesheet">
    <!-- Include Swiper.js CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <style>
        .swiper-container {
            width: 100%;
            height: 400px;
            margin: auto;
            position: relative;
        }

        .swiper-slide {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            /* Jarak antara gambar/video dan keterangan */
        }

        .swiper-slide img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .swiper-slide video {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .card-content {
            flex: 1;
            /* Menggunakan flex untuk memanfaatkan sisa ruang di sebelah kanan */
            padding: 20px;
            /* Padding untuk ruang di dalam card-content */
        }

        .swiper-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: #000;
            cursor: pointer;
            z-index: 10;
            font-size: 24px;
            padding: 10px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.5);
            transition: background-color 0.3s ease;
        }

        .swiper-button:hover {
            background-color: rgba(0, 0, 0, 0.1);
        }

        .swiper-button-prev {
            left: 10px;
        }

        .swiper-button-next {
            right: 10px;
        }

        @media (max-width: 768px) {
            .swiper-container {
                height: 300px;
            }

            .swiper-slide {
                flex-direction: column;
                /* Untuk tampilan responsif, stack gambar/video di atas keterangan */
                text-align: center;
                /* Pusatkan teks pada mode responsif */
                gap: 10px;
                /* Jarak antara gambar/video dan keterangan */
            }
        }
    </style>
</head>

<body class="flex flex-col min-h-screen bg-gray-100">
    @include('components.navbar')

    <div class="container mx-auto p-4 mt-20 flex-grow">
        <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-lg">
            <!-- Example Product Card with Slideshow -->
            <div class="card relative">
                <h1 class="text-center font-bold text-2xl mb-5">Detail Product {{ $product->name }}</h1>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        {{-- Tampilkan gambar jika ada --}}
                        @if ($product->images)
                            @foreach (json_decode($product->images) as $image)
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/images/' . $image) }}" alt="{{ $product->name }}">
                                </div>
                            @endforeach
                        @endif

                        {{-- Tampilkan video jika ada --}}
                        @if ($product->video)
                            <div class="swiper-slide">
                                <video controls>
                                    <source src="{{ asset('storage/videos/' . $product->video) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        @endif
                    </div>
                    <!-- Add Navigation Buttons -->
                    <div class="swiper-button swiper-button-prev">
                        <i class="fas fa-chevron-left"></i>
                    </div>
                    <div class="swiper-button swiper-button-next">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
                <!-- Product Information -->
                <div class="card-content text-center mt-2">
                    <h2 class="card-title text-2xl md:text-3xl font-bold mb-2">{{ $product->name }}</h2>
                    <p class="text-gray-700 mb-4 line-clamp-2">{{ $product->description }}</p>
                    <p class="text-xl text-gray-600 font-bold">Rp {{ number_format($product->price, 0, ',', '.') }}
                    </p>
                    <a href="{{ route('product.index') }}"
                        class="text-white bg-yellow-500 py-2 px-4 rounded-lg mt-4 inline-block hover:bg-yellow-600 transition duration-300">
                        Kembali ke Produk
                    </a>
                </div>

            </div>

            <!-- Additional Content Below Product Card -->
            <div class="mt-8">
                <h3 class="text-xl font-semibold mb-4">Informasi Tambahan</h3>
                <p class="text-gray-700">Informasi tambahan mengenai produk ini bisa ditampilkan di sini. Anda dapat
                    menambahkan apa saja seperti spesifikasi, ulasan, dan lainnya.</p>
            </div>
        </div>
    </div>

    @include('components.footer')

    <!-- Include Swiper.js -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/navbar.js') }}"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            loop: true,
        });
    </script>
</body>

</html>
