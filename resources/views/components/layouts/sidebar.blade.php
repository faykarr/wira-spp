{{-- Sidebar Component --}}
<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform bg-white border-r border-gray-200 dark:bg-wira-dark-800 dark:border-wira-dark-700"
    aria-label="Sidebar">
    <div class="flex flex-col h-full">
        {{-- Scrollable Menu Area --}}
        <div class="flex-1 px-3 pb-4 overflow-y-auto">
            {{-- Main Menu --}}
            <ul class="space-y-2 font-medium">
                <li>
                    <span
                        class="flex items-center px-2 py-1.5 text-xs font-semibold text-gray-400 uppercase dark:text-gray-500">
                        Main Menu
                    </span>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-wira-dark-700 group {{ request()->routeIs('dashboard') ? 'bg-gray-100 dark:bg-wira-dark-700' : '' }}"
                        wire:navigate>
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
            </ul>

            {{-- Transactions --}}
            @can('petugas')
                <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-wira-dark-700">
                    <li>
                        <span
                            class="flex items-center px-2 py-1.5 text-xs font-semibold text-gray-400 uppercase dark:text-gray-500">
                            Transaksi
                        </span>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-wira-dark-700 group">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Pembayaran</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-wira-dark-700 group">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Laporan</span>
                        </a>
                    </li>
                </ul>
            @endcan

            {{-- Master Data --}}
            @can('admin')
                <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-wira-dark-700">
                    <li>
                        <span
                            class="flex items-center px-2 py-1.5 text-xs font-semibold text-gray-400 uppercase dark:text-gray-500">
                            Master Data
                        </span>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-wira-dark-700 group">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z">
                                </path>
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Data Siswa</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-wira-dark-700 group">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                </path>
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Jenis Kegiatan</span>
                        </a>
                    </li>
                </ul>
            @endcan

            {{-- System --}}
            @can('manage-users')
                <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-wira-dark-700">
                    <li>
                        <span
                            class="flex items-center px-2 py-1.5 text-xs font-semibold text-gray-400 uppercase dark:text-gray-500">
                            Sistem
                        </span>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-wira-dark-700 group">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Manajemen User</span>
                        </a>
                    </li>
                    @can('manage-settings')
                        <li>
                            <a href="#"
                                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-wira-dark-700 group">
                                <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span class="flex-1 ms-3 whitespace-nowrap">Pengaturan</span>
                            </a>
                        </li>
                    @endcan
                </ul>
            @endcan
        </div>

        {{-- Logout Button - Desktop Only --}}
        <div class="hidden sm:block px-3 py-4 border-t border-gray-200 dark:border-wira-dark-700">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="flex items-center w-full p-2 text-gray-900 rounded-lg dark:text-white hover:bg-red-50 dark:hover:bg-red-900/20 group transition-colors">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-red-600 dark:group-hover:text-red-400"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                        </path>
                    </svg>
                    <span
                        class="flex-1 ms-3 whitespace-nowrap text-left group-hover:text-red-600 dark:group-hover:text-red-400">Keluar</span>
                </button>
            </form>
        </div>
    </div>
</aside>
