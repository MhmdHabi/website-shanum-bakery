<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shanum Bakery</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Oswald:wght@200..700&family=Tangerine:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
</head>

<body>
    <div class="relative bg-cover bg-center h-screen" style="background-image: url('{{ asset('asset/bakery.jpg') }}');">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-black opacity-50"></div>

        @include('components.navbar')

        <div class="h-full flex items-center justify-center text-center text-white relative z-10">
            <div>
                <div class="flex items-center justify-center" data-aos="fade-down" data-aos-duration="2000">
                    <img id="profile-picture" src="{{ asset('asset/bakery_logo.png') }}" alt="Profile Picture"
                        class="w-2/5 object-cover p-0">
                </div>
                <h1 class="text-5xl font-bold mb-4 cursor-pointer" data-aos="fade-up" data-aos-duration="2000">Selamat
                    Datang di Shanum Bakery</h1>
                <p class="text-xl mb-6 font-[Lora]" data-aos="fade-up" data-aos-duration="2000">Tempat terbaik untuk
                    menemukan produk roti yang segar
                    dan lezat</p>
                <div data-aos="fade-up" data-aos-duration="2000">
                    <a href="{{ route('product.index') }}"
                        class="text-white py-2 px-4 rounded-lg font-semibold bg-yellow-500">Our
                        Products</a>
                </div>
            </div>
        </div>
    </div>

    <div class="py-20 bg-gray-100">
        <div class="container mx-auto px-6 lg:px-20">
            <h2 class="text-5xl font-bold text-center font-[Tangerine] text-yellow-500" data-aos="zoom-in"
                data-aos-duration="2000">Discover</h2>
            <h2 class="text-4xl font-bold mb-4 text-center" data-aos="zoom-in" data-aos-duration="2000">OUR STORY</h2>
            <p class="text-xl mb-6 text-center font-[Lora]" data-aos="fade-up" data-aos-duration="2000">Shanum Bakery
                memiliki sejarah panjang dalam menyajikan roti
                yang segar dan lezat. Dibentuk dengan bahan-bahan berkualitas tinggi dan resep tradisional, kami
                memastikan setiap produk kami menjadi yang terbaik. Kunjungi kami dan nikmati sejarah roti kami sendiri.
            </p>
            <div class="flex flex-wrap justify-center gap-8">
                <div id="about-section" class="max-w-xs p-6 bg-white rounded-lg shadow-lg transition duration-300"
                    data-aos="fade-up">
                    <h3 class="text-2xl mb-2 font-semibold font-[Oswald] text-center lg:text-left text-yellow-500">Our
                        Mission</h3>
                    <p class="text-center lg:text-left">Memberikan produk roti berkualitas tinggi kepada pelanggan kami
                        dengan
                        menggunakan bahan-bahan
                        terbaik dan resep tradisional.</p>
                </div>
                <div id="products-section" class="max-w-xs p-6 bg-white rounded-lg shadow-lg transition duration-300"
                    data-aos="fade-up" data-aos-delay="200">
                    <h3 class="text-2xl font-semibold mb-2 font-[Oswald] text-center lg:text-left text-yellow-500">Our
                        Vision</h3>
                    <p class="text-center lg:text-left">Menjadi bakery terbaik yang dikenal karena kualitas dan
                        kelezatan produknya di seluruh dunia.</p>
                </div>
                <div id="contact-section" class="max-w-xs p-6 bg-white rounded-lg shadow-lg transition duration-300"
                    data-aos="fade-up" data-aos-delay="300">
                    <h3 class="text-2xl font-semibold mb-2 font-[Oswald] text-center lg:text-left text-yellow-500">Our
                        Values</h3>
                    <p class="text-center lg:text-left">Integritas, kualitas, dan kepuasan pelanggan adalah nilai-nilai
                        inti yang kami pegang teguh dalam
                        setiap aspek bisnis kami.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Keterangan Section -->
    <div class="relative bg-cover bg-center bg-bg2 py-20"
        style="background-image: url('{{ asset('asset/bg2.jpg') }}');">
        <div class="absolute inset-0 bg-black opacity-60"></div> <!-- Overlay semi-transparent -->

        <div class="container mx-auto px-6 lg:px-20 text-center text-white relative z-10" data-aos="zoom-in"
            data-aos-duration="2000">
            <h2 class="text-4xl font-bold mb-4">Discover Our Amazing Bakery</h2>
            <p class="text-xl mb-6">Nikmati sensasi cita rasa roti terbaik dari bahan-bahan alami dan proses
                tradisional.</p>
            <a href="{{ route('product.index') }}"
                class="text-white py-2 px-4 rounded-lg font-semibold bg-yellow-500">Learn More</a>
        </div>
    </div>

    <!-- Products Favorites Section -->
    <div class="bg-white py-10 lg:py-20">
        <div class="container mx-auto px-6 lg:px-20">
            <h2 class="text-5xl font-bold text-center font-[Tangerine] text-yellow-500 mb-8 lg:mb-10"
                data-aos="fade-down" data-aos-duration="2000">
                Products
                Favorites</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 justify-center">
                @foreach ($products as $product)
                    <div class="p-4 bg-gray-200 rounded-lg shadow-lg" data-aos="fade-up" data-aos-delay="300">
                        @foreach (json_decode($product->images) as $image)
                            <img src="{{ asset('storage/images/' . $image) }}" alt="{{ $product->name }}"
                                class="w-full h-52 object-cover rounded-lg mb-4">
                        @endforeach
                        <h3
                            class="text-xl lg:text-2xl mb-2 font-semibold font-Oswald text-center text-yellow-500 leading-tight">
                            {{ $product->name }}</h3>
                        <p class="text-center mb-4 line-clamp-3">{{ $product->description }}</p>
                        <p class="text-center font-bold text-lg mb-4">Rp
                            {{ number_format($product->price, 0, ',', '.') }}
                        </p>
                        <div class="flex justify-center">
                            <a href="{{ route('product.index') }}"
                                class="bg-yellow-500 text-white py-2 px-4 rounded-lg font-semibold hover:bg-yellow-600 transition duration-300">View
                                Product</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    @include('components.footer')

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('js/navbar.js') }}"></script>
    <script>
        AOS.init({
            once: true, // Only initialize AOS once
            duration: 800 // Animation duration
        });
    </script>
</body>

</html>
