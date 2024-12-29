@extends('dashboard.admin.template')

@section('title-web', 'Ubah Fasilitas Hotel')

@section('title-content', 'Ubah Fasilitas Hotel')

@section('content')
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <form action="{{ route('admin.hotelfacility.update', $hotelFacility->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Nama Fasilitas</span>
                <input type="text" name="name" value="{{ old('name', $hotelFacility->name) }}"
                    class="py-2 px-4 block w-full mt-1 text-sm border border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Kolam Renang" required />
                @if ($errors->has('name'))
                    <p class="text-red-600 text-sm mt-1">{{ $errors->first('name') }}</p>
                @endif
            </label>

            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Deskripsi</span>
                <textarea name="description"
                    class="py-2 px-4 block w-full mt-1 text-sm border border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    rows="4">{{ old('description', $hotelFacility->description) }}</textarea>
                @if ($errors->has('description'))
                    <p class="text-red-600 text-sm mt-1">{{ $errors->first('description') }}</p>
                @endif
            </label>

            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Gambar Fasilitas Hotel</span>
                <input type="file" name="image"
                    class="py-2 px-4 block w-full mt-1 text-sm border border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    onchange="previewImage(event)" />
                @if ($errors->has('image'))
                    <p class="text-red-600 text-sm mt-1">{{ $errors->first('image') }}</p>
                @endif
            </label>

            <div class="mt-4" id="image-preview-container">
                @if ($hotelFacility->image)
                    <img id="image-preview" src="{{ asset('storage/' . $hotelFacility->image) }}" alt="Current Image"
                        class="w-32 h-32 object-cover rounded-md">
                @else
                    <img id="image-preview" src="" alt="Image Preview"
                        class="hidden w-32 h-32 object-cover rounded-md">
                @endif
            </div>

            <div class="mt-6 flex justify-end">
                <a href="{{ route('admin.hotelfacility.index') }}"
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
