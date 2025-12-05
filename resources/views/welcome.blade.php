<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SIKAPRI</title>
    <link rel="icon" href="{{ asset('logo.png') }}" type="image/png">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            /*! tailwindcss v4.0.7 | MIT License | https://tailwindcss.com */
            @layer theme {

                :root,
                :host {
                    --font-sans: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                    --color-primary-500: #0ea5e9;
                    /* Example primary color (sky blue) */
                    --color-primary-600: #0284c7;
                }
            }

            /* ... (Rest of the Tailwind CSS styles - kept for structure) ... */
            /* You can keep the existing CSS block or replace it with a CDN link for simplicity in a raw HTML file */
        </style>
        <script src="https://cdn.tailwindcss.com"></script>
    @endif
</head>

<body
    class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col font-sans">

    <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
        @if (Route::has('login'))
            <nav class="flex items-center justify-end gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal transition-colors">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal transition-colors">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal transition-colors">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <div
        class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
        <main
            class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row shadow-xl rounded-lg overflow-hidden">

            <div
                class="text-[13px] leading-[20px] flex-1 p-6 pb-12 lg:p-20 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] flex flex-col justify-center">

                <div class="mb-6">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Kabar Priangan</h2>
                    <span class="text-xs font-semibold tracking-wide text-blue-600 dark:text-blue-400 uppercase">Aplikasi Kasir Iklan</span>
                </div>

                <h1 class="mb-4 text-3xl font-medium text-gray-900 dark:text-white">
                    Selamat Datang <br>
                    <span class="text-blue-600 dark:text-blue-400">Aplikasi Transaksi Iklan</span>
                </h1>

                <div class="flex flex-col gap-3">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="w-fit px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md shadow-md transition-transform transform hover:scale-105">
                            Go to Dashboard &rarr;
                        </a>
                    @else
                        <div class="flex gap-4">
                            <a href="{{ route('login') }}"
                                class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md shadow transition">
                                Login to Start
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="px-6 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium rounded-md border border-gray-300 transition dark:bg-[#2a2a2a] dark:text-white dark:border-gray-600 dark:hover:bg-[#333]">
                                    Register
                                </a>
                            @endif
                        </div>
                    @endauth
                </div>

                <p class="mt-8 text-xs text-gray-400">
                    &copy; {{ date('Y') }} Kabar Priangan. All rights reserved.
                </p>
            </div>

            <div
                class="bg-blue-50 dark:bg-[#111827] relative lg:-ml-px -mb-px lg:mb-0 lg:w-[480px] shrink-0 overflow-hidden flex items-center justify-center">
                <svg class="w-3/4 h-auto text-blue-500 dark:text-blue-400 opacity-80" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M3 3H21C22.1046 3 23 3.89543 23 5V19C23 20.1046 22.1046 21 21 21H3C1.89543 21 1 20.1046 1 19V5C1 3.89543 1.89543 3 3 3Z"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M9 3V21" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M1 9H23" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M5 14H5.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M5 17H5.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M13 7H17" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M16 7H17" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>

                <div
                    class="absolute inset-0 bg-gradient-to-t from-blue-100/50 to-transparent dark:from-[#000]/50 pointer-events-none">
                </div>
            </div>
        </main>
    </div>

    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
</body>

</html>
