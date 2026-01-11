{{-- Theme Switcher Component --}}
<div x-data="{
    open: false,
    theme: localStorage.getItem('theme') || 'system',

    init() {
        this.applyTheme();

        // Listen for system preference changes
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
            if (this.theme === 'system') {
                this.applyTheme();
            }
        });
    },

    setTheme(newTheme) {
        this.theme = newTheme;
        localStorage.setItem('theme', newTheme);
        this.applyTheme();
        this.open = false;
    },

    applyTheme() {
        const isDark = this.theme === 'dark' ||
            (this.theme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches);

        document.documentElement.classList.toggle('dark', isDark);
    },

    getIcon() {
        if (this.theme === 'light') return 'sun';
        if (this.theme === 'dark') return 'moon';
        return 'system';
    }
}" class="relative">
    {{-- Toggle Button --}}
    <button @click="open = !open" type="button"
        class="inline-flex items-center justify-center p-2 text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-wira-dark-700 dark:focus:ring-wira-dark-600">
        <span class="sr-only">Toggle theme</span>

        {{-- Sun Icon (Light) --}}
        <svg x-show="theme === 'light'" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                clip-rule="evenodd"></path>
        </svg>

        {{-- Moon Icon (Dark) --}}
        <svg x-show="theme === 'dark'" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
        </svg>

        {{-- System Icon --}}
        <svg x-show="theme === 'system'" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
                d="M3 5a2 2 0 012-2h10a2 2 0 012 2v8a2 2 0 01-2 2h-2.22l.123.489.804.804A1 1 0 0113 18H7a1 1 0 01-.707-1.707l.804-.804L7.22 15H5a2 2 0 01-2-2V5zm5.771 7H5V5h10v7H8.771z"
                clip-rule="evenodd"></path>
        </svg>
    </button>

    {{-- Dropdown Menu --}}
    <div x-show="open" @click.outside="open = false" x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="absolute right-0 mt-2 w-36 bg-white rounded-lg shadow-lg dark:bg-wira-dark-700 border border-gray-200 dark:border-wira-dark-600 z-50">
        <ul class="py-1 text-sm">
            {{-- Light --}}
            <li>
                <button @click="setTheme('light')" type="button"
                    class="flex items-center w-full px-4 py-2 text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-wira-dark-600"
                    :class="{ 'bg-gray-100 dark:bg-wira-dark-600': theme === 'light' }">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Light
                    <svg x-show="theme === 'light'" class="w-4 h-4 ml-auto text-primary-600" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </li>
            {{-- Dark --}}
            <li>
                <button @click="setTheme('dark')" type="button"
                    class="flex items-center w-full px-4 py-2 text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-wira-dark-600"
                    :class="{ 'bg-gray-100 dark:bg-wira-dark-600': theme === 'dark' }">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                    Dark
                    <svg x-show="theme === 'dark'" class="w-4 h-4 ml-auto text-primary-600" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </li>
            {{-- System --}}
            <li>
                <button @click="setTheme('system')" type="button"
                    class="flex items-center w-full px-4 py-2 text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-wira-dark-600"
                    :class="{ 'bg-gray-100 dark:bg-wira-dark-600': theme === 'system' }">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M3 5a2 2 0 012-2h10a2 2 0 012 2v8a2 2 0 01-2 2h-2.22l.123.489.804.804A1 1 0 0113 18H7a1 1 0 01-.707-1.707l.804-.804L7.22 15H5a2 2 0 01-2-2V5zm5.771 7H5V5h10v7H8.771z"
                            clip-rule="evenodd"></path>
                    </svg>
                    System
                    <svg x-show="theme === 'system'" class="w-4 h-4 ml-auto text-primary-600" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </li>
        </ul>
    </div>
</div>
