@extends('dashboard.admin.template')

@section('title-web', 'Lihat Detail Fasilitas Hotel')

@section('title-content', 'Detail Fasilitas Hotel')

@section('content')
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Nama Fasilitas</span>
            <input type="text" name="name" value="{{ old('name', $hotelFacility->name) }}"
                class="py-2 px-4 block w-full mt-1 text-sm border border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="Kolam Renang" readonly />
        </label>

        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Deskripsi</span>
            <textarea name="description"
                class="py-2 px-4 block w-full mt-1 text-sm border border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                rows="4" readonly>{{ old('description', $hotelFacility->description) }}</textarea>
        </label>

        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Gambar Fasilitas Hotel</span>
            <div class="mt-4" id="image-preview-container">
                <img id="image-preview" src="{{ asset('storage/' . $hotelFacility->image) }}" alt="Room Type Image"
                    class="w-32 h-32 object-cover rounded-md ">
            </div>
        </label>

        <div class="mt-6 flex justify-end">
            <a href="{{ route('admin.hotelfacility.index') }}"
                class="px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 bg-gray-300 border border-transparent rounded-lg active:bg-gray-400 hover:bg-gray-500 focus:outline-none focus:shadow-outline-gray">
                Back
            </a>
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
