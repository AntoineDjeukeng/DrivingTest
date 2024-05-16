<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">



    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased relative">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 relative ">
        <div class=" fixed top-0 w-full bg-gray-100 dark:bg-gray-900  z-50">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow ">
                    <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

        </div>
        <!-- Page Content -->
        <main class=" mt-10">
            {{ $slot }}
        </main>
    </div>

    <div x-data="{ isOpen: false }" @click.away="isOpen = false" @scroll.window="isOpen = false"
        class="style-switcher fixed right-0 top-20 p-4 w-72 border border-gray-400 bg-gray-800 z-50 rounded-md transition-transform transform"
        :class="{ 'translate-x-full': !isOpen, 'translate-x-0': isOpen }">
        <div @click="toggleSwitcher"
            class="style-switcher-toggler s-icon absolute h-10 w-10 flex items-center text-2xl justify-center bg-gray-800 text-white right-full rounded-full border border-gray-400 transition-all duration-300 cursor-pointer">
            <i class="fas fa-cog fa-spin"></i>
        </div>

        <div class="day-night s-icon absolute h-10 w-10 text-center flex items-center justify-center text-2xl bg-gray-800 text-white right-full rounded-full border border-gray-400 transition-all duration-300 cursor-pointer"
            style="top: 3.5rem;">
            <i class="fas"></i>
        </div>
        <h4 class="text-white mb-4">Theme Colors</h4>
        <div class="colors flex flex-wrap justify-between">
            <span class="color-1 h-8 w-8 rounded-full inline-block cursor-pointer bg-red-600"
                @click="setActiveStyle('color-1')"></span>
            <span class="color-2 h-8 w-8 rounded-full inline-block cursor-pointer bg-orange-500"
                @click="setActiveStyle('color-2')"></span>
            <span class="color-3 h-8 w-8 rounded-full inline-block cursor-pointer bg-green-500"
                @click="setActiveStyle('color-3')"></span>
            <span class="color-4 h-8 w-8 rounded-full inline-block cursor-pointer bg-blue-500"
                @click="setActiveStyle('color-4')"></span>
            <span class="color-5 h-8 w-8 rounded-full inline-block cursor-pointer bg-pink-500"
                @click="setActiveStyle('color-5')"></span>
        </div>
    </div>

    <script>
        function toggleSwitcher() {
            this.isOpen = !this.isOpen;

            if (this.isOpen) {

                setTimeout(() => {
                    this.isOpen = false;
                }, 15000);
            }
        }
        const prefersDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const dayNight = document.querySelector(".day-night");
        if (prefersDarkMode) {
            dayNight.querySelector("i").classList.add("fa-moon");
        } else {
            dayNight.querySelector("i").classList.add("fa-sun");
        }
        dayNight.addEventListener("click", () => {
            const icon = dayNight.querySelector("i");
            if (icon.classList.contains("fa-sun")) {
                icon.classList.remove("fa-sun");
                icon.classList.add("fa-moon");
            } else {
                icon.classList.remove("fa-moon");
                icon.classList.add("fa-sun");
            }
        });
    </script>








    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.1.0/typed.umd.js"
        integrity="sha512-+2pW8xXU/rNr7VS+H62aqapfRpqFwnSQh9ap6THjsm41AxgA0MhFRtfrABS+Lx2KHJn82UOrnBKhjZOXpom2LQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</body>

</html>
