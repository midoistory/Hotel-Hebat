<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel Hebat - Memesan Hotel</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">
    <meta name="description" content="Free open source Tailwind CSS Store template">
    <meta name="keywords"
        content="tailwind,tailwindcss,tailwind css,css,starter template,free template,store template, shop layout, minimal, monochrome, minimalistic, theme, nordic">

    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">

</head>

<body class="bg-white text-gray-500 leading-normal text-base tracking-normal">
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

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 w-full">
                <div
                    class="md:col-span-2 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <form class="space-y-6" action="#">
                        <h5 class="text-black text-2xl mb-8">Detail Reservasi</h5>
                        <div class="mb-4">
                            <label for="name" class="block mb-2 text-gray-900 dark:text-white">
                                Nama Lengkap</label>
                            <input type="name" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Masukkan Nama" required />
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block mb-2 text-gray-900 dark:text-white">Email</label>
                            <input type="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="name@gmail.com">
                        </div>

                        <div class="mb-4">
                            <label for="phone" class="block mb-2 text-gray-900 dark:text-white">Nomor
                                Telepon</label>
                            <input type="phone" id="phone"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="081234234234">
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="checkIn" class="block mb-2 text-gray-900 dark:text-white">Check-in</label>
                                <input type="date" id="checkIn"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <div>
                                <label for="checkOut" class="block mb-2 text-gray-900 dark:text-white">Check-out</label>
                                <input type="date" id="checkOut"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="room_type_id" class="block mb-2 text-gray-900 dark:text-white">Tipe
                                Kamar</label>
                            <input type="hidden" id="room_type_id" value="{{ $roomType->name }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>

                        <div class="mb-4">
                            <label for="jumlahKamar" class="block mb-2 text-gray-900 dark:text-white">Jumlah
                                Kamar</label>
                            <input type="number" id="jumlahKamar"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>


                        <div class="mb-4">
                            <label for="metodePembayaran"class="block mb-2 text-gray-900 dark:text-white">Metode
                                Pembayaran</label>
                            <select name="metodePembayaran" id="metodePembayaran"
                                class="block p-2.5 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option disabled selected>Pilih Metode Pembayaran</option>
                                <option value="transferBank">Transfer Bank</option>
                                <option value="ovo">OVO</option>
                                <option value="gopay">Gopay</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="buktiPembayaran" class="block mb-2 text-gray-900 dark:text-white">Bukti
                                Pembayaran</label>
                            <input
                                class="block p-2.5 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                aria-describedby="file_input_help" id="file_input" type="file">
                        </div>

                        <div class="mb-4">
                            <label for="message" class="block mb-2 text-gray-900 dark:text-white">Catatan</label>
                            <textarea id="message" rows="4"
                                class="block p-2.5 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Tambah catatan disini..."></textarea>
                        </div>

                        <button type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Reservasi
                            Sekarang</button>
                    </form>
                </div>

                <div
                    class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <h5 class="text-black text-2xl mb-6">Detail Pesanan</h5>
                    <div>
                        <img class="rounded-t-lg mb-6" src="{{ asset('storage/' . $roomType->image) }}"
                            alt="" />
                        <div class="grid grid-col-2">
                            <h5 class="text-xl text-gray-900 dark:text-white mb-2">{{ $roomType->name }}</h5>
                            <p class="text-gray-600 dark:text-white mb-4">{{ $roomType->description }}</p>
                            <div class="flex items-center mb-6">
                                <span class="mr-3">Size</span>
                                <div class="rounded border border-gray-300 py-2 text-base pl-3 pr-3">
                                    <p>{{ number_format($roomType->room_size, 0, ',', '.') }} m²</p>
                                </div>
                            </div>
                            <h5 class="text-black text-xl mb-12">Rp.
                                {{ number_format($roomType->price, '0', ',', '.') }}
                            </h5>

                            <h5 class="text-xl text-gray-900 dark:text-white mb-8">Scan Here</h5>
                            <img src="{{ asset('img/barcode.gif') }}" alt="barcode" class="w-64 mb-4">
                            <span class="text-red-600 text-sm dark:text-white">*scan barcode untuk pembayaran.</span>

                        </div>
                    </div>
                </div>
            </div>
    </section>
</body>

</html>
