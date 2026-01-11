<div class="p-4 md:p-6">
    {{-- Table Header --}}
    <div
        class="py-4 px-14 bg-linear-to-br from-wira-600 to-wira-800 dark:from-wira-dark-500 dark:to-wira-dark-700 block sm:flex items-center justify-between lg:mt-1.5 rounded-t text-white overflow-hidden relative">
        <div class="w-full mb-1">
            {{-- Breadcrumb --}}
            <nav class="flex mb-5" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                    <li class="inline-flex items-center">
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center text-white/80 hover:text-white"
                            wire:navigate>
                            <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                </path>
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-white/40" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-white/60 md:ml-2" aria-current="page">Users</span>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-white/40" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-white/60 md:ml-2" aria-current="page">List</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <div class="mb-4">
                <h1 class="text-xl font-semibold sm:text-2xl text-white">Manajemen Users</h1>
            </div>
            <div class="sm:flex">
                <div class="items-center hidden mb-3 sm:flex sm:divide-x sm:divide-white/20 sm:mb-0">
                    {{-- Search --}}
                    <form class="lg:pr-3">
                        <label for="users-search" class="sr-only">Search</label>
                        <div class="relative mt-1 lg:w-64 xl:w-96">
                            <input type="text" wire:model.live.debounce.300ms="search" id="users-search"
                                class="bg-white/10 border border-white/20 text-white sm:text-sm rounded-lg focus:ring-white/30 focus:border-white/30 block w-full p-2.5 placeholder-white/60"
                                placeholder="Cari nama atau email">
                        </div>
                    </form>
                    {{-- Filter Role --}}
                    <div class="flex pl-0 mt-3 space-x-1 sm:pl-2 sm:mt-0">
                        <select wire:model.live="roleFilter"
                            class="bg-white/10 border border-white/20 text-white sm:text-sm rounded-lg focus:ring-white/30 focus:border-white/30 block p-2.5">
                            <option value="">Semua Role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->value }}">{{ $role->label() }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                    {{-- Add User Button --}}
                    <button wire:click="openCreateModal" type="button"
                        class="inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-wira-dark-600 dark:hover:bg-wira-dark-700 dark:focus:ring-wira-dark-800">
                        <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Tambah user
                    </button>
                    {{-- Export Button --}}
                    {{-- <a href="#"
                        class="inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                        <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Export
                    </a> --}}
                </div>
            </div>
        </div>
        {{-- Decorative circles --}}
        <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-white/10 rounded-full"></div>
        <div class="absolute -top-4 -right-8 w-16 h-16 bg-white/5 rounded-full"></div>
    </div>

    {{-- Table --}}
    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow">
                    <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-all" aria-describedby="checkbox-1" type="checkbox"
                                            class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-all" class="sr-only">checkbox</label>
                                    </div>
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Name
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Role
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Status
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            @forelse ($users as $user)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="w-4 p-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-{{ $user->id }}" aria-describedby="checkbox-1"
                                                type="checkbox"
                                                class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-{{ $user->id }}" class="sr-only">checkbox</label>
                                        </div>
                                    </td>
                                    <td class="flex items-center p-4 mr-12 space-x-6 whitespace-nowrap">
                                        {{-- Avatar --}}
                                        <div
                                            class="flex items-center justify-center w-10 h-10 rounded-full bg-primary-100 dark:bg-primary-900">
                                            <span
                                                class="font-medium text-sm text-primary-600 dark:text-primary-300">{{ strtoupper(substr($user->name, 0, 2)) }}</span>
                                        </div>
                                        <div class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                            <div class="text-base font-semibold text-gray-900 dark:text-white">
                                                {{ $user->name }}
                                                @if ($user->id === auth()->id())
                                                    <span
                                                        class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-primary-100 text-primary-800 dark:bg-primary-900 dark:text-primary-300 ml-2">
                                                        Anda
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                                {{ $user->email }}
                                            </div>
                                        </div>
                                    </td>
                                    <td
                                        class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                            @if ($user->role === \App\Enums\UserRoles::SUPER_ADMIN) bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-300
                                            @elseif ($user->role === \App\Enums\UserRoles::ADMIN) bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300
                                            @else bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300 @endif">
                                            {{ $user->role->label() }}
                                        </span>
                                    </td>
                                    <td
                                        class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center">
                                            <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div>
                                            Active
                                        </div>
                                    </td>
                                    <td class="p-4 space-x-2 whitespace-nowrap">
                                        {{-- Edit Button --}}
                                        <button wire:click="openEditModal({{ $user->id }})" type="button"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-wira-dark-600 dark:hover:bg-wira-dark-700 dark:focus:ring-wira-dark-800">
                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                                </path>
                                                <path fill-rule="evenodd"
                                                    d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Edit
                                        </button>
                                        {{-- Delete Button --}}
                                        <button wire:click="openDeleteModal({{ $user->id }})" type="button"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="p-4 text-center text-gray-500 dark:text-gray-400">
                                        <div class="flex flex-col items-center justify-center py-8">
                                            <svg class="w-12 h-12 text-gray-400 mb-4" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            <p class="font-medium">Tidak ada user ditemukan</p>
                                            <p class="text-sm mt-1">Coba ubah filter pencarian atau tambah user baru
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Pagination --}}
    <div
        class="sticky bottom-0 right-0 items-center w-full p-4 bg-linear-to-br from-wira-600 to-wira-800 dark:from-wira-dark-500 dark:to-wira-dark-700 sm:flex sm:justify-between px-14 rounded-b text-white overflow-hidden relative">
        <div class="flex items-center mb-4 sm:mb-0">
            <span class="text-sm font-normal text-white/80">
                Showing
                <span
                    class="font-semibold text-white">{{ $users->firstItem() ?? 0 }}-{{ $users->lastItem() ?? 0 }}</span>
                of
                <span class="font-semibold text-white">{{ $users->total() }}</span>
            </span>
        </div>
        <div class="flex items-center space-x-3">
            {{-- Previous Button --}}
            @if ($users->onFirstPage())
                <span
                    class="inline-flex items-center justify-center flex-1 px-3 py-2 text-sm font-medium text-center text-white/40 bg-white/10 rounded-lg cursor-not-allowed">
                    <svg class="w-5 h-5 mr-1 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Previous
                </span>
            @else
                <button wire:click="previousPage"
                    class="inline-flex items-center justify-center flex-1 px-3 py-2 text-sm font-medium text-center text-wira-700 dark:text-wira-dark-700 rounded-lg bg-white hover:bg-white/90 focus:ring-4 focus:ring-white/30">
                    <svg class="w-5 h-5 mr-1 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Previous
                </button>
            @endif

            {{-- Next Button --}}
            @if ($users->hasMorePages())
                <button wire:click="nextPage"
                    class="inline-flex items-center justify-center flex-1 px-3 py-2 text-sm font-medium text-center text-wira-700 dark:text-wira-dark-700 rounded-lg bg-white hover:bg-white/90 focus:ring-4 focus:ring-white/30">
                    Next
                    <svg class="w-5 h-5 ml-1 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            @else
                <span
                    class="inline-flex items-center justify-center flex-1 px-3 py-2 text-sm font-medium text-center text-white/40 bg-white/10 rounded-lg cursor-not-allowed">
                    Next
                    <svg class="w-5 h-5 ml-1 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </span>
            @endif
        </div>
        {{-- Decorative circles --}}
        <div class="absolute -bottom-4 -left-4 w-20 h-20 bg-white/10 rounded-full"></div>
        <div class="absolute -top-4 -left-8 w-12 h-12 bg-white/5 rounded-full"></div>
    </div>

    {{-- Create Modal --}}
    @if ($showCreateModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto overflow-x-hidden">
            <div class="fixed inset-0 bg-gray-900/50 dark:bg-gray-900/80" wire:click="closeModal"></div>
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                    {{-- Header --}}
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Add new user
                        </h3>
                        <button wire:click="closeModal" type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                    {{-- Body --}}
                    <form wire:submit="save" class="p-4 md:p-5">
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                <input type="text" wire:model="form.name" id="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Masukkan nama lengkap">
                                @error('form.name')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <input type="email" wire:model="form.email" id="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="nama@email.com">
                                @error('form.email')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2 sm:col-span-1" x-data="{ showPassword: false }">
                                <label for="password"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                <div class="relative">
                                    <input :type="showPassword ? 'text' : 'password'" wire:model="form.password"
                                        id="password"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 pr-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Minimal 8 karakter">
                                    <button type="button" @click="showPassword = !showPassword"
                                        class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                                        <svg x-show="!showPassword" class="w-5 h-5" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                            </path>
                                        </svg>
                                        <svg x-show="showPassword" class="w-5 h-5" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                                @error('form.password')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2 sm:col-span-1" x-data="{ showPassword: false }">
                                <label for="password_confirmation"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi
                                    Password</label>
                                <div class="relative">
                                    <input :type="showPassword ? 'text' : 'password'"
                                        wire:model="form.password_confirmation" id="password_confirmation"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 pr-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Ulangi password">
                                    <button type="button" @click="showPassword = !showPassword"
                                        class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                                        <svg x-show="!showPassword" class="w-5 h-5" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                            </path>
                                        </svg>
                                        <svg x-show="showPassword" class="w-5 h-5" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="col-span-2">
                                <label for="role"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                                <select wire:model="form.role" id="role"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->value }}">{{ $role->label() }}</option>
                                    @endforeach
                                </select>
                                @error('form.role')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex items-center justify-end space-x-3 pt-4 border-t dark:border-gray-600">
                            <button type="button" wire:click="closeModal"
                                class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                Cancel
                            </button>
                            <button type="submit"
                                class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-wira-dark-600 dark:hover:bg-wira-dark-700 dark:focus:ring-wira-dark-800">
                                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span wire:loading.remove wire:target="save">Add user</span>
                                <span wire:loading wire:target="save">Saving...</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    {{-- Edit Modal --}}
    @if ($showEditModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto overflow-x-hidden">
            <div class="fixed inset-0 bg-gray-900/50 dark:bg-gray-900/80" wire:click="closeModal"></div>
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                    {{-- Header --}}
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Edit user
                        </h3>
                        <button wire:click="closeModal" type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                    {{-- Body --}}
                    <form wire:submit="update" class="p-4 md:p-5">
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="edit_name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                <input type="text" wire:model="form.name" id="edit_name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Masukkan nama lengkap">
                                @error('form.name')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                <label for="edit_email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <input type="email" wire:model="form.email" id="edit_email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="nama@email.com">
                                @error('form.email')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2 sm:col-span-1" x-data="{ showPassword: false }">
                                <label for="edit_password"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password
                                    Baru</label>
                                <div class="relative">
                                    <input :type="showPassword ? 'text' : 'password'" wire:model="form.password"
                                        id="edit_password"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 pr-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Kosongkan jika tidak diubah">
                                    <button type="button" @click="showPassword = !showPassword"
                                        class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                                        <svg x-show="!showPassword" class="w-5 h-5" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                            </path>
                                        </svg>
                                        <svg x-show="showPassword" class="w-5 h-5" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                                @error('form.password')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2 sm:col-span-1" x-data="{ showPassword: false }">
                                <label for="edit_password_confirmation"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi
                                    Password</label>
                                <div class="relative">
                                    <input :type="showPassword ? 'text' : 'password'"
                                        wire:model="form.password_confirmation" id="edit_password_confirmation"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 pr-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Ulangi password baru">
                                    <button type="button" @click="showPassword = !showPassword"
                                        class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                                        <svg x-show="!showPassword" class="w-5 h-5" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                            </path>
                                        </svg>
                                        <svg x-show="showPassword" class="w-5 h-5" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="col-span-2">
                                <label for="edit_role"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                                <select wire:model="form.role" id="edit_role"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->value }}">{{ $role->label() }}</option>
                                    @endforeach
                                </select>
                                @error('form.role')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex items-center justify-end space-x-3 pt-4 border-t dark:border-gray-600">
                            <button type="button" wire:click="closeModal"
                                class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                Cancel
                            </button>
                            <button type="submit"
                                class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-wira-dark-600 dark:hover:bg-wira-dark-700 dark:focus:ring-wira-dark-800">
                                <span wire:loading.remove wire:target="update">Update</span>
                                <span wire:loading wire:target="update">Updating...</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    {{-- Delete Modal --}}
    @if ($showDeleteModal && $selectedUser)
        <div class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto overflow-x-hidden">
            <div class="fixed inset-0 bg-gray-900/50 dark:bg-gray-900/80" wire:click="closeModal"></div>
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button wire:click="closeModal" type="button"
                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                            Are you sure you want to delete user
                            <span
                                class="font-semibold text-gray-900 dark:text-white">{{ $selectedUser->name }}</span>?
                        </h3>
                        <button wire:click="delete" type="button"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            <span wire:loading.remove wire:target="delete">Yes, I'm sure</span>
                            <span wire:loading wire:target="delete">Deleting...</span>
                        </button>
                        <button wire:click="closeModal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            No, cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- View Modal --}}
    @if ($showViewModal && $selectedUser)
        <div class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto overflow-x-hidden">
            <div class="fixed inset-0 bg-gray-900/50 dark:bg-gray-900/80" wire:click="closeModal"></div>
            <div class="relative p-4 w-full max-w-lg max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                    {{-- Header --}}
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            User details
                        </h3>
                        <button wire:click="closeModal" type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                    {{-- Body --}}
                    <div class="p-4 md:p-5">
                        <div class="flex items-center mb-6">
                            <div
                                class="flex items-center justify-center w-16 h-16 rounded-full bg-primary-100 dark:bg-primary-900 mr-4">
                                <span
                                    class="text-xl font-medium text-primary-600 dark:text-primary-300">{{ strtoupper(substr($selectedUser->name, 0, 2)) }}</span>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    {{ $selectedUser->name }}</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $selectedUser->email }}</p>
                            </div>
                        </div>
                        <dl class="grid grid-cols-2 gap-4">
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Role</dt>
                                <dd class="text-base font-semibold text-gray-900 dark:text-white">
                                    {{ $selectedUser->role->label() }}
                                </dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Status</dt>
                                <dd class="flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                    <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div>
                                    Active
                                </dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Registered</dt>
                                <dd class="text-base font-semibold text-gray-900 dark:text-white">
                                    {{ $selectedUser->created_at->format('d M Y') }}
                                </dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Last Updated</dt>
                                <dd class="text-base font-semibold text-gray-900 dark:text-white">
                                    {{ $selectedUser->updated_at->format('d M Y') }}
                                </dd>
                            </div>
                        </dl>
                        <div class="flex items-center justify-end space-x-3 pt-6 mt-6 border-t dark:border-gray-600">
                            <button wire:click="openEditModal({{ $selectedUser->id }})" type="button"
                                class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                Edit user
                            </button>
                            <button wire:click="closeModal" type="button"
                                class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
