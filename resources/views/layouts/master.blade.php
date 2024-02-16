<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full" data-theme="synthwave">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link type="image/png" sizes="32x32" rel="icon" href="{{ asset('img/favicon.png') }}">

    <title>{{ config('app.name') }} | @yield('title', 'Home')</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-white">
    <nav class="bg-black border-b border-gray-600 mb-4">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-4 py-6">
            <ul class="flex flex-col md:flex-row items-center">
                <li>
                    <a href="{{ route('home') }}" class="text-xl font-bold">Ferreira Filmes</a>
                </li>
                <li class="md:ml-16 mt-3 md:mt-0">
                    <a href="#" class="hover:text-gray-300">Filmes</a>
                </li>
                <li class="md:ml-16 mt-3 md:mt-0">
                    <a href="#" class="hover:text-gray-300">Séries</a>
                </li>
                <li class="md:ml-16 mt-3 md:mt-0">
                    <a href="#" class="hover:text-gray-300">Atores</a>
                </li>
            </ul>
            <div class="flex flex-col md:flex-row items-center">
                <label class="input input-bordered bg-gray-800 input-sm flex items-center gap-2 mt-3 md:mt-0">
                    <input type="text" class="grow" placeholder="Pesquisar" />
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70"><path fill-rule="evenodd" d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z" clip-rule="evenodd" /></svg>
                </label>
                <div class="avatar ml-4 mt-3 md:mt-0">
                    <div class="w-8 rounded-full">
                        <img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" alt="Tailwind-CSS-Avatar-component" />
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div id="app" class="h-screen">
        @yield('content')
    </div>
</body>
</html>
