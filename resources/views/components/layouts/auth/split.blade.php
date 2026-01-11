<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-wira-50 antialiased dark:bg-wira-dark-900">
    <div
        class="relative grid h-dvh flex-col items-center justify-center px-8 sm:px-0 lg:max-w-none lg:grid-cols-2 lg:px-0">
        {{-- Left Side --}}
        <div
            class="relative hidden h-full flex-col p-10 text-white lg:flex dark:border-e dark:border-wira-dark-700 bg-linear-to-br from-wira-700 to-wira-800 dark:from-wira-dark-700 dark:to-wira-dark-900">
            {{-- Background Pattern --}}
            <div
                class="absolute inset-0 bg-[radial-gradient(#ffffff20_1px,transparent_1px)] dark:bg-[radial-gradient(#2C74B333_1px,transparent_1px)] bg-size-[20px_20px]">
            </div>

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="relative z-20 flex items-center gap-3 text-lg font-bold" wire:navigate>
                <span class="flex h-12 w-12 items-center justify-center rounded-lg bg-white/10 backdrop-blur-sm">
                    <img src="/apple-touch-icon.png" alt="Logo Wira Bahari" class="size-8 object-contain" />
                </span>
                <span>{{ config('app.name', 'Wira SPP') }}</span>
            </a>

            {{-- Quote --}}
            @php
                [$message, $author] = str(Illuminate\Foundation\Inspiring::quotes()->random())->explode('-');
            @endphp

            <div class="relative z-20 mt-auto">
                <blockquote class="space-y-3 rounded-xl bg-white/10 p-6 backdrop-blur-sm">
                    <p class="text-lg font-medium leading-relaxed text-white/90">
                        &ldquo;{{ trim($message) }}&rdquo;
                    </p>
                    <footer class="text-sm text-white/70">
                        &mdash; {{ trim($author) }}
                    </footer>
                </blockquote>
            </div>
        </div>

        {{-- Right Side --}}
        <div class="w-full lg:p-8">
            <div class="mx-auto flex w-full flex-col justify-center space-y-6 sm:w-[350px] py-8 lg:py-0">
                {{-- Mobile Logo --}}
                <a href="{{ route('home') }}" class="z-20 flex flex-col items-center gap-3 font-medium" wire:navigate>
                    <img src="/apple-touch-icon.png" alt="Logo Wira Bahari" class="size-24 object-contain" />
                    {{-- <span
                        class="flex h-24 w-24 items-center justify-center rounded-xl bg-wira-100 dark:bg-wira-dark-700">
                        <img src="/apple-touch-icon.png" alt="Logo Wira Bahari" class="size-20 object-contain" />
                    </span> --}}
                    <span
                        class="text-lg font-bold text-wira-dark-900 dark:text-white">{{ config('app.name', 'Wira SPP') }}</span>
                </a>

                {{-- Form Content --}}
                {{ $slot }}
            </div>
        </div>
    </div>
</body>

</html>
