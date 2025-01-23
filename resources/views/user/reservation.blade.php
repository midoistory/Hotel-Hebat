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
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">

</head>

<body class="bg-white text-gray-500 work-sans">
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
                        <thead class="border border-gray-400 text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 border border-gray-400" colspan="5">
                                    Detail Pesanan
                                </th>
                                <th scope="col" class="px-6 py-3 border border-gray-400" colspan="5">
                                    Detail Tamu
                                </th>
                            </tr>
                        </thead>
                        <thead class="border border-gray-400 text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-800 dark:text-gray-300">
                            <tr>
                                <th class="px-6 py-3 border border-gray-400">Tipe Kamar</th>
                                <th class="px-6 py-3 border border-gray-400">Check In</th>
                                <th class="px-6 py-3 border border-gray-400">Check Out</th>
                                <th class="px-6 py-3 border border-gray-400">Jumlah</th>
                                <th class="px-6 py-3 border border-gray-400">Harga</th>
                                <th class="px-6 py-3 border border-gray-400">Nama</th>
                                <th class="px-6 py-3 border border-gray-400">Telepon</th>
                                <th class="px-6 py-3 border border-gray-400">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservations as $reservation)
                                <tr
                                    class="border border-gray-400 bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4 border border-gray-400">{{ $reservation->roomType->name }}</td>
                                    <td class="px-6 py-4 border border-gray-400">{{ $reservation->check_in }}</td>
                                    <td class="px-6 py-4 border border-gray-400">{{ $reservation->check_out }}</td>
                                    <td class="px-6 py-4 border border-gray-400">{{ $reservation->jumlah_kamar }}</td>
                                    <td class="px-6 py-4 border border-gray-400">Rp {{ number_format($reservation->total_price, 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 border border-gray-400">{{ $reservation->name }}</td>
                                    <td class="px-6 py-4 border border-gray-400">{{ $reservation->phone }}</td>
                                    <td class="px-6 py-4 border border-gray-400">{{ $reservation->status ?? 'Belum Diproses' }}</td>
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
                        class="mt-4 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Buat Reservasi
                    </a>
                </div>
            @endif

        </div>
    </section>
</body>

</html>
