<nav class="fixed top-0 left-0 right-0 h-16 flex items-center justify-between bg-black px-6 lg:px-10 bg-opacity-60 z-20"
    data-aos="fade-down" data-aos-delay="400">
    <a href="{{ route('dashboard') }}" class="relative">
        <h1 class="text-white font-bold text-2xl">
            Shanum Bakery
        </h1>
    </a>
    <div class="hidden lg:flex gap-6 uppercase text-md font-[Oswald]">
        <a href="{{ route('dashboard') }}" class="text-white hover:text-yellow-500 transition duration-300">Home</a>
        <a href="{{ route('about') }}" class="text-white hover:text-yellow-500 transition duration-300">About</a>
        <a href="{{ route('product.index') }}"
            class="text-white hover:text-yellow-500 transition duration-300">Products</a>
        <a href="{{ route('maps') }}" class="text-white hover:text-yellow-500 transition duration-300">Maps</a>
        <a href="{{ route('index') }}" class="text-white hover:text-yellow-500 transition duration-300">PENJUALAN</a>
    </div>
    <div class="text-white my-auto">
        <div class="hidden lg:flex justify-center lg:justify-start gap-4 my-auto">
            <a href="https://www.facebook.com/dey.firansyah"
                class="text-white hover:text-yellow-500 transition duration-300 mt-1"><i
                    class="fab fa-xl fa-facebook"></i></a>
            <a href="https://wa.link/dou4em" class="text-white hover:text-yellow-500 transition duration-300 mt-1"><i
                    class="fab fa-xl fa-whatsapp"></i></a>
            <a href="https://www.instagram.com/shanum_bakerys/"
                class="text-white hover:text-yellow-500 transition duration-300 mt-1"><i
                    class="fab fa-xl fa-instagram"></i></a>
            <a href=""
                class="my-auto border border-yellow-500 py-1 px-3 rounded-lg font-semibold font-[Oswald] hover:bg-yellow-500">Login</a>
        </div>
        <button id="menu-button" class="lg:hidden text-white focus:outline-none">
            <i id="menu-icon" class="fas fa-bars text-2xl"></i>
        </button>
    </div>
</nav>
<div id="mobile-menu" class="hidden fixed top-16 left-0 right-0 bg-black bg-opacity-75 text-white p-6 z-20">
    <nav class="flex flex-col space-y-4">
        <a href="{{ route('dashboard') }}" class="text-white">Home</a>
        <a href="{{ route('about') }}" class="text-white">About</a>
        <a href="{{ route('product.index') }}" class="text-white">Products</a>
        <a href="{{ route('maps') }}" class="text-white">Maps</a>
        <a href="{{ route('index') }}" class="text-white">Penjualan</a>
        <div class="flex flex-col justify-center lg:justify-start">
            <div class="flex justify-center lg:justify-start gap-4 mt-2">
                <a href="https://www.facebook.com/dey.firansyah"
                    class="text-white hover:text-yellow-500 transition duration-300"><i
                        class="fab fa-lg fa-facebook"></i></a>
                <a href="https://wa.link/dou4em" class="text-white hover:text-yellow-500 transition duration-300"><i
                        class="fab fa-lg fa-whatsapp"></i></a>
                <a href="https://www.instagram.com/shanum_bakerys/"
                    class="text-white hover:text-yellow-500 transition duration-300"><i
                        class="fab fa-lg fa-instagram"></i></a>
            </div>
            <a href="" class="text-center mt-2"><button
                    class="my-auto border border-yellow-500 w-20 py-1 px-3 rounded-lg font-semibold font-[Oswald] hover:bg-yellow-500">Login</button></a>
        </div>
    </nav>
</div>
