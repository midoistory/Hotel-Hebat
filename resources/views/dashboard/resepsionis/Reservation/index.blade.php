@extends('dashboard.resepsionis.template')

@section('title-web', 'Data Reservasi')

@section('title-content', 'Data Reservasi')

@section('content')
    @if (session('success'))
        <div class="bg-green-500 text-white p-2 rounded-md mb-8 flex justify-between items-center px-4">
            <span>{{ session('success') }}</span>
            <button onclick="this.parentElement.style.display='none'" class="text-white ml-4">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    @endif

    <table class="w-full whitespace-no-wrap">
        <thead>
            <tr
                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <th class="px-4 py-3">Nama Tamu</th>
                <th class="px-4 py-3">Check In</th>
                <th class="px-4 py-3">Check Out</th>
                <th class="px-4 py-3">Tipe Kamar</th>
                <th class="px-4 py-3">Total Harga</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @foreach ($reservations as $reservation)
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                            <div>
                                <p class="font-semibold">{{ $reservation->name }}</p>
                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                    {{ $reservation->email }}
                                </p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-sm">{{ $reservation->check_in }}</td>
                    <td class="px-4 py-3 text-sm">{{ $reservation->check_out }}</td>
                    <td class="px-4 py-3 text-sm">{{ $reservation->roomType->name }}</td>
                    <td class="px-4 py-3 text-sm">Rp.{{ number_format($reservation->total_price, 0, ',', '.') }}</td>
                    <td class="px-4 py-3 text-sm">Belum Selesai</td>
                    <td class="px-4 py-3">
                        <a href="#"
                            class="flex items-center px-2 py-2 text-purple-600 rounded-lg focus:outline-none focus:shadow-outline-gray"
                            aria-label="Edit">
                            <svg class="h-6 w-6 text-fuchsia-500" width="24" height="24" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                                <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                                <rect x="7" y="13" width="10" height="8" rx="2" />
                            </svg>
                        </a>
                        <a href="#"
                            class="flex items-center px-2 py-2 text-purple-600 rounded-lg focus:outline-none focus:shadow-outline-gray"
                            aria-label="Delete">
                            <svg class="h-6 w-6 text-fuchsia-500" width="24" height="24" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <circle cx="12" cy="12" r="2" />
                                <path d="M2 12l1.5 2a11 11 0 0 0 17 0l1.5 -2" />
                                <path d="M2 12l1.5 -2a11 11 0 0 1 17 0l1.5 2" />
                            </svg>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div
        class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
        <span class="flex items-center col-span-3">
            Showing {{ $reservations->firstItem() }}-{{ $reservations->lastItem() }} of {{ $reservations->total() }}
        </span>
        <span class="col-span-2"></span>
        <!-- Pagination -->
        <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
            <nav aria-label="Table navigation">
                <ul class="inline-flex items-center">
                    <!-- Previous Button -->
                    <li>
                        <a href="{{ $reservations->previousPageUrl() }}"
                            class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                            aria-label="Previous">
                            <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                <path
                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd" fill-rule="evenodd"></path>
                            </svg>
                        </a>
                    </li>

                    <!-- Page Numbers -->
                    @for ($i = 1; $i <= $reservations->lastPage(); $i++)
                        <li>
                            <a href="{{ $reservations->url($i) }}"
                                class="px-3 py-1 {{ $i == $reservations->currentPage() ? 'text-white bg-purple-600' : '' }} rounded-md focus:outline-none focus:shadow-outline-purple">
                                {{ $i }}
                            </a>
                        </li>
                    @endfor

                    <!-- Next Button -->
                    <li>
                        <a href="{{ $reservations->nextPageUrl() }}"
                            class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                            aria-label="Next">
                            <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                <path
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" fill-rule="evenodd"></path>
                            </svg>
                        </a>
                    </li>
                </ul>
            </nav>
        </span>
</div> @endsection
