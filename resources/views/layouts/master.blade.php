<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100 dark:bg-purple-900">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header class="bg-black fixed inset-x-0 top-0 z-50">
        <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="md:flex md:items-center md:gap-12">
                    <a class="block text-violet-600" href="\">
                        <span class="sr-only">
                            Home
                        </span>
                        <svg fill="#7C3AED" height="32px" width="32px" version="1.1" id="Capa_1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            viewBox="0 0 277.446 277.446" xml:space="preserve" stroke="#7C3AED">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path id="_x30_6-Movie_Clapper"
                                    d="M59.488,117.299c-0.504-4.237-2.007-8.171-4.273-11.556l202.992-67.776L247.552,6.051 c-1.549-4.638-6.566-7.141-11.201-5.594L15.54,74.182c-4.635,1.547-7.143,6.563-5.594,11.201l5.225,15.647 c-5.216,4.843-8.488,11.752-8.488,19.415c0,9.924,5.486,18.586,13.582,23.127v125.02c0,4.891,3.967,8.853,8.854,8.853h232.793 c4.885,0,8.852-3.963,8.852-8.853V117.299H59.488z M188.869,26.724l26.875-8.973l-6.467,26.14l-26.875,8.973L188.869,26.724z M122.47,48.893l26.877-8.973l-6.467,26.139l-26.875,8.974L122.47,48.893z M33.181,133.946c-7.442,0-13.498-6.056-13.498-13.5 c0-7.444,6.056-13.5,13.498-13.5c7.444,0,13.5,6.056,13.5,13.5C46.681,127.89,40.625,133.946,33.181,133.946z M56.074,71.062 l26.877-8.973l-6.467,26.14l-26.877,8.974L56.074,71.062z M82.476,147.192H54.142l14.412-22.746h28.334L82.476,147.192z M138.554,124.446h28.334l-14.412,22.746h-28.334L138.554,124.446z M131.599,234.372v-60l47.783,30L131.599,234.372z M222.476,147.192h-28.334l14.412-22.746h28.334L222.476,147.192z">
                                </path>
                            </g>
                        </svg>
                    </a>
                </div>

                <div class="hidden md:block">
                    <nav aria-label="Global">
                        <ul class="flex items-center gap-6 text-sm">
                            <li>
                                <a class="text-gray-300 transition hover:text-gray-500/75" href="#"> About </a>
                            </li>

                            <li>
                                <a class="text-gray-300 transition hover:text-gray-500/75" href="#"> Careers </a>
                            </li>

                            <li>
                                <a class="text-gray-300 transition hover:text-gray-500/75" href="#"> History </a>
                            </li>

                            <li>
                                <a class="text-gray-300 transition hover:text-gray-500/75" href="#"> Services </a>
                            </li>

                            <li>
                                <a class="text-gray-300 transition hover:text-gray-500/75" href="#"> Projects </a>
                            </li>

                            <li>
                                <a class="text-gray-300 transition hover:text-gray-500/75" href="#"> Blog </a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="flex items-center gap-4">
                    <div class="sm:flex sm:gap-4">
                        <a class="rounded-md bg-violet-600 px-5 py-2.5 text-sm font-medium text-white shadow"
                            href="#" >
                            Login
                        </a>

                        <div class="hidden sm:flex">
                            <a class="rounded-md bg-gray-100 px-5 py-2.5 text-sm font-medium text-violet-600"
                                href="#">
                                Register
                            </a>
                        </div>
                    </div>

                    <div class="block md:hidden">
                        <button class="rounded bg-gray-100 p-2 text-gray-600 transition hover:text-gray-600/75">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div id="app" class="mt-16">

        @yield('content')
    </div>

    {{-- modal login --}}
    <div class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50" id="modal-login">
        <h1>
            LOGIN
        </h1>
    </div>
</body>


</html>
