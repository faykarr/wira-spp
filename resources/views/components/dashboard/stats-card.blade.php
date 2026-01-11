@props([
    'title',
    'value',
    'subtitle' => null,
    'subtitleColor' => 'gray', // gray, green, red
    'iconBg' => 'wira', // wira, green, red
])

@php
    $iconBgClasses = match ($iconBg) {
        'green' => 'from-green-100 to-green-200 dark:from-green-900/40 dark:to-green-800/40',
        'red' => 'from-red-100 to-red-200 dark:from-red-900/40 dark:to-red-800/40',
        default => 'from-wira-100 to-wira-200 dark:from-wira-dark-700 dark:to-wira-dark-600',
    };

    $subtitleClasses = match ($subtitleColor) {
        'green' => 'text-green-500 dark:text-green-400',
        'red' => 'text-red-500 dark:text-red-400',
        default => 'text-gray-400 dark:text-gray-500',
    };
@endphp

<div
    class="p-5 bg-white rounded-lg shadow-sm dark:bg-wira-dark-800 border border-gray-200 dark:border-wira-dark-700 hover:shadow-md transition-shadow">
    <div class="flex items-center">
        <div class="flex items-center justify-center w-14 h-14 rounded-xl bg-linear-to-br {{ $iconBgClasses }}">
            {{ $icon }}
        </div>
        <div class="ml-4">
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $title }}</p>
            <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $value }}</p>
            @if ($subtitle)
                <p class="text-xs {{ $subtitleClasses }}">{{ $subtitle }}</p>
            @endif
        </div>
    </div>
</div>
