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

<body class="bg-white text-gray-600 leading-normal text-base tracking-normal">
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

            <div class="grid grid-cols-1 md:grid-cols-2  gap-4 mt-8">
                <div class="bg-white border border-gray-200 rounded-lg shadow p-6 mb-8">
                    <h5 class="text-2xl mb-4 text-gray-800">Cara Reservasi</h5>
                    <ul class="list-inside text-gray-600 mb-8">
                        <li>1. Scan barcode yang di bawah ini menggunakan aplikasi OVO atau Gopay.</li>
                        <li>2. Jumlah yang dibayar harus sesuai dengan total harga di form detail pesanan.
                        </li>
                        <li>3. Screenshot bukti pembayaran, lalu unggah di form detail pesanan.</li>
                        <li>4. Lengkapi form detail tamu dan detail pesanan dengan informasi yang benar.</li>
                        <li>5. Setelah mengisi form, klik tombol "Submit" untuk mengirimkan reservasi.</li>
                        <li>6. Tunggu konfirmasi dari pihak hotel. (max: 24 jam)</li>
                    </ul>
                    <div class="mt-4">
                        <p class="text-sm text-black mb-8">Scan Barcode:</p>
                        <img src="{{ asset('img/barcode.gif') }}" alt="barcode" class="w-48 h-auto">
                    </div>
                </div>

                <div class="bg-white border border-gray-200 rounded-lg shadow p-6 mb-8">
                    <h5 class="text-2xl mb-4 text-gray-800">Detail Pesanan</h5>
                    <table class="w-full text-sm text-gray-600 mb-8">
                        <tbody>
                            <tr>
                                <td class="px-4 py-2">Tipe Kamar</td>
                                <td class="px-4 py-2">{{ $roomType->name }}</td>
                            </tr>
                            <tr class="bg-gray-50">
                                <td class="px-4 py-2">Ukuran</td>
                                <td class="px-4 py-2">{{ number_format($roomType->room_size, 0, ',', '.') }} m²</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2">Harga per Malam</td>
                                <td class="px-4 py-2">Rp {{ number_format($roomType->price, 0, ',', '.') }}</td>
                            </tr>
                            <tr class="bg-gray-50">
                                <td class="px-4 py-2">Jumlah Kamar</td>
                                <td class="px-4 py-2">
                                    <input type="number" name="jumlah_kamar"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                                    @if ($errors->has('jumlah_kamar'))
                                        <p class="text-red-600 text-sm mt-1">{{ $errors->first('jumlah_kamar') }}</p>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2">Check-in</td>
                                <td class="px-4 py-2">
                                    <input type="date" name="check_in" value="{{ old('check_in') }}"
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
                                    <input type="date" name="check_out" value="{{ old('check_out') }}"
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
                                        <option value="" disabled selected>Pilih Metode Pembayaran</option>
                                        <option value="ovo">OVO</option>
                                        <option value="gopay">Gopay</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="bg-gray-50">
                                <td class="px-4 py-2">Metode Pembayaran</td>
                                <td class="px-4 py-2">
                                    <input name="image"
                                        class="block p-1 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        aria-describedby="file_input_help" type="file"
                                        onchange="previewImage(event)">
                                    @if ($errors->has('image'))
                                        <p class="text-red-600 text-sm mt-1">{{ $errors->first('image') }}</p>
                                    @endif

                                    <div id="image-preview-container">
                                        <img id="image-preview"
                                            src="{{ old('image') ? old('image') : (isset($reservation) ? asset('storage/' . $reservation->image) : '') }}"
                                            alt="Image Preview" class="hidden w-48 h-48 object-cover rounded-md">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 font-bold">Total Harga</td>
                                <td class="px-4 py-2 font-bold">Rp. </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="md:col-span-2 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8">
                <form action="{{ route('reservation.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
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
                            placeholder="Tambah catatan disini..."></textarea>
                        @if ($errors->has('notes'))
                            <p class="text-red-600 text-sm mt-1">{{ $errors->first('notes') }}</p>
                        @endif
                    </div>

                    <button type="submit"
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg px-5 py-2.5 text-center">
                        Reservasi Sekarang
                    </button>
                </form>
            </div>
        </div>
    </section>

    <br>
    <br>
    <br>
</body>

</html>
