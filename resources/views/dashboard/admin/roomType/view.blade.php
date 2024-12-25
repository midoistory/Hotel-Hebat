@extends('dashboard.admin.template')

@section('title-web', 'Show Room Type')

@section('title-content', 'Show Room Type')

@section('content')
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Room Type</span>
            <input value="{{ $roomType->name }}"
                class="py-2 px-4 block w-full mt-1 text-sm border border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                readonly />
        </label>

        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Room Size</span>
            <input type="number" name="room_size" value="{{ $roomType->room_size }}"
                class="py-2 px-4 block w-full mt-1 text-sm border border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                readonly>
        </label>

        <div class="mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Price</span>
            <input type="number" name="price" step="0.01" value="{{ $roomType->price }}"
                class="py-2 px-4 block w-full mt-1 text-sm border border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                readonly />
        </div>

        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Description</span>
            <textarea name="description"
                class="py-2 px-4 block w-full mt-1 text-sm border border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                rows="4" readonly>{{ $roomType->description }}</textarea>
        </label>

        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Room Type Image</span>
            <div class="mt-4" id="image-preview-container">
                <img id="image-preview" src="{{ asset('storage/' . $roomType->image) }}" alt="Room Type Image"
                    class="w-32 h-32 object-cover rounded-md">
            </div>
        </label>
        <br><br><br>
        <a href="{{ route('admin.roomtype.index') }}"
            class="mt-12 px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 bg-gray-300 border border-transparent rounded-lg active:bg-gray-400 hover:bg-gray-500 focus:outline-none focus:shadow-outline-gray">
            Back
        </a>
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
