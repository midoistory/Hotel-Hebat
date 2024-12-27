@extends('dashboard.admin.template')

@section('title-web', 'Lihat Detail Fasilitas Ruangan')

@section('title-content', 'Detail Fasilitas Ruangan')

@section('content')
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Tipe Ruangan</span>
            <select name="room_type_id"
                class="py-2 px-4 block w-full mt-1 text-sm border border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray"
                disabled>
                <option value="{{ $roomFacility->roomType->id }}" selected>
                    {{ $roomFacility->roomType->name }}
                </option>
            </select>
        </label>

        @php
            $facilities = [
                ['name' => 'kamar', 'label' => 'Fasilitas Ruangan', 'placeholder' => 'AC, WiFi, Shower'],
                ['name' => 'umum', 'label' => 'Fasilitas Umum', 'placeholder' => 'WiFi, Brankas, Lemari pakaian'],
                ['name' => 'makan', 'label' => 'Fasilitas Makan', 'placeholder' => 'Pembuat kopi/teh, Kulkas, Air botol'],
                ['name' => 'media', 'label' => 'Fasilitas Media', 'placeholder' => 'TV layar datar, Adaptor AC/DC universal'],
                ['name' => 'perlengkapan_tidur', 'label' => 'Perlengkapan Tidur', 'placeholder' => 'Linen, Sofa'],
                ['name' => 'kamar_mandi', 'label' => 'Fasilitas Kamar Mandi', 'placeholder' => 'Handuk, Pengering, Sikat gigi'],
            ];
        @endphp

        @foreach ($facilities as $facility)
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">{{ $facility['label'] }}</span>
                <textarea name="{{ $facility['name'] }}"
                    class="py-2 px-4 block w-full mt-1 text-sm border border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    rows="2" placeholder="{{ $facility['placeholder'] }}" readonly>{{ old($facility['name'], $roomFacility->{$facility['name']}) }}</textarea>
                <p class="text-gray-500 text-xs mt-1">* Pisahkan setiap fasilitas dengan koma.</p>
            </label>
        @endforeach

        <div class="mt-6 flex justify-end">
            <a href="{{ route('admin.roomfacility.index') }}"
                class="px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 bg-gray-300 border border-transparent rounded-lg active:bg-gray-400 hover:bg-gray-500 focus:outline-none focus:shadow-outline-gray">
                Back
            </a>
        </div>
    </div>
@endsection
