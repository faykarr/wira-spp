<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <script>
        (function() {
            const theme = localStorage.getItem('theme') || 'system';
            const isDark = theme === 'dark' ||
                (theme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches);
            if (isDark) {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>
    @include('partials.head')
</head>

<body class="min-h-screen bg-wira-100 dark:bg-wira-dark-900 antialiased" x-data="{ sidebarOpen: true }">
    <div
        class="fixed inset-0 z-[-2] min-h-screen dark:bg-wira-dark-900 bg-[radial-gradient(#249E9433_1px,transparent_1px)] dark:bg-[radial-gradient(#2C74B333_1px,#0A2647_1px)] bg-size-[20px_20px]">
    </div>
    {{-- Navbar --}}
    @include('components.layouts.navbar')

    {{-- Sidebar --}}
    @include('components.layouts.sidebar')

    {{-- Main Content --}}
    <div class="pt-14 transition-all duration-300" :class="sidebarOpen ? 'sm:ml-64' : 'sm:ml-0'">
        <main class="">
            {{ $slot }}
        </main>
    </div>

    {{-- Overlay for mobile when sidebar is open --}}
    <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 z-30 bg-gray-900/50 sm:hidden"
        x-transition.opacity></div>

    {{-- Toast Notifications --}}
    <x-utilities.toast />
</body>

</html>
