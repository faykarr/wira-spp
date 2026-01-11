{{-- Navbar Component --}}
<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-wira-dark-800 dark:border-wira-dark-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                {{-- Sidebar Toggle Button --}}
                <button @click="sidebarOpen = !sidebarOpen" type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-wira-dark-700 dark:focus:ring-wira-dark-600">
                    <span class="sr-only">Toggle sidebar</span>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>

                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex items-center ms-2 md:me-24" wire:navigate>
                    <img src="/apple-touch-icon.png" class="h-8 me-3" alt="Logo" />
                    <span class="self-center text-xl font-semibold whitespace-nowrap text-gray-900 dark:text-white">
                        {{ env('APP_SHORT_NAME', 'Wira SPP') }}
                    </span>
                </a>
            </div>

            {{-- Right Side --}}
            <div class="flex items-center">
                <div class="flex items-center ms-3">
                    {{-- User Dropdown --}}
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" type="button"
                            class="flex items-center gap-2 text-sm rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-wira-dark-600">
                            <span class="sr-only">Open user menu</span>
                            <div
                                class="w-8 h-8 rounded-full bg-wira-dark-500 dark:bg-wira-dark-600 flex items-center justify-center text-white font-medium">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                            <span
                                class="hidden md:block text-gray-700 dark:text-gray-300">{{ auth()->user()->name }}</span>
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        {{-- Dropdown Menu --}}
                        <div x-show="open" @click.outside="open = false" x-transition
                            class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg dark:bg-wira-dark-700 border border-gray-200 dark:border-wira-dark-600 z-50">
                            <div class="px-4 py-3 border-b border-gray-200 dark:border-wira-dark-600">
                                <p class="text-sm font-medium text-gray-900 dark:text-white">{{ auth()->user()->name }}
                                </p>
                                <p class="text-sm text-gray-500 dark:text-gray-400 truncate">{{ auth()->user()->email }}
                                </p>
                                <span
                                    class="inline-flex items-center px-2 py-0.5 mt-1 text-xs font-medium rounded bg-wira-100 text-wira-800 dark:bg-wira-dark-600 dark:text-wira-dark-200">
                                    {{ auth()->user()->role->label() }}
                                </span>
                            </div>
                            <ul class="py-1">
                                <li>
                                    <a href="{{ route('dashboard') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-wira-dark-600"
                                        wire:navigate>
                                        Dashboard
                                    </a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit"
                                            class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-wira-dark-600">
                                            Sign out
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
