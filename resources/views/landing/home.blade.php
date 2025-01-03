<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel Hebat - Penginapan Sempurna Gampang Dipesan</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">
    <meta name="description" content="Free open source Tailwind CSS Store template">
    <meta name="keywords"
        content="tailwind,tailwindcss,tailwind css,css,starter template,free template,store template, shop layout, minimal, monochrome, minimalistic, theme, nordic">

    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">

    <style>
        .work-sans {
            font-family: 'Work Sans', sans-serif;
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

        section {
            margin: 20px;
        }
    </style>

</head>

<body class="bg-white text-gray-500 work-sans leading-normal text-base tracking-normal">

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
            <button
                class="inline-flex items-center bg-black border-0 py-1 px-3 focus:outline-none hover:bg-gray-800 rounded text-white mt-4 md:mt-0">
                Pemesanan Saya
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>
    </header>

    {{-- Carousel --}}
    <div class="carousel relative container mx-auto" style="max-width:1600px;" id="beranda">
        <div class="carousel-inner relative overflow-hidden w-full">
            <!--Slide 1-->
            <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true"
                hidden="" checked="checked">
            <div class="carousel-item absolute opacity-0" style="height:50vh;">
                <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-right"
                    style="background-image: url('img/hotel.jpg');">
                    <div class="container mx-auto">
                        <div
                            class="flex flex-col w-full lg:w-1/3 md:ml-16 items-center md:items-start px-12 tracking-wide">
                            <p class="text-black text-3xl my-4">Lokasi Strategis, Liburan Tanpa Repot</p>
                        </div>
                    </div>
                </div>
            </div>
            <label for="carousel-3"
                class="prev control-1 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
            <label for="carousel-2"
                class="next control-1 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

            <!--Slide 2-->
            <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true"
                hidden="">
            <div class="carousel-item absolute opacity-0 bg-cover bg-right" style="height:50vh;">
                <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-right"
                    style="background-image: url('img/live-cooking.jpg');">
                    <div class="container mx-auto">
                        <div
                            class="flex flex-col w-full lg:w-1/3 md:ml-16 items-center md:items-start px-12 tracking-wide">
                            <p class="text-white text-3xl my-4">Saksikan Live Cooking Show di Hotel Kami!</p>
                        </div>
                    </div>
                </div>
            </div>
            <label for="carousel-1"
                class="prev control-2 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
            <label for="carousel-3"
                class="next control-2 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

            <!--Slide 3-->
            <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true"
                hidden="">
            <div class="carousel-item absolute opacity-0" style="height:50vh;">
                <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-bottom"
                    style="background-image: url('img/kids.jpg');">
                    <div class="container mx-auto">
                        <div
                            class="flex flex-col w-full lg:w-1/3 md:ml-16 items-center md:items-start px-12 tracking-wide">
                            <p class="text-white text-3xl my-4">Tersedia Kids' Playground, Tempat Main Anak yang Aman
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <label for="carousel-2"
                class="prev control-3 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
            <label for="carousel-1"
                class="next control-3 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

            <!-- Add additional indicators for each slide-->
            <ol class="carousel-indicators">
                <li class="inline-block mr-3">
                    <label for="carousel-1"
                        class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                </li>
                <li class="inline-block mr-3">
                    <label for="carousel-2"
                        class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                </li>
                <li class="inline-block mr-3">
                    <label for="carousel-3"
                        class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                </li>
            </ol>

        </div>
    </div>

    {{-- Hero --}}
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-12 mx-auto">
            <div
                class="flex lg:w-2/3 w-full sm:flex-row flex-col mx-auto px-8 sm:space-x-4 sm:space-y-0 space-y-4 sm:px-0 items-end">
                <div class="relative flex-grow w-full">
                    <label for="check-in" class="leading-7 text-sm text-gray-600">Check-In</label>
                    <input type="date" id="check-in" name="check-in"
                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-2 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <div class="relative flex-grow w-full">
                    <label for="check-out" class="leading-7 text-sm text-gray-600">Check-Out</label>
                    <input type="date" id="check-out" name="check-out"
                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-2 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <div class="relative flex-grow w-full">
                    <label for="jumlah-kamar" class="leading-7 text-sm text-gray-600">Jumlah Kamar</label>
                    <input type="number" id="jumlah-kamar" name="jumlah-kamar"
                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-2 px-3 leading-8 transition-colors duration-200 ease-in-out"
                        placeholder="1">
                </div>
                <button
                    class="text-white bg-black border-0 py-2 px-6 focus:outline-none hover:bg-gray-600 rounded text-base">
                    Cek Harga
                </button>
            </div>
        </div>
    </section>

    {{-- Kamar Dan Tarif --}}
    <section class="bg-white py-12" id="kamar">
        <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">
            <nav id="store" class="w-full z-30 top-0 px-6 py-1">
                <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">
                    <h1 class="text-black text-2xl my-4 mb-2 ">
                        Kamar dan Tarif
                    </h1>
                </div>
            </nav>

            @foreach ($roomTypes as $roomType)
                <div class="w-full md:w-1/3 xl:w-1/4 p-5 flex flex-col">
                    <a href="#">
                        <img class="hover:grow hover:shadow-lg rounded-lg" src="{{ $roomType->image }}">
                        <div class="pt-3 flex items-center justify-between">
                            <p class="pt-2 text-gray-900">{{ $roomType->name }}</p>
                            <p class="pt-2 text-gray-900">Rp.{{ number_format($roomType->price, 0, ',', '.') }}</p>
                        </div>
                        <p class="pt-2 text-gray-500">{{ $roomType->description }}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Tentang Hotel --}}
    <section class="text-gray-600 body-font" id="tentang">
        <div class="container mx-auto flex px-5 py-20 md:flex-row flex-col items-center">
            <div class="container px-5 py-18 mx-auto flex sm:flex-nowrap flex-wrap">
                <div
                    class="lg:w-1/2 md:w-1/2 bg-gray-300 rounded-lg overflow-hidden sm:mr-10 p-10 flex items-end justify-start relative">
                    <iframe width="100%" height="100%" class="absolute inset-0" frameborder="0" title="map"
                        marginheight="0" marginwidth="0" scrolling="no"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63453.766565760205!2d107.249260876945!3d-6.282074663890408!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69780f4b22834f%3A0x3f21d3f70aaef632!2sKarawang%20Barat%2C%20Kec.%20Karawang%20Bar.%2C%20Karawang%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1735877698425!5m2!1sid!2sid"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <div class="bg-white relative flex flex-wrap py-6 rounded shadow-md">
                        <div class="lg:w-1/2 px-6">
                            <h2 class="text-gray-900 tracking-widest text-xs">Alamat</h2>
                            <p class="mt-1">Jl. Raya Karawang No. 12, City Center, Karawang, Indonesia.
                            </p>
                        </div>
                        <div class="lg:w-1/2 px-6 mt-4 lg:mt-0">
                            <h2 class="text-gray-900 tracking-widest text-xs">Email</h2>
                            <a class="text-indigo-500 leading-relaxed">info@hebat.com</a>
                            <h2 class="text-gray-900 tracking-widest text-xs mt-4">Telepon
                            </h2>
                            <p class="leading-relaxed">812-3456</p>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/2 md:w-1/2 bg-white flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0">
                    <h1 class="text-black text-2xl my-4 mb-2">
                        Tentang Hotel</h1>
                    <p class="mb-8 leading-relaxed">Hotel Hebat memiliki 123 kamar dengan fasilitas lengkap.
                        Berjarak
                        2.3 km dari Lussie Plaza. Menyediakan layanan spa eksklusif untuk relaksasi maksimal.</p>
                    <h1 class="text-black text-2xl my-4 mb-2">
                        Kenyamanan</h1>
                    <p class="mb-8 leading-relaxed">Dengan layanan yang ramah dan fasilitas seperti kolam renang, spa,
                        serta restoran berbintang, Hotel Hebat selalu memberikan pengalaman yang tak terlupakan bagi
                        setiap pengunjungnya.</p>
                    <div class="flex lg:flex-row md:flex-col">
                        <a href="/"
                            class="bg-black inline-flex py-3 px-5 rounded-lg items-center hover:bg-gray-800 focus:outline-none">
                            <svg class="h-8 w-8 text-gray-200" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="ml-4 flex items-start flex-col leading-none">
                                <p class="leading-relaxed text-gray-200">Pusat Kota</p>
                                <p class="leading-relaxed text-white">Karawang 4.3 km</p>
                            </span>
                        </a>
                        <a href="/"
                            class="bg-black inline-flex py-3 px-5 rounded-lg items-center lg:ml-4 md:ml-0 ml-4 md:mt-4 mt-0 lg:mt-0 hover:bg-gray-800 focus:outline-none">
                            <svg class="h-8 w-8 text-gray-200" width="24" height="24" viewBox="0 0 24 24"
                                stroke-width="1.2" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <path d="M15 12h5a2 2 0 0 1 0 4h-15l-3 -6h3l2 2h3l-2 -7h3z"
                                    transform="rotate(-15 12 12) translate(0 -1)" />
                                <line x1="3" y1="21" x2="21" y2="21" />
                            </svg>
                            <span class="ml-4 flex items-start flex-col leading-none">
                                <p class="leading-relaxed text-gray-200">Bandara</p>
                                <p class="leading-relaxed text-white">Haliem Jakarta 32
                                    km</p>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
    </section>

    {{-- Fasilitas Hotel --}}
    <section class="text-gray-600 body-font" id="fasilitas">
        <div class="container px-5 py-20 mx-auto flex flex-wrap">
            <div class="flex w-full mb-8 flex-wrap">
                <h1 class="text-black text-2xl my-4 mb-2">Fasilitas Umum Hotel</h1>
            </div>
            <div class="flex flex-wrap -m-4">
                @foreach ($hotelFacilities as $hotelFacility)
                    <div class="lg:w-1/3 sm:w-1/2 p-2">
                        <div class="flex relative">
                            <img alt="gallery"
                                class="absolute inset-0 w-full h-full object-cover object-center rounded-md"
                                src="{{ $hotelFacility->image }}">
                            <div
                                class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                <h1 class="title-font text-lg font-medium text-gray-900 mb-3">
                                    {{ $hotelFacility->name }}</h1>
                                <p class="leading-relaxed">{{ $hotelFacility->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

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
