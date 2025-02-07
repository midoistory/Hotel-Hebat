<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hotel Hebat - @yield('title-web')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="{{ asset('windmill/assets/css/tailwind.output.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <script src="{{ asset('windmill/assets/js/init-alpine.js') }}"></script>

    <!-- Chart.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
    <script src="{{ asset('windmill/assets/js/charts-lines.js') }}" defer></script>
    <script src="{{ asset('windmill/assets/js/charts-pie.js') }}" defer></script>
</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- Dekstop Sidebar -->
        <aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0" id="sidebar">
            <div class="py-4 text-gray-500 dark:text-gray-400">
                <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
                    Resepsionis
                </a>
                <ul class="mt-6">
                    <!-- Dashboard Menu -->
                    <li class="relative px-6 py-3"
                        :class="{ 'bg-gray-100 dark:bg-gray-900': isActive('/resepsionis/dashboard') }">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="{{ route('resepsionis.dashboard') }}">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                            <span class="ml-4">Dashboard</span>
                        </a>
                    </li>

                    <!-- Rooms Menu -->
                    <li class="relative px-6 py-3"
                        :class="{ 'bg-gray-100 dark:bg-gray-900': isActive('/resepsionis/index') }">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="{{ route('resepsionis.reservation') }}">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                </path>
                            </svg>
                            <span class="ml-4">Reservasi</span>
                        </a>
                    </li>

                    <div class="px-6 my-6">
                        <a href="{{ route('landing.home') }}"
                            class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-black border border-transparent rounded-lg active:bg-gray-600 hover:bg-gray-700 focus:outline-none focus:shadow-outline-gray">
                            View Website
                        </a>
                    </div>
                </ul>
            </div>
        </aside>

        <div class="flex flex-col flex-1 w-full">
            <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
                <div
                    class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300">
                    <!-- Search input -->
                    <form action="{{ route('resepsionis.resepsionis.search') }}" method="GET" class="flex justify-center flex-1">
                        <div class="relative w-full max-w-xl focus-within:text-purple-500">
                            <div class="absolute inset-y-0 flex items-center pl-2">
                                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input
                                class="w-full pl-8 pr-2 py-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                                type="text" placeholder="Search everything..." aria-label="Search" name="search"
                                value="{{ request('search') }}" />
                        </div>
                    </form>

                    <ul class="flex items-center flex-shrink-0 space-x-6">
                        <!-- Profile menu -->
                        <li class="relative" x-data="{ isProfileMenuOpen: false }">
                            <button @click="isProfileMenuOpen = !isProfileMenuOpen"
                                @keydown.escape="isProfileMenuOpen = false"
                                class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none"
                                aria-label="Account" aria-haspopup="true">
                                <img class="object-cover w-8 h-8 rounded-full" src="{{ asset('img/profile.png') }}"
                                    alt="" aria-hidden="true" />
                            </button>
                            <!-- Profile menu dropdown -->
                            <template x-if="isProfileMenuOpen">
                                <ul x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                    @click.away="isProfileMenuOpen = false" @keydown.escape="isProfileMenuOpen = false"
                                    class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700"
                                    aria-label="submenu">
                                    <li class="flex">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit"
                                                class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200">
                                                <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path
                                                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                                    </path>
                                                </svg>
                                                <span>Log out</span>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </template>
                        </li>
                    </ul>
                </div>

            </header>
            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid">
                    <h2
                        class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 flex justify-between items-center">
                        @yield('title-content')

                        @yield('btn-create')
                    </h2>
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
</body>

</html>
