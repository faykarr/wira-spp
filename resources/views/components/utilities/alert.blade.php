@props([
    'type' => 'info',
    'message' => '',
    'dismissible' => true,
])

@php
    $types = [
        'info' => [
            'bg' => 'bg-blue-50 dark:bg-gray-800',
            'border' => 'border-blue-500',
            'text' => 'text-blue-800 dark:text-blue-400',
            'button' =>
                'bg-blue-50 text-blue-500 focus:ring-blue-400 hover:bg-blue-200 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700',
        ],
        'danger' => [
            'bg' => 'bg-red-50 dark:bg-gray-800',
            'border' => 'border-red-500',
            'text' => 'text-red-800 dark:text-red-400',
            'button' =>
                'bg-red-50 text-red-500 focus:ring-red-400 hover:bg-red-200 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700',
        ],
        'success' => [
            'bg' => 'bg-green-50 dark:bg-gray-800',
            'border' => 'border-green-500',
            'text' => 'text-green-800 dark:text-green-400',
            'button' =>
                'bg-green-50 text-green-500 focus:ring-green-400 hover:bg-green-200 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700',
        ],
        'warning' => [
            'bg' => 'bg-yellow-50 dark:bg-gray-800',
            'border' => 'border-yellow-500',
            'text' => 'text-yellow-800 dark:text-yellow-300',
            'button' =>
                'bg-yellow-50 text-yellow-500 focus:ring-yellow-400 hover:bg-yellow-200 dark:bg-gray-800 dark:text-yellow-300 dark:hover:bg-gray-700',
        ],
    ];
    $style = $types[$type] ?? $types['info'];
@endphp

<div x-data="{ show: true }" x-show="show" x-transition
    {{ $attributes->merge(['class' => "flex items-center p-4 mb-4 text-sm border-t-4 {$style['bg']} {$style['border']} {$style['text']}", 'role' => 'alert']) }}>
    {{-- Icon --}}
    <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
        viewBox="0 0 20 20">
        @if ($type === 'success')
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
        @elseif ($type === 'danger')
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
        @elseif ($type === 'warning')
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z" />
        @else
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        @endif
    </svg>

    {{-- Message --}}
    <div class="ms-3 text-sm font-medium">
        {{ $message ?: $slot }}
    </div>

    {{-- Dismiss Button --}}
    @if ($dismissible)
        <button type="button" @click="show = false"
            class="ms-auto -mx-1.5 -my-1.5 rounded-lg focus:ring-2 p-1.5 inline-flex items-center justify-center h-8 w-8 {{ $style['button'] }}"
            aria-label="Close">
            <span class="sr-only">Tutup</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    @endif
</div>
