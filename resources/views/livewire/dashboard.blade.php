<div>
    <div
        class="mb-6 p-6 bg-white rounded-lg shadow-sm dark:bg-wira-dark-800 border border-gray-200 dark:border-wira-dark-700">
        <div class="flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="flex-1">
                <h1 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white mb-2">
                    Selamat datang, {{ auth()->user()->name }}! 👋
                </h1>
                <p class="text-gray-600 dark:text-gray-400 mb-4">
                    Kelola pembayaran SPP dan kegiatan lainnya dengan mudah dan cepat.
                </p>
                <div class="flex flex-wrap gap-2">
                    <span
                        class="inline-flex items-center px-3 py-1 text-sm font-medium rounded-full bg-wira-100 text-wira-800 dark:bg-wira-dark-700 dark:text-wira-dark-200">
                        <svg class="w-4 h-4 me-1.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                clip-rule="evenodd" />
                        </svg>
                        {{ auth()->user()->role->label() }}
                    </span>
                    <span
                        class="inline-flex items-center px-3 py-1 text-sm font-medium rounded-full bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">
                        <svg class="w-4 h-4 me-1.5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                            <path fill-rule="evenodd"
                                d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                clip-rule="evenodd" />
                        </svg>
                        Online
                    </span>
                </div>
            </div>
            <div class="shrink-0 hidden lg:block">
                <x-svgs.man-credit-card />
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-4 mb-6 sm:grid-cols-2 lg:grid-cols-4">
        <x-dashboard.stats-card title="Total Siswa" value="0" subtitle="siswa terdaftar">
            <x-slot:icon>
                <svg class="w-7 h-7 text-wira-700 dark:text-wira-dark-300" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </x-slot:icon>
        </x-dashboard.stats-card>

        <x-dashboard.stats-card title="Hari Ini" value="Rp 0" subtitle="↑ pembayaran masuk" subtitleColor="green"
            iconBg="green">
            <x-slot:icon>
                <svg class="w-7 h-7 text-green-600 dark:text-green-400" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </x-slot:icon>
        </x-dashboard.stats-card>

        <x-dashboard.stats-card title="Tunggakan" value="Rp 0" subtitle="belum terbayar" subtitleColor="red"
            iconBg="red">
            <x-slot:icon>
                <svg class="w-7 h-7 text-red-600 dark:text-red-400" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </x-slot:icon>
        </x-dashboard.stats-card>

        <x-dashboard.stats-card title="Jenis Kegiatan" value="0" subtitle="kegiatan aktif">
            <x-slot:icon>
                <svg class="w-7 h-7 text-wira-dark-600 dark:text-wira-dark-300" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
            </x-slot:icon>
        </x-dashboard.stats-card>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <div
            class="lg:col-span-2 p-6 bg-white rounded-lg shadow-sm dark:bg-wira-dark-800 border border-gray-200 dark:border-wira-dark-700">
            <h2 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white flex items-center gap-2">
                <svg class="w-5 h-5 text-wira-dark-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
                Aksi Cepat
            </h2>
            <div class="grid grid-cols-2 gap-4 sm:grid-cols-4">
                <x-dashboard.quick-action-card href="#" label="Input Pembayaran">
                    <x-slot:icon>
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                    </x-slot:icon>
                </x-dashboard.quick-action-card>

                <x-dashboard.quick-action-card href="#" label="Cari Siswa">
                    <x-slot:icon>
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </x-slot:icon>
                </x-dashboard.quick-action-card>

                <x-dashboard.quick-action-card href="#" label="Cetak Laporan">
                    <x-slot:icon>
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                        </svg>
                    </x-slot:icon>
                </x-dashboard.quick-action-card>

                <x-dashboard.quick-action-card href="#" label="Rekap Bulanan">
                    <x-slot:icon>
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </x-slot:icon>
                </x-dashboard.quick-action-card>
            </div>
        </div>

        <div
            class="p-6 bg-linear-to-br from-wira-dark-500 to-wira-dark-700 rounded-lg shadow-sm text-white overflow-hidden relative">
            <div class="relative z-10">
                <h3 class="text-lg font-semibold mb-2">Tips Hari Ini</h3>
                <p class="text-sm text-wira-dark-100 mb-4">
                    Pastikan untuk selalu mencatat setiap pembayaran dan cetak bukti untuk siswa.
                </p>
                <a href="#" class="inline-flex items-center text-sm font-medium text-white hover:underline">
                    Pelajari lebih lanjut
                    <svg class="w-4 h-4 ms-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                        </path>
                    </svg>
                </a>
            </div>
            <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-white/10 rounded-full"></div>
            <div class="absolute -top-4 -right-8 w-16 h-16 bg-white/5 rounded-full"></div>
        </div>
    </div>

    <div
        class="p-6 bg-white rounded-lg shadow-sm dark:bg-wira-dark-800 border border-gray-200 dark:border-wira-dark-700">
        <h2 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white flex items-center gap-2">
            <svg class="w-5 h-5 text-wira-dark-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            Aktivitas Terbaru
        </h2>
        <div class="flex flex-col items-center justify-center py-12 text-center">
            <x-svgs.wallet-money />
            <p class="text-gray-500 dark:text-gray-400 mb-2">Belum ada aktivitas</p>
            <p class="text-sm text-gray-400 dark:text-gray-500">Aktivitas pembayaran akan muncul di sini</p>
        </div>
    </div>
</div>
