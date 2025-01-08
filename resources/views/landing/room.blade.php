@extends('landing.template')

@section('content')
    <section class="text-gray-600 body-font">
        <div class="container px-5 mx-auto flex flex-col">
            <div class="lg:w-4/6 mx-auto">
                <div class="rounded-lg h-96 overflow-hidden">
                    <img alt="content" class="object-cover object-center h-full w-full"
                        src="{{ asset('storage/' . $roomType->image) }}">
                </div>
                <div class="text-gray-600">
                    <div class="container flex flex-wrap px-5 py-24 mx-auto">
                        <div
                            class="md:w-1/2 md:pr-12 md:py-8 md:border-r md:border-b-0 mb-10 md:mb-0 pb-10 border-b border-gray-200">
                            <h1 class="text-black text-2xl mb-6">{{ $roomType->name }}
                            </h1>
                            <p class="leading-relaxed text-base mb-4">{{ $roomType->description }}</p>
                            <div class="flex items-center mb-6">
                                <span class="mr-3">Size</span>
                                <div class="rounded border border-gray-300 py-2 text-base pl-3 pr-3">
                                    <p>{{ $roomType->room_size }} m²</p>
                                </div>
                            </div>
                            <div class="flex">
                                <span class="text-black text-2xl">Rp.
                                    {{ number_format($roomType->price, 0, ',', '.') }}</span>
                                <button
                                    class="flex ml-auto text-white bg-black border-0 py-2 px-6 focus:outline-none hover:bg-gray-600 rounded text-base">Pesan</button>
                            </div>
                        </div>
                        <div class="flex flex-col md:w-1/2 md:pl-12">
                            <div class="items-center mb-6">
                                <span class="mr-3">Fasilitas Kamar</span>
                                <ul class="mt-2">
                                    @forelse ($roomFacilities as $roomFacility)
                                        <li class="rounded border border-gray-300 py-2 text-base pl-3 pr-3">
                                            {{ $roomFacility->kamar }}</li>
                                    @empty
                                        <li class="rounded border border-gray-300 py-2 text-base pl-3 pr-3">Tidak ada
                                            fasilitas
                                            kamar.</li>
                                    @endforelse
                                </ul>
                            </div>

                            <div class="items-center mb-6">
                                <span class="mr-3">Fasilitas Umum</span>
                                <ul class="mt-2">
                                    @forelse ($roomFacilities as $roomFacility)
                                        <li class="rounded border border-gray-300 py-2 text-base pl-3 pr-3">
                                            {{ $roomFacility->umum }}</li>
                                    @empty
                                        <li class="rounded border border-gray-300 py-2 text-base pl-3 pr-3">Tidak ada
                                            fasilitas
                                            umum.</li>
                                    @endforelse
                                </ul>
                            </div>

                            <div class="items-center mb-6">
                                <span class="mr-3">Perlengkapan Tidur</span>
                                <ul class="mt-2">
                                    @forelse ($roomFacilities as $roomFacility)
                                        <li class="rounded border border-gray-300 py-2 text-base pl-3 pr-3">
                                            {{ $roomFacility->perlengkapan_tidur }}</li>
                                    @empty
                                        <li class="rounded border border-gray-300 py-2 text-base pl-3 pr-3">Tidak ada
                                            perlengkapan tidur.</li>
                                    @endforelse
                                </ul>
                            </div>

                            <div class="items-center mb-6">
                                <span class="mr-3">Makan</span>
                                <ul class="mt-2">
                                    @forelse ($roomFacilities as $roomFacility)
                                        <li class="rounded border border-gray-300 py-2 text-base pl-3 pr-3">
                                            {{ $roomFacility->makan }}</li>
                                    @empty
                                        <li class="rounded border border-gray-300 py-2 text-base pl-3 pr-3">Tidak ada
                                            fasilitas makan.</li>
                                    @endforelse
                                </ul>
                            </div>

                            <div class="items-center mb-6">
                                <span class="mr-3">Media</span>
                                <ul class="mt-2">
                                    @forelse ($roomFacilities as $roomFacility)
                                        <li class="rounded border border-gray-300 py-2 text-base pl-3 pr-3">
                                            {{ $roomFacility->media }}</li>
                                    @empty
                                        <li class="rounded border border-gray-300 py-2 text-base pl-3 pr-3">Tidak ada
                                            fasilitas media.</li>
                                    @endforelse
                                </ul>
                            </div>

                            <div class="items-center mb-6">
                                <span class="mr-3">Kamar Mandi</span>
                                <ul class="mt-2">
                                    @forelse ($roomFacilities as $roomFacility)
                                        <li class="rounded border border-gray-300 py-2 text-base pl-3 pr-3">
                                            {{ $roomFacility->kamar_mandi }}</li>
                                    @empty
                                        <li class="rounded border border-gray-300 py-2 text-base pl-3 pr-3">Tidak ada
                                            fasilitas kamar mandi.</li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
