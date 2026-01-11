@props([
    'href' => '#',
    'label',
])

<a href="{{ $href }}" wire:navigate
    class="group flex flex-col items-center p-4 text-center rounded-xl bg-gray-50 dark:bg-wira-dark-700 hover:bg-wira-100 dark:hover:bg-wira-dark-600 transition-all hover:scale-105">
    <div
        class="w-12 h-12 mb-3 rounded-xl bg-wira-dark-500 dark:bg-wira-dark-500 flex items-center justify-center group-hover:bg-wira-dark-600 transition-colors">
        {{ $icon }}
    </div>
    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ $label }}</span>
</a>
