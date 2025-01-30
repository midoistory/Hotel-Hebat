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
    </style>
</head>

<body class="bg-white text-gray-500 red-hat">
    <section class="text-gray-600 body-font">
        <div class="container px-5 mx-auto">
            <div class="flex justify-end items-center mb-6">
                <a href="{{ route('landing.home') }}">
                    <svg class="h-10 w-10 text-black" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </a>
            </div>

            <div class="lg:w-4/6 mx-auto">
                <div class="rounded-lg h-96 overflow-hidden">
                    <img alt="content" class="object-cover object-center h-full w-full"
                        src="{{ asset('storage/' . $roomType->image) }}">
                </div>
                <div class="text-gray-600">
                    <div class="container flex flex-wrap py-12 mx-auto">
                        <div
                            class="md:w-1/2 md:pr-12 md:border-r md:border-b-0 mb-10 md:mb-0 pb-10 border-b border-gray-200">
                            <h1 class="text-black text-2xl mb-6">{{ $roomType->name }}</h1>
                            <p class="leading-relaxed text-base mb-4">{{ $roomType->description }}</p>
                            <div class="flex items-center mb-6">
                                <span class="mr-3">Ukuran</span>
                                <div class="rounded border border-gray-300 py-2 text-base pl-3 pr-3">
                                    <p>{{ number_format($roomType->room_size, 0, ',', '.') }} m²</p>
                                </div>
                            </div>
                            <div class="flex">
                                <span class="text-black text-xl">Rp.
                                    {{ number_format($roomType->price, 0, ',', '.') }} <span
                                        class="leading-relaxed text-base text-gray-600">/malam</span></span>
                                <a href="{{ route('landing.form-reservation', ['id' => $roomType->id]) }}"
                                    class="flex ml-auto text-white bg-black border-0 py-2 px-6 focus:outline-none hover:bg-gray-900 rounded text-base">
                                    Pesan
                                </a>
                            </div>
                        </div>
                        <div class="flex flex-col md:w-1/2 md:pl-12">
                            <div class="items-center mb-6">
                                <span class="mr-3">Fasilitas Kamar</span>
                                <ul class="mt-2">
                                    @forelse ($roomFacilities as $roomFacility)
                                        <li class="rounded border border-gray-300 py-2 text-base pl-3 pr-3">
                                            {{ $roomFacility->kamar }}</li>
                                    @empty
                                        <li class="rounded border border-gray-300 py-2 text-base pl-3 pr-3">Tidak ada
                                            fasilitas kamar.</li>
                                    @endforelse
                                </ul>
                            </div>

                            <div class="items-center mb-6">
                                <span class="mr-3">Fasilitas Umum</span>
                                <ul class="mt-2">
                                    @forelse ($roomFacilities as $roomFacility)
                                        <li class="rounded border border-gray-300 py-2 text-base pl-3 pr-3">
                                            {{ $roomFacility->umum }}</li>
                                    @empty
                                        <li class="rounded border border-gray-300 py-2 text-base pl-3 pr-3">Tidak ada
                                            fasilitas
                                            umum.</li>
                                    @endforelse
                                </ul>
                            </div>

                            <div class="items-center mb-6">
                                <span class="mr-3">Perlengkapan Tidur</span>
                                <ul class="mt-2">
                                    @forelse ($roomFacilities as $roomFacility)
                                        <li class="rounded border border-gray-300 py-2 text-base pl-3 pr-3">
                                            {{ $roomFacility->perlengkapan_tidur }}</li>
                                    @empty
                                        <li class="rounded border border-gray-300 py-2 text-base pl-3 pr-3">Tidak ada
                                            perlengkapan tidur.</li>
                                    @endforelse
                                </ul>
                            </div>

                            <div class="items-center mb-6">
                                <span class="mr-3">Makan</span>
                                <ul class="mt-2">
                                    @forelse ($roomFacilities as $roomFacility)
                                        <li class="rounded border border-gray-300 py-2 text-base pl-3 pr-3">
                                            {{ $roomFacility->makan }}</li>
                                    @empty
                                        <li class="rounded border border-gray-300 py-2 text-base pl-3 pr-3">Tidak ada
                                            fasilitas makan.</li>
                                    @endforelse
                                </ul>
                            </div>

                            <div class="items-center mb-6">
                                <span class="mr-3">Media</span>
                                <ul class="mt-2">
                                    @forelse ($roomFacilities as $roomFacility)
                                        <li class="rounded border border-gray-300 py-2 text-base pl-3 pr-3">
                                            {{ $roomFacility->media }}</li>
                                    @empty
                                        <li class="rounded border border-gray-300 py-2 text-base pl-3 pr-3">Tidak ada
                                            fasilitas media.</li>
                                    @endforelse
                                </ul>
                            </div>

                            <div class="items-center mb-6">
                                <span class="mr-3">Kamar Mandi</span>
                                <ul class="mt-2">
                                    @forelse ($roomFacilities as $roomFacility)
                                        <li class="rounded border border-gray-300 py-2 text-base pl-3 pr-3">
                                            {{ $roomFacility->kamar_mandi }}</li>
                                    @empty
                                        <li class="rounded border border-gray-300 py-2 text-base pl-3 pr-3">Tidak ada
                                            fasilitas kamar mandi.</li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
