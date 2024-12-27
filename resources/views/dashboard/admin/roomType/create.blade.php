@extends('dashboard.admin.template')

@section('title-web', 'Buat Tipe Ruangan Baru')

@section('title-content', 'Buat Tipe Ruangan')

@section('content')
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <form action="{{ route('admin.roomtype.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Tipe Ruangan</span>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="py-2 px-4 block w-full mt-1 text-sm border border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Deluxe" required />
                @if ($errors->has('name'))
                    <p class="text-red-600 text-sm mt-1">{{ $errors->first('name') }}</p>
                @endif
            </label>

            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Luas Ruangan</span>
                <input type="number" name="room_size" value="{{ old('room_size') }}"
                    class="py-2 px-4 block w-full mt-1 text-sm border border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="30" required />
                @if ($errors->has('room_size'))
                    <p class="text-red-600 text-sm mt-1">{{ $errors->first('room_size') }}</p>
                @endif
            </label>

            <div class="mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Harga</span>
                <input type="number" name="price" step="0.01" value="{{ old('price') }}"
                    class="py-2 px-4 block w-full mt-1 text-sm border border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    required />
                @if ($errors->has('price'))
                    <p class="text-red-600 text-sm mt-1">{{ $errors->first('price') }}</p>
                @endif
            </div>

            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Deskripsi</span>
                <textarea name="description"
                    class="py-2 px-4 block w-full mt-1 text-sm border border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    rows="4">{{ old('description') }}</textarea>
                @if ($errors->has('description'))
                    <p class="text-red-600 text-sm mt-1">{{ $errors->first('description') }}</p>
                @endif
            </label>

            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Gambar Tipe Ruangan</span>
                <input type="file" name="image"
                    class="py-2 px-4 block w-full mt-1 text-sm border border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    onchange="previewImage(event)" />
                @if ($errors->has('image'))
                    <p class="text-red-600 text-sm mt-1">{{ $errors->first('image') }}</p>
                @endif
            </label>

            <div class="mt-4" id="image-preview-container">
                <img id="image-preview"
                    src="{{ old('image') ? old('image') : (isset($roomType) ? asset('storage/' . $roomType->image) : '') }}"
                    alt="Image Preview" class="hidden w-32 h-32 object-cover rounded-md">
            </div>

            <a href="{{ route('admin.roomtype.index') }}"
                class="mt-12 px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 bg-gray-300 border border-transparent rounded-lg active:bg-gray-400 hover:bg-gray-500 focus:outline-none focus:shadow-outline-gray">
                Cancel
            </a>

            <button type="submit"
                class="ml-4 mt-12 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Create
            </button>
        </form>
    </div>

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
@endsection
