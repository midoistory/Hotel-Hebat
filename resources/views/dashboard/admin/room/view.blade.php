@extends('dashboard.admin.template')

@section('title-web', 'Lihat Detail Ruangan')

@section('title-content', 'Detail Ruangan')

@section('content')
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Nomor Ruangan</span>
            <input value="{{ $room->room_number }}"
                class="py-2 px-4 block w-full mt-1 text-sm border border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                readonly />
        </label>

        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Tipe Ruangan</span>
            <input value="{{ $room->roomType->name }}"
                class="py-2 px-4 block w-full mt-1 text-sm border border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                readonly />
        </label>

        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Status</span>
            <input value="{{ $room->occupancy }}"
                class="py-2 px-4 block w-full mt-1 text-sm border border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                readonly />
        </label>

        <br><br><br>
        <a href="{{ route('admin.rooms.index') }}"
            class="mt-12 px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 bg-gray-300 border border-transparent rounded-lg active:bg-gray-400 hover:bg-gray-500 focus:outline-none focus:shadow-outline-gray">
            Back
        </a>
    @endsection
