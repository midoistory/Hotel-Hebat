@extends('dashboard.resepsionis.template')

@section('title-web', 'Print Bukti Reservasi')

@section('title-content', 'Print Bukti Reservasi')

@section('btn-create')
    <div class="flex display-inline">
        <button onclick="printSection('print-area')" type="button"
            class="mr-3 ml-auto flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            <span>Print</span>
        </button>

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

        <a href="{{ route('resepsionis.reservation') }}"
            class="px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 bg-gray-300 border border-transparent rounded-lg active:bg-gray-400 hover:bg-gray-500 focus:outline-none focus:shadow-outline-gray"">
            <span>Cancel</span>
        </a>
    </div>
@endsection

@section('content')
    @foreach ($reservations as $reservation)
        <section class="text-gray-600 body-font py-8">
            <div class="bg-white rounded-lg shadow-lg px-8 py-10 max-w-xl mx-auto" id="print-area">
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center">
                        <img class="h-8 w-8 mr-2" src="{{ asset('img/favicon.png') }}" alt="Logo" />
                        <div class="text-gray-700 font-semibold text-lg">Hotel Hebat</div>
                    </div>
                    <div class="text-gray-700">
                        <div class="font-semibold text-xl mb-2 uppercase">Reservation Details</div>
                        <div class="text-sm">BOOKING ID: {{ $reservation->id }}</div>
                        <div class="text-sm">CUSTOMER ID: {{ $reservation->user_id }}</div>
                    </div>
                </div>
                <div class="border-b-2 border-gray-300 pb-8 mb-8">
                    <h2 class="text-xl mb-4">Guest Details:</h2>
                    <div class="text-gray-700 mb-2">{{ $reservation->name }}</div>
                    <div class="text-gray-500 mb-2">{{ $reservation->email }}</div>
                    <div class="text-gray-500 mb-2">{{ $reservation->phone }}</div>
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
                            <td class="py-4 text-gray-700">{{ $reservation->roomType->name }}</td>
                            <td class="py-4 text-gray-700">{{ $reservation->check_in }}</td>
                            <td class="py-4 text-gray-700">{{ $reservation->check_out }}</td>
                            <td class="py-4 text-gray-700">{{ $reservation->roomType->price }}</td>
                            <td class="py-4 text-gray-700">
                                {{ number_format($reservation->jumlah_kamar, 0, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="flex justify-end mb-8">
                    <div class="text-gray-700 mr-2">Total:</div>
                    <div class="text-gray-700 font-bold text-xl">Rp.
                        {{ number_format($reservation->total_price, 0, ',', '.') }}</div>
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
    @endforeach
@endsection
