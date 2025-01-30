<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel Hebat - Pesanan Anda</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">
    <meta name="description" content="Free open source Tailwind CSS Store template">
    <meta name="keywords"
        content="tailwind,tailwindcss,tailwind css,css,starter template,free template,store template, shop layout, minimal, monochrome, minimalistic, theme, nordic">

    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
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

            @if ($reservations->isNotEmpty())
                <div class="bg-white border border-gray-200 rounded-lg shadow p-6 mb-8">
                    <h5 class="text-2xl mb-4 text-gray-800">Pesanan Anda</h5>
                    <table class="w-full text-sm text-gray-600 mb-8 border-collapse">
                        <thead
                            class="border border-gray-400 text-sm text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 border border-gray-400" colspan="6">
                                    Detail Pesanan
                                </th>
                                <th scope="col" class="px-6 py-3 border border-gray-400" colspan="2">
                                    Keterangan
                                </th>
                            </tr>
                        </thead>
                        <thead
                            class="border border-gray-400 text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-800 dark:text-gray-300">
                            <tr>
                                <th class="px-6 py-3 border border-gray-400">Nama Tamu</th>
                                <th class="px-6 py-3 border border-gray-400">Check In</th>
                                <th class="px-6 py-3 border border-gray-400">Check Out</th>
                                <th class="px-6 py-3 border border-gray-400">Tipe Kamar</th>
                                <th class="px-6 py-3 border border-gray-400">QYT</th>
                                <th class="px-6 py-3 border border-gray-400">Harga</th>
                                <th class="px-6 py-3 border border-gray-400">Status</th>
                                <th class="px-6 py-3 border border-gray-400">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservations as $reservation)
                                <tr
                                    class="border border-gray-400 bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-xs">
                                    <td class="px-6 py-4 border border-gray-400">{{ $reservation->name }}</td>
                                    <td class="px-6 py-4 border border-gray-400">{{ $reservation->check_in }}</td>
                                    <td class="px-6 py-4 border border-gray-400">{{ $reservation->check_out }}</td>
                                    <td class="px-6 py-4 border border-gray-400">{{ $reservation->roomType->name }}</td>
                                    <td class="px-6 py-4 border border-gray-400">{{ $reservation->jumlah_kamar }}</td>
                                    <td class="px-6 py-4 border border-gray-400">Rp
                                        {{ number_format($reservation->total_price, 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 border border-gray-400">
                                        {{ $reservation->status }}</td>
                                    <td class="flex px-6 py-4 border">
                                        <a href="{{ route('user.reservation-receipt', $reservation->id) }}"
                                            class="mr-4 text-gray-600 hover:text-gray-900">
                                            <svg class="h-6 w-6 text-black" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" />
                                                <path
                                                    d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                                                <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                                                <rect x="7" y="13" width="10" height="8" rx="2" />
                                            </svg>
                                        </a>
                                        <a href="{{ route('reservation.destroy', $reservation->id) }}"
                                            class="text-red-600 hover:text-red-900">
                                            <svg class="h-6 w-6 text-red-500" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" />
                                                <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                                <path
                                                    d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                                <path d="M10 12l4 4m0 -4l-4 4" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="bg-white border border-gray-200 rounded-lg shadow p-6">
                    <h5 class="text-xl mb-4 text-gray-800">Belum ada pesanan</h5>
                    <p class="text-gray-600">Silakan melakukan reservasi terlebih dahulu.</p>
                    <a href="{{ route('landing.home') }}"
                        class="mt-4 inline-block px-4 py-2 bg-black text-white rounded hover:bg-gray-700">
                        Buat Reservasi
                    </a>
                </div>
            @endif
        </div>
    </section>

    @if (session('success'))
        <div id="toast-bottom-left"
            class="fixed border border-black flex items-center w-full max-w-xs p-4 space-x-4 text-gray-500 bg-white divide-x rtl:divide-x-reverse divide-gray-200 rounded-lg shadow-sm right-5 bottom-5 dark:text-gray-400 dark:divide-gray-700"
            role="alert">
            <div
                class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-500 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                </svg>
            </div>
            <div class="ms-3 text-sm font-normal">{{ session('success') }}</div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                aria-label="Close" onclick="document.querySelector('#toast-bottom-left').remove()">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif
</body>

</html>
