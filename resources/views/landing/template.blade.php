<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel Hebat - Lokasi Strategis, Liburan Tanpa Repot</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">
    <meta name="description" content="Free open source Tailwind CSS Store template">
    <meta name="keywords"
        content="tailwind,tailwindcss,tailwind css,css,starter template,free template,store template, shop layout, minimal, monochrome, minimalistic, theme, nordic">

    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@300..900&display=swap" rel="stylesheet">


    <style>
        .red-hat {
            font-family: "Red Hat Display", serif;
            font-optical-sizing: auto;
            font-style: normal;
        }

        #menu-toggle:checked+#menu {
            display: block;
        }

        .hover\:grow {
            transition: all 0.3s;
            transform: scale(1);
        }

        .hover\:grow:hover {
            transform: scale(1.02);
        }

        .carousel-open:checked+.carousel-item {
            position: static;
            opacity: 100;
        }

        .carousel-item {
            -webkit-transition: opacity 0.6s ease-out;
            transition: opacity 0.6s ease-out;
        }

        #carousel-1:checked~.control-1,
        #carousel-2:checked~.control-2,
        #carousel-3:checked~.control-3 {
            display: block;
        }

        .carousel-indicators {
            list-style: none;
            margin: 0;
            padding: 0;
            position: absolute;
            bottom: 2%;
            left: 0;
            right: 0;
            text-align: center;
            z-index: 10;
        }

        #carousel-1:checked~.control-1~.carousel-indicators li:nth-child(1) .carousel-bullet,
        #carousel-2:checked~.control-2~.carousel-indicators li:nth-child(2) .carousel-bullet,
        #carousel-3:checked~.control-3~.carousel-indicators li:nth-child(3) .carousel-bullet {
            color: #000;
        }
    </style>
    
</head>

<body class="bg-white text-gray-500 red-hat leading-normal text-base tracking-normal">

    <!--Nav-->
    <header class="sticky top-0 z-50 bg-white shadow-sm">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <a class="flex title-font font-medium items-center text-black mb-4 md:mb-0">
                <img src="{{ asset('img/favicon.png') }}" alt="" class="w-10 h-10">
                <span class="ml-3 text-xl">HEBAT</span>
            </a>
            <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center">
                <a href="#beranda" class="mr-5 hover:text-gray-500">Beranda</a>
                <a href="#kamar" class="mr-5 hover:text-gray-500">Kamar</a>
                <a href="#fasilitas" class="mr-5 hover:text-gray-500">Fasilitas</a>
                <a href="#tentang" class="mr-5 hover:text-gray-500">Tentang</a>
            </nav>
            @yield('btn-nav')
        </div>
    </header>

    @yield('content')

    {{-- Footer --}}
    <hr>
    <footer class="text-gray-600 body-font">
        <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
            <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
                <img src="{{ asset('img/favicon.png') }}" class="w-10 h-10" alt="">
                <span class="ml-3 text-xl">HEBAT</span>
            </a>
            <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">©
                2024 Hotel Hebat —
                <a href="https://www.instagram.com/midoistory/" class="text-gray-600 ml-1" rel="noopener noreferrer"
                    target="_blank">@midoistory</a>
            </p>
            <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
                <a class="ml-3 text-gray-500" href="https://www.instagram.com/midoistory/">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                        <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                        <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                    </svg>
                </a>
                <a class="ml-3 text-gray-500" href="https://www.linkedin.com/in/midori-harahap-059569280/">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                        <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z" />
                        <rect x="2" y="9" width="4" height="12" />
                        <circle cx="4" cy="4" r="2" />
                    </svg>
                </a>
            </span>
        </div>
    </footer>

</body>

</html>
