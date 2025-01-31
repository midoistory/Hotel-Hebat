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

    <script>
        function printSection(sectionId) {
            var printContent = document.getElementById(sectionId).innerHTML;
            var originalContent = document.body.innerHTML;

            document.body.innerHTML = printContent;
            setTimeout(() => {
                window.print();
                location.reload();
            }, 500);
        }
    </script>

</head>

<body class="bg-white text-gray-500 red-hat" id="print-area">
    <section class="text-gray-600 body-font py-8">
        <div class="bg-white rounded-lg shadow-lg px-8 py-10 max-w-xl mx-auto">
            <div class="flex items-center justify-between mb-8">
                <div class="flex items-center">
                    <img class="h-8 w-8 mr-2" src="{{ asset('img/favicon.png') }}" alt="Logo" />
                    <div class="text-gray-700 font-semibold text-lg">Hotel Hebat</div>
                </div>
                <div class="text-gray-700">
                    <div class="font-semibold text-xl mb-2 uppercase">Reservation Details</div>
                    <div class="text-sm">BOOKING ID: {{ $reservations->id }}</div>
                    <div class="text-sm">CUSTOMER ID: {{ $users->id }}</div>
                </div>
            </div>
            <div class="border-b-2 border-gray-300 pb-8 mb-8">
                <h2 class="text-xl mb-4">Guest Details:</h2>
                <div class="text-gray-700 mb-2">{{ $reservations->name }}</div>
                <div class="text-gray-500 mb-2">{{ $reservations->email }}</div>
                <div class="text-gray-500 mb-2">{{ $reservations->phone }}</div>
            </div>
            <table class="w-full text-left mb-8">
                <thead>
                    <tr>
                        <th class="text-gray-700 uppercase py-2">Room Type</th>
                        <th class="text-gray-700 uppercase py-2">Check In</th>
                        <th class="text-gray-700 uppercase py-2">Check Out</th>
                        <th class="text-gray-700 uppercase py-2">Price</th>
                        <th class="text-gray-700 uppercase py-2">Qyt</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-4 text-gray-700">{{ $reservations->roomType->name }}</td>
                        <td class="py-4 text-gray-700">{{ $reservations->check_in }}</td>
                        <td class="py-4 text-gray-700">{{ $reservations->check_out }}</td>
                        <td class="py-4 text-gray-700">{{ $reservations->roomType->price }}</td>
                        <td class="py-4 text-gray-700">
                            {{ number_format($reservations->jumlah_kamar, 0, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="flex justify-end mb-8">
                <div class="text-gray-700 mr-2">Total:</div>
                <div class="text-gray-700 font-bold text-xl">Rp.
                    {{ number_format($reservations->total_price, 0, ',', '.') }}</div>
            </div>
            <div class="border-t-2 border-gray-300 pt-8 mb-8">
                <p class="text-sm text-gray-500 mb-8">Please <span class="font-bold">Print</span> the Reservation
                    Details and present it to the
                    <span class="font-bold">Hotel Hebat</span> upon check-in. If you have problem, you can call our
                    customer service center at 123-689.
                </p>
                <div class="text-gray-600 text-sm mb-2">Website: https://hotelhebat.com | email:
                    customerservice@hebat.com</div>
            </div>
        </div>
    </section>

    <div class="fixed bottom-0  w-full flex justify-between bg-white p-4">
        <div></div>
        <div class="flex items-center">
            <button onclick="printSection('print-area')"
                class="mr-4 bg-black text-white px-8 py-2 rounded-md hover:bg-gray-800">
                Print
            </button>
            <a href="{{ route('user.reservation') }}"
                class="bg-gray-300 text-gray-800 px-8 py-2 rounded-md hover:bg-gray-400">
                Cancel
            </a>
        </div>
    </div>
</body>
