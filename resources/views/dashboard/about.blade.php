<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tentang Kami - Shanum Bakery</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Oswald:wght@200..700&family=Tangerine:wght@400;700&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="relative bg-cover bg-center h-screen" style="background-image: url('{{ asset('asset/about.jpg') }}');">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-black opacity-50"></div>

        <!-- Deskripsi -->
        <div class="relative flex items-center justify-center h-full">
            <div class="text-center text-white px-6 md:px-12 lg:px-24">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-[Tangerine] mb-6">Selamat Datang di Shanum Bakery</h1>
                <p class="text-lg md:text-xl lg:text-2xl font-[Lora]">Di Shanum Bakery, kami bangga menawarkan kue
                    terbaik. Dari kue-kue yang lembut hingga roti yang kaya rasa, semuanya dibuat dengan cinta dan
                    bahan-bahan terbaik. Misi kami adalah membawa sentuhan manis ke hari Anda dengan berbagai macam
                    camilan yang dipanggang segar setiap hari.</p>
            </div>
        </div>

        @include('components.navbar')
    </div>

    @include('components.footer')

    <script src="{{ asset('js/navbar.js') }}"></script>
</body>

</html>
