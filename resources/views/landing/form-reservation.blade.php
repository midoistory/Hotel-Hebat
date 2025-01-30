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

<body class="bg-white red-hat text-gray-600 leading-normal text-base tracking-normal">
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

            <form action="{{ route('reservation.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2  gap-4 mt-8">
                    <div class="bg-white border border-gray-200 rounded-lg shadow p-6 mb-8">
                        <h5 class="text-2xl mb-6 text-gray-800">Cara Reservasi</h5>
                        <ul class="list-inside text-gray-600 mb-10 text-xs">
                            <li class="text-black font-semibold mb-2">Ikuti langkah-langkah untuk reservasi sebagai
                                berikut:</li>
                            <li>1. Isi Data Reservasi (Detail reservasi dan Detail tamu).</li>
                            <li>2. Cek Ketersediaan Kamar (Pastikan kamar tersedia sebelum lanjut ke pembayaran)
                            </li>
                            <li>3. Lakukan Pembayaran (Transfer sesuai harga yang tertera)</li>
                            <li>4. Upload Bukti Pembayaran (Unggah bukti transaksi di form)</li>
                            <li>5. Setelah mengisi form, klik tombol "Submit" untuk mengirimkan reservasi.</li>
                            <li>6. Konfirmasi & Tunggu Persetujuan (Hotel akan memverifikasi dalam 24 jam)</li>
                            <li>7. Pemesanan lebih dari 5 kamar, silakan hubungi pihak hotel.</li>
                        </ul>
                        <div class="mt-4">
                            <p class="text-sm text-black mb-8">Scan barcode untuk pembayaran:</p>
                            <img src="{{ asset('img/barcode.gif') }}" alt="barcode" class="w-48 h-auto">
                        </div>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-lg shadow p-6 mb-8">
                        <h5 class="text-2xl mb-6 text-gray-800">Detail Pesanan</h5>
                        <table class="w-full text-sm text-gray-600 mb-8">
                            <tbody>
                                <tr>
                                    <td class="px-4 py-2">Tipe Kamar</td>
                                    <td class="px-4 py-2"><input type="hidden" name="room_type_id"
                                            value="{{ $roomType->id }}">
                                    </td>
                                </tr>
                                <tr class="bg-gray-50">
                                    <td class="px-4 py-2">Ukuran</td>
                                    <td class="px-4 py-2">{{ number_format($roomType->room_size, 0, ',', '.') }} m²</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2">Harga per Malam</td>fjum
                                    <td class="px-4 py-2">Rp {{ number_format($roomType->price, 0, ',', '.') }}</td>
                                </tr>
                                <tr class="bg-gray-50">
                                    <td class="px-4 py-2">Jumlah Kamar</td>
                                    <td class="px-4 py-2">
                                        <input type="number" name="jumlah_kamar" min="1" id="jumlah-kamar"
                                            value="{{ old('jumlah_kamar') }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                                        @if ($errors->has('jumlah_kamar'))
                                            <p class="text-red-600 text-sm mt-1">{{ $errors->first('jumlah_kamar') }}
                                            </p>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td class="px-4 py-2">Check-in</td>
                                    <td class="px-4 py-2">
                                        <input type="date" id="check-in" name="check_in"
                                            value="{{ old('check_in') ? old('check_in') : '' }}"
                                            class="border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                            required>
                                        @if ($errors->has('check_in'))
                                            <p class="text-red-600 text-sm mt-1">{{ $errors->first('check_in') }}</p>
                                        @endif
                                    </td>
                                </tr>

                                <tr class="bg-gray-50">
                                    <td class="px-4 py-2">Check-out</td>
                                    <td class="px-4 py-2">
                                        <input type="date" id="check-out" name="check_out"
                                            value="{{ old('check_out') ? old('check_out') : '' }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                            required>
                                        @if ($errors->has('check_out'))
                                            <p class="text-red-600 text-sm mt-1">{{ $errors->first('check_out') }}</p>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td class="px-4 py-2">Metode Pembayaran</td>
                                    <td class="px-4 py-2">
                                        <select name="payment_method"
                                            class="block p-2 w-full text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="" disabled selected
                                                {{ old('payment_method') == null ? 'selected' : '' }}>Pilih Metode
                                                Pembayaran</option>
                                            <option value="ovo"
                                                {{ old('payment_method') == 'ovo' ? 'selected' : '' }}>OVO</option>
                                            <option value="gopay"
                                                {{ old('payment_method') == 'gopay' ? 'selected' : '' }}>Gopay</option>
                                        </select>
                                        @if ($errors->has('payment_method'))
                                            <p class="text-red-600 text-sm mt-1">
                                                {{ $errors->first('payment_method') }}
                                            </p>
                                        @endif
                                    </td>
                                </tr>

                                <tr class="bg-gray-50">
                                    <td class="px-4 py-2">Bukti Pembayaran</td>
                                    <td class="px-4 py-2">
                                        <label class="block mt-4 text-sm">
                                            <input type="file" name="image"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                                onchange="previewImage(event)" />
                                            @if ($errors->has('image'))
                                                <p class="text-red-600 text-sm mt-1">{{ $errors->first('image') }}</p>
                                            @endif
                                        </label>

                                        <div class="mt-4" id="image-preview-container">
                                            <img id="image-preview"
                                                src="{{ old('image') ? asset('storage/reservations/' . old('image')) : (isset($reservation) ? asset('storage/' . $reservation->image) : '') }}"
                                                alt="Image Preview" class="hidden w-32 h-32 object-cover rounded-md">
                                        </div>

                                        <script>
                                            function previewImage(event) {
                                                const input = event.target;
                                                const preview = document.getElementById('image-preview');

                                                if (input.files && input.files[0]) {
                                                    const reader = new FileReader();
                                                    reader.onload = function(e) {
                                                        preview.src = e.target.result;
                                                        preview.classList.remove('hidden');
                                                    };
                                                    reader.readAsDataURL(input.files[0]);
                                                } else {
                                                    preview.src = '';
                                                    preview.classList.add('hidden');
                                                }
                                            }
                                        </script>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 font-bold">Total Harga</td>
                                    <td class="px-4 py-2 font-bold" id="total-harga" name="total_price">Rp 0</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <script>
                    const hargaPerMalam = {{ $roomType->price }};
                    const jumlahKamarInput = document.getElementById('jumlah-kamar');
                    const checkInInput = document.getElementById('check-in');
                    const checkOutInput = document.getElementById('check-out');
                    const totalHargaElement = document.getElementById('total-harga');

                    function hitungTotalHarga() {
                        const jumlahKamar = parseInt(jumlahKamarInput.value) || 1;

                        const checkInDate = new Date(checkInInput.value);
                        const checkOutDate = new Date(checkOutInput.value);

                        if (!isNaN(checkInDate) && !isNaN(checkOutDate) && checkOutDate > checkInDate) {
                            const jumlahMalam = Math.ceil((checkOutDate - checkInDate) / (1000 * 60 * 60 * 24));
                            const totalHarga = jumlahMalam * jumlahKamar * hargaPerMalam;

                            totalHargaElement.textContent = `Rp ${totalHarga.toLocaleString('id-ID')}`;
                        } else {
                            totalHargaElement.textContent = 'Rp 0';
                        }
                    }

                    jumlahKamarInput.addEventListener('input', hitungTotalHarga);
                    checkInInput.addEventListener('change', hitungTotalHarga);
                    checkOutInput.addEventListener('change', hitungTotalHarga);
                </script>

                <div class="md:col-span-2 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8">
                    <h5 class="text-2xl mb-8 text-gray-800">Detail Reservasi</h5>

                    <div class="mb-4">
                        <label for="name" class="block mb-2 text-sm text-gray-600">Nama Lengkap</label>
                        <input type="name" name="name" value="{{ old('name') }}"
                            class="border border-gray-300 text-sm text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                            placeholder="Masukkan Nama" required />
                        @if ($errors->has('name'))
                            <p class="text-red-600 text-sm mt-1">{{ $errors->first('name') }}</p>
                        @endif
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block mb-2 text-sm text-gray-600">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="border border-gray-300 text-sm text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                            placeholder="name@gmail.com" required />
                        @if ($errors->has('email'))
                            <p class="text-red-600 text-sm mt-1">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <div class="mb-4">
                        <label for="phone" class="block mb-2 text-sm text-gray-600">Nomor Telepon</label>
                        <input type="phone" name="phone" value="{{ old('phone') }}"
                            class="border border-gray-300 text-sm text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                            placeholder="Masukkan Nomor Telepon" required />
                        @if ($errors->has('phone'))
                            <p class="text-red-600 text-sm mt-1">{{ $errors->first('phone') }}</p>
                        @endif
                    </div>

                    <div class="mb-4">
                        <label for="notes" class="block mb-2 text-sm text-gray-600">Catatan</label>
                        <textarea rows="4" name="notes"
                            class="block p-2 w-full text-gray-900 text-sm rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Tambah catatan disini...">{{ old('notes') }}</textarea>
                        @if ($errors->has('notes'))
                            <p class="text-red-600 text-sm mt-1">{{ $errors->first('notes') }}</p>
                        @endif
                    </div>

                    <button type="submit"
                        class="w-full text-white bg-black hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray -300 rounded-lg px-5 py-2.5 text-center">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </section>

    <br>
    <br>
    <br>
</body>

</html>

