@extends('dashboard.admin.template')

@section('title-web', 'Data Rooms')

@section('title-content', 'Data Rooms')

@section('btn-create')
    <div>
        <a href="{{ route('admin.rooms.create') }}"
            class="ml-auto flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            <svg class="w-4 h-4 mr-2 -ml-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" />
                <line x1="12" y1="5" x2="12" y2="19" />
                <line x1="5" y1="12" x2="19" y2="12" />
            </svg>
            <span>Create</span>
        </a>
    </div>
@endsection

@section('content')
    @if (session('success'))
        <div class="bg-green-500 text-white p-2 rounded-md mb-8 flex justify-between items-center px-4">
            <span>{{ session('success') }}</span>
            <button onclick="this.parentElement.style.display='none'" class="text-white ml-4">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    @endif
    <table class="w-full whitespace-no-wrap">
        <thead>
            <tr
                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <th class="px-4 py-3">Room Number</th>
                <th class="px-4 py-3">Room Type</th>
                <th class="px-4 py-3">Occupancy</th>
                <th class="px-4 py-3">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @foreach ($rooms as $room)
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3 text-sm">{{ $room->room_number }}</td>
                    <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                            <div>
                                <p class="font-semibold">{{ $room->room_type }}</p>
                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                    Rp.{{ number_format($room->price, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        @if ($room->occupancy === 'Available')
                            <span
                                class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                Available
                            </span>
                        @elseif($room->occupancy === 'Occupied')
                            <span
                                class="px-2 py-1 font-semibold leading-tight text-purple-700 bg-purple-100 rounded-full dark:bg-purple-700 dark:text-purple-100">
                                Occupied
                            </span>
                        @elseif($room->occupancy === 'Maintenance')
                            <span
                                class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                Maintenance
                            </span>
                        @endif
                    </td>

                    <td class="px-4 py-3">
                        <div class="flex items-center space-x-4 text-sm">
                            <button
                                class="flex items-center px-2 py-2 text-purple-600 rounded-lg focus:outline-none focus:shadow-outline-gray"
                                aria-label="Edit">
                                <svg class="h-5 w-5 text-fuchsia-500" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                    <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                    <line x1="16" y1="5" x2="19" y2="8" />
                                </svg>
                            </button>
                            <button
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
                            </button>
                            <button
                                class="flex items-center px-2 py-2 text-purple-600 rounded-lg focus:outline-none focus:shadow-outline-gray"
                                aria-label="Delete">
                                <svg class="h-5 w-5 text-fuchsia-500" width="24" height="24" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                    <line x1="4" y1="7" x2="20" y2="7" />
                                    <line x1="10" y1="11" x2="10" y2="17" />
                                    <line x1="14" y1="11" x2="14" y2="17" />
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div
        class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
        <span class="flex items-center col-span-3">
            Showing {{ $rooms->firstItem() }}-{{ $rooms->lastItem() }} of {{ $rooms->total() }}
        </span>
        <span class="col-span-2"></span>
        <!-- Pagination -->
        <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
            <nav aria-label="Table navigation">
                <ul class="inline-flex items-center">
                    <!-- Previous Button -->
                    <li>
                        <a href="{{ $rooms->previousPageUrl() }}"
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
                    @for ($i = 1; $i <= $rooms->lastPage(); $i++)
                        <li>
                            <a href="{{ $rooms->url($i) }}"
                                class="px-3 py-1 {{ $i == $rooms->currentPage() ? 'text-white bg-purple-600' : '' }} rounded-md focus:outline-none focus:shadow-outline-purple">
                                {{ $i }}
                            </a>
                        </li>
                    @endfor

                    <!-- Next Button -->
                    <li>
                        <a href="{{ $rooms->nextPageUrl() }}"
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
    </div>

@endsection
