<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? config('app.name') }}</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    {{-- Vite Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="bg-wira-50 dark:bg-wira-dark-900 text-gray-900 dark:text-white flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col antialiased">
    {{-- Background Pattern --}}
    <div
        class="absolute inset-0 z-[-2] bg-wira-100 dark:bg-wira-dark-900 bg-[radial-gradient(#A594F933_1px,transparent_1px)] dark:bg-[radial-gradient(#2C74B333_1px,#0A2647_1px)] bg-size-[20px_20px]">
    </div>

    <div
        class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
        <main
            class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row shadow-2xl rounded-lg overflow-hidden">
            {{-- Content Section --}}
            <div
                class="text-[13px] leading-5 flex-1 p-6 pb-12 lg:p-20 bg-white dark:bg-wira-dark-800 rounded-es-lg rounded-ee-lg lg:rounded-ss-lg lg:rounded-ee-none">
                <h1 class="mb-1 text-3xl font-bold text-blue-950 dark:text-white">
                    {{ env('APP_SHORT_NAME', 'Wira SPP') }}</h1>
                <p class="mb-4 text-gray-600 dark:text-gray-300">
                    Aplikasi pembayaran SPP bulanan & kegiatan lainnya. <br>
                    Silakan masuk dengan klik tombol di bawah.
                </p>

                {{-- Features List --}}
                <ul class="flex flex-col mb-6 space-y-3">
                    <li class="flex items-center gap-3">
                        <span
                            class="flex items-center justify-center w-6 h-6 rounded-full bg-wira-100 dark:bg-wira-dark-700">
                            <svg class="w-4 h-4 text-wira-700 dark:text-wira-dark-300" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                        </span>
                        <span class="text-sm text-gray-700 dark:text-gray-300">
                            Untuk <span class="font-semibold text-wira-700 dark:text-wira-dark-400">Pegawai TU yang
                                berwenang</span>
                        </span>
                    </li>
                    <li class="flex items-center gap-3">
                        <span
                            class="flex items-center justify-center w-6 h-6 rounded-full bg-wira-100 dark:bg-wira-dark-700">
                            <svg class="w-4 h-4 text-wira-700 dark:text-wira-dark-300" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                </path>
                            </svg>
                        </span>
                        <span class="text-sm text-gray-700 dark:text-gray-300">
                            Dilarang <span class="font-semibold text-wira-700 dark:text-wira-dark-400">memberi informasi
                                sembarang</span>
                        </span>
                    </li>
                </ul>

                {{-- Action Buttons --}}
                <div class="flex gap-3">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="inline-flex items-center gap-2 px-6 py-2.5 bg-wira-700 hover:bg-wira-800 dark:bg-wira-dark-500 dark:hover:bg-wira-dark-600 text-white font-semibold rounded-lg text-sm transition-all hover:shadow-lg hover:scale-105 active:scale-95">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="inline-flex items-center gap-2 px-6 py-2.5 bg-wira-700 hover:bg-wira-800 dark:bg-wira-dark-500 dark:hover:bg-wira-dark-600 text-white font-semibold rounded text-sm transition-all hover:shadow-lg hover:scale-105 active:scale-95">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                </path>
                            </svg>
                            Log in
                        </a>
                    @endauth
                </div>
            </div>

            {{-- Logo Section --}}
            <div
                class="bg-linear-to-br from-wira-600 to-wira-700 dark:from-wira-dark-600 dark:to-wira-dark-800 lg:-ms-px -mb-px lg:mb-0 rounded-t-lg lg:rounded-t-none lg:rounded-e-lg aspect-335/376 lg:aspect-auto w-full lg:w-[438px] shrink-0 overflow-hidden flex items-center justify-center pointer-events-none select-none">
                <img src="{{ asset('images/logo-wira-bahari.png') }}" alt="Logo Wira Bahari"
                    class="max-h-full max-w-full object-contain pointer-events-none select-none p-8">
            </div>
        </main>
    </div>

    {{-- Footer --}}
    <footer class="mt-8 text-center text-sm text-gray-500 dark:text-gray-400">
        <p>&copy; {{ date('Y') }} SMK Wira Bahari. All rights reserved.</p>
    </footer>
</body>

</html>
