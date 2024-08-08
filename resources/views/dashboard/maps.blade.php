<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Peta Lokasi - Shanum Bakery</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Oswald:wght@200..700&family=Tangerine:wght@400;700&display=swap"
        rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
        }
    </style>
</head>

<body class="bg-gray-100">
    <!-- Navbar -->
    @include('components.navbar')

    <main>
        <!-- Peta Lokasi Section -->
        <div class="container mx-auto px-6 lg:px-20 py-20 ">
            <h2 class="text-5xl font-bold text-center font-[Tangerine] text-yellow-500 mb-10">Peta Lokasi</h2>

            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="flex justify-center mb-6">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.008083288368!2d106.82341367304845!3d-6.520658663743342!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c1665a18c06f%3A0x19244e40f45be574!2sPerumahan%20cimandala%20permai%20sukaraja%20bogor!5e0!3m2!1sid!2sid!4v1719667719538!5m2!1sid!2sid"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <p class="text-center text-lg font-[Lora]">Shanum Bakery berlokasi di Perum Cimandala Permai, Bogor,
                    Indonesia.
                    Kami sangat mudah dijangkau dengan transportasi umum maupun kendaraan pribadi. Lihat peta di atas
                    untuk
                    menemukan lokasi kami.</p>
            </div>
        </div>
    </main>

    <!-- Footer -->
    @include('components.footer')

    <script src="{{ asset('js/navbar.js') }}"></script>
</body>

</html>
