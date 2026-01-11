<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-gray-50 dark:bg-wira-dark-900 antialiased" x-data="{ sidebarOpen: true }">
    <div
        class="absolute inset-0 z-[-2] dark:bg-wira-dark-900 bg-[radial-gradient(#A594F933_1px,transparent_1px)] dark:bg-[radial-gradient(#2C74B333_1px,#0A2647_1px)] bg-size-[20px_20px]">
    </div>
    {{-- Navbar --}}
    @include('components.layouts.navbar')

    {{-- Sidebar --}}
    @include('components.layouts.sidebar')

    {{-- Main Content --}}
    <div class="pt-14 transition-all duration-300" :class="sidebarOpen ? 'sm:ml-64' : 'sm:ml-0'">
        <main class="p-4 md:p-6">
            {{ $slot }}
        </main>
    </div>

    {{-- Overlay for mobile when sidebar is open --}}
    <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 z-30 bg-gray-900/50 sm:hidden"
        x-transition.opacity></div>
</body>

</html>
