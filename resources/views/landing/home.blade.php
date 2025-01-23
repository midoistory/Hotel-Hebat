@extends('landing.template')

@section('btn-nav')
    @guest
        <!-- Jika belum login -->
        <a href="{{ route('login') }}"
            class="inline-flex items-center bg-black border-0 py-1 px-3 focus:outline-none hover:bg-gray-800 rounded text-white mt-4 md:mt-0">
            Login
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
        </a>
    @else
        @if (Auth::user()->role === 'admin')
            {{-- Jika login sebagai admin --}}
            <a
                href="{{ route('admin.dashboard') }}"class="inline-flex items-center bg-black border-0 py-1 px-3 focus:outline-none hover:bg-gray-800 rounded text-white mt-4 md:mt-0">
                Dashboard
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
            </a>
        @elseif (Auth::user()->role === 'user')
            {{-- Jika login sebagai user --}}
            <a href="{{ route('user.reservation') }}"
                class="inline-flex items-center bg-black border-0 py-1 px-3 focus:outline-none hover:bg-gray-800 rounded text-white mt-4 md:mt-0">
                Pesanan Saya
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
            </a>
        @elseif (Auth::user()->role === 'resepsionis')
            {{-- Jika login sebagai resepsionis --}}
            <a href="{{ route('resepsionis.dashboard') }}"
                class="inline-flex items-center bg-black border-0 py-1 px-3 focus:outline-none hover:bg-gray-800 rounded text-white mt-4 md:mt-0">
                Dashboard
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
            </a>
        @endif
    @endguest
@endsection

@if (session('success'))
    <div id="toast-message-cta"
        class="fixed bottom-4 right-4 w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:bg-gray-800 dark:text-gray-400"
        role="alert">
        <div class="flex">
            <div class="ms-3 text-sm">
                <div class="mb-2 text-sm">{{ session('success') }}
                </div>
                <a href="{{ route('user.reservation') }}"
                    class="inline-flex px-2.5 py-1.5 text-xs text-center text-white bg-black rounded-lg hover:bg-gray-900">Lihat
                    Pesanan</a>
            </div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-white justify-center items-center flex-shrink-0 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                data-dismiss-target="#toast-message-cta" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    </div>
@endif

<style>
    #toast-message-cta {
        position: fixed;
        bottom: 1rem;
        right: 1rem;
        z-index: 9999;
        animation: slideIn 0.3s ease-in-out;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toast = document.querySelector('#toast-message-cta');
        const closeButton = toast?.querySelector('[data-dismiss-target]');

        if (closeButton) {
            closeButton.addEventListener('click', () => {
                toast.remove();
            });
        }

        setTimeout(() => {
            toast?.remove();
        }, 20000);
    });
</script>

@section('content')
    {{-- Carousel --}}
    <div class="carousel relative container mx-auto" style="max-width:1600px;" id="beranda">
        <div class="carousel-inner relative overflow-hidden w-full">
            <!--Slide 1-->
            <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden=""
                checked="checked">
            <div class="carousel-item absolute opacity-0" style="height:50vh;">
                <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-right"
                    style="background-image: url('img/hotel.jpg');">
                    <div class="container mx-auto">
                        <div class="flex flex-col w-full lg:w-1/3 md:ml-16 items-center md:items-start px-12 tracking-wide">
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
            <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
            <div class="carousel-item absolute opacity-0 bg-cover bg-right" style="height:50vh;">
                <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-right"
                    style="background-image: url('img/live-cooking.jpg');">
                    <div class="container mx-auto">
                        <div class="flex flex-col w-full lg:w-1/3 md:ml-16 items-center md:items-start px-12 tracking-wide">
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
            <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
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
                    <label for="checkIn" class="leading-7 text-sm text-gray-600">Check In</label>
                    <input type="date" id="checkIn" name="checkIn"
                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-2 px-4 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <div class="relative flex-grow w-full">
                    <label for="checkOut" class="leading-7 text-sm text-gray-600">Check Out</label>
                    <input type="date" id="checkOut" name="checkOut"
                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-2 px-4 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <a href="#kamar"
                    class="w-full text-white bg-black rounded border py-3 px-10 focus:outline-none hover:bg-gray-900 rounded text-base">
                    Cek Ketersediaan
                </a>
            </div>
        </div>
    </section>

    {{-- Kamar Dan Tarif --}}
    <section class="bg-white py-12" id="kamar">
        <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">
            <div id="store" class="w-full z-30 top-0 px-6 py-1">
                <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">
                    <h1 class="text-black text-2xl my-4 mb-2 ">
                        Kamar dan Tarif
                    </h1>
                </div>
            </div>

            @forelse ($roomTypes as $roomType)
                <div class="w-full md:w-1/3 xl:w-1/4 p-8 flex flex-col ">
                    <a href="{{ route('landing.room.show', $roomType->id) }}">
                        <img src="{{ asset('storage/' . $roomType->image) }}" alt="Room Image" class="rounded-lg">
                        <div class="pt-3 flex items-center justify-between">
                            <p class="pt-2 text-gray-900">{{ $roomType->name }}</p>
                            <p class="pt-2 text-gray-900">Rp.{{ number_format($roomType->price, 0, ',', '.') }}</p>
                        </div>
                        <p class="leading-7 text-sm text-gray-500 pt-2">
                            {{ \Illuminate\Support\Str::words($roomType->description, 8, '...') }}
                        </p>

                        @if ($roomType->rooms_count >= 1)
                            <p class="leading-7 text-sm text-green-500 pt-2">Tersedia: {{ $roomType->rooms_count }} kamar
                            </p>
                        @endif
                    </a>
                </div>
            @empty
                <p class="text-gray-500 flex mx-auto mt-0 px-2 py-3">Tidak ada tipe kamar tersedia.</p>
            @endforelse
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
                        <div class="bg-black inline-flex py-3 px-5 rounded-lg items-center">
                            <svg class="h-8 w-8 text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="ml-4 flex items-start flex-col leading-none">
                                <p class="leading-relaxed text-gray-200">Pusat Kota</p>
                                <p class="leading-relaxed text-white">Karawang 4.3 km</p>
                            </span>
                        </div>
                        <div
                            class="bg-black inline-flex py-3 px-5 rounded-lg items-center lg:ml-4 md:ml-0 ml-4 md:mt-4 mt-0 lg:mt-0">
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
                        </div>
                    </div>
                </div>
            </div>
    </section>

    {{-- Fasilitas Hotel --}}
    <section class="bg-white py-12" id="fasilitas">
        <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">
            <div id="store" class="w-full z-30 top-0 px-6 py-1">
                <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">
                    <h1 class="text-black text-2xl">
                        Fasilitas Hotel
                    </h1>
                </div>
                <div class="flex flex-wrap -m-4 p-4">
                    @forelse ($hotelFacilities as $hotelFacility)
                        <div class="lg:w-1/3 sm:w-1/2 p-2">
                            <div class="flex relative">
                                <img alt="gallery"
                                    class="absolute inset-0 w-full h-full object-cover object-center rounded-lg border-2 border-gray-200"
                                    src="{{ asset('storage/' . $hotelFacility->image) }}" alt="Gambar Fasilitas">
                                <div
                                    class="px-8 py-20 rounded-lg relative z-10 w-full border-2 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                    <p class="leading-relaxed">{{ $hotelFacility->description }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                </div>
                <p class="text-gray-500 text-center items-center justify-center">Tidak ada fasilitas hotel
                    tersedia.</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection
