@extends('dashboard.admin.template')

@section('title-web', 'Ubah Ruangan')

@section('title-content', 'Ubah Ruangan')

@section('content')
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <form action="{{ route('admin.rooms.update', $room->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Nomor Ruangan</span>
                <input type="number" name="room_number" value="{{ old('room_number', $room->room_number) }}"
                    class="py-2 px-4 block w-full mt-1 text-sm border border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="101" required />
                @if ($errors->has('room_number'))
                    <p class="text-red-600 text-sm mt-1">{{ $errors->first('room_number') }}</p>
                @endif
            </label>

            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Tipe Ruangan</span>
                <select name="room_type_id"
                    class="py-2 px-4 block w-full mt-1 text-sm border border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray">
                    <option disabled selected>Pilih tipe ruangan</option>
                    @foreach ($roomTypes as $roomType)
                        <option value="{{ $roomType->id }}"
                            {{ old('room_type_id', $room->room_type_id) == $roomType->id ? 'selected' : '' }}>
                            {{ $roomType->name }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('room_type_id'))
                    <p class="text-red-600 text-sm mt-1">{{ $errors->first('room_type_id') }}</p>
                @endif
            </label>

            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Status</span>
                <select name="occupancy"
                    class="py-2 px-4 block w-full mt-1 text-sm border border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray">
                    <option value="" disabled>Pilih status</option>
                    <option value="Available" {{ old('occupancy', $room->occupancy) == 'Available' ? 'selected' : '' }}>
                        Tersedia
                    </option>
                    <option value="Occupied" {{ old('occupancy', $room->occupancy) == 'Occupied' ? 'selected' : '' }}>
                        Terisi
                    </option>
                    <option value="Maintenance" {{ old('occupancy', $room->occupancy) == 'Maintenance' ? 'selected' : '' }}>
                        Pemeliharaan
                    </option>
                </select>
                @if ($errors->has('occupancy'))
                    <p class="text-red-600 text-sm mt-1">{{ $errors->first('occupancy') }}</p>
                @endif
            </label>

            <div class="mt-6 flex justify-end">
                <a href="{{ route('admin.rooms.index') }}"
                    class="px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 bg-gray-300 border border-transparent rounded-lg active:bg-gray-400 hover:bg-gray-500 focus:outline-none focus:shadow-outline-gray">
                    Cancel
                </a>

                <button type="submit"
                    class="ml-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Edit
                </button>
            </div>
        </form>
    </div>
@endsection
