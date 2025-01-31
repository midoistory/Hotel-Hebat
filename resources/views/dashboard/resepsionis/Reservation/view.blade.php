@extends('dashboard.resepsionis.template')

@section('title-web', 'Lihat Detail Reservasi')

@section('title-content', 'Detail Reservasi')

@section('content')
    <div class="grid grid-cols-2 gap-6 px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <div class="flex flex-col">
            <h2 class="mb-4 font-semibold">Detai Tamu</h2>

            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Nama</span>
                <input value="{{ $reservation->name }}"
                    class="py-2 px-4 block w-full mt-1 text-sm border border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    readonly />
            </label>

            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Email</span>
                <input value="{{ $reservation->email }}"
                    class="py-2 px-4 block w-full mt-1 text-sm border border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    readonly />
            </label>

            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">No Telepon</span>
                <input value="{{ $reservation->phone }}"
                    class="py-2 px-4 block w-full mt-1 text-sm border border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    readonly />
            </label>

            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Catatan</span>
                @if (!empty($reservation->notes))
                    <textarea name="notes"
                        class="py-2 px-4 block w-full mt-1 text-sm border border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        rows="4" readonly>{{ $reservation->notes }}</textarea>
                @else
                    <textarea name="notes"
                        class="py-2 px-4 block w-full mt-1 text-sm border border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        rows="4" readonly>Tidak ada catatan.</textarea>
                @endif
            </label>
        </div>

        <div class="flex flex-col">
            <h2 class="mb-4 font-semibold">Detai Pesanan</h2>

            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Tipe Kamar</span>
                <input value="{{ $reservation->roomType->name }}"
                    class="py-2 px-4 block w-full mt-1 text-sm border border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    readonly />
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Ukuran</span>
                <input value="{{ number_format($reservation->roomType->room_size, 0, ',', '.') }} m²"
                    class="py-2 px-4 block w-full mt-1 text-sm border border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    readonly />
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Harga Per Malam</span>
                <input value="Rp. Rp {{ number_format($reservation->roomType->price, 0, ',', '.') }}"
                    class="py-2 px-4 block w-full mt-1 text-sm border border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    readonly />
            </label>

            <label class="block mt-4 text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Jumlah Kamar</span>
                <input value="{{ $reservation->jumlah_kamar }}"
                    class="py-2 px-4 block w-full mt-1 text-sm border border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    readonly />
            </label>

            <label class="block mt-4 text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Check-In</span>
                <input value="{{ $reservation->check_in }}"
                    class="py-2 px-4 block w-full mt-1 text-sm border border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    readonly />
            </label>

            <label class="block mt-4 text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Check-Out</span>
                <input value="{{ $reservation->check_out }}"
                    class="py-2 px-4 block w-full mt-1 text-sm border border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    readonly />
            </label>

            <label class="block mt-4 text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Metode Pembayaran</span>
                <input value="{{ $reservation->payment_method }}"
                    class="py-2 px-4 block w-full mt-1 text-sm border border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    readonly />
            </label>

            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Bukti Pembayaran</span>
                <div class="mt-4" id="image-preview-container">
                    <img id="image-preview" src="{{ asset('storage/' . $reservation->image) }}" alt="Reservation Image"
                        class="w-72 h-72 object-cover rounded-md">
                </div>
            </label>

            <script>
                function previewImage(event) {
                    const file = event.target.files[0];
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const imgElement = document.getElementById('image-preview');
                        imgElement.src = e.target.result;
                        imgElement.classList.remove('hidden');
                    };

                    if (file) {
                        reader.readAsDataURL(file);
                    }
                }
            </script>
        </div>
    </div>

    <div class="mt-6 flex justify-end">
        <a href="{{ route('resepsionis.reservation') }}"
            class="px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 bg-gray-300 border border-transparent rounded-lg active:bg-gray-400 hover:bg-gray-500 focus:outline-none focus:shadow-outline-gray">
            Back
        </a>
    </div>
@endsection
