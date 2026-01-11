<div x-data="toastNotification()" @toast.window="showToast($event.detail)"
    class="fixed top-30 left-1/2 -translate-x-1/2 z-50 flex flex-col items-center gap-3">

    <template x-for="toast in toasts" :key="toast.id">
        <div x-show="toast.visible" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-x-8" x-transition:enter-end="opacity-100 translate-x-0"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-x-0"
            x-transition:leave-end="opacity-0 translate-x-8"
            class="flex items-center w-full max-w-xs p-4 text-gray-500 dark:bg-white rounded-lg shadow-lg dark:text-gray-400 bg-gray-800 border border-gray-200 dark:border-gray-700"
            role="alert">

            <template x-if="toast.type === 'success'">
                <div
                    class="inline-flex items-center justify-center shrink-0 w-8 h-8 dark:text-green-500 dark:bg-green-100 rounded-lg bg-green-800 text-green-200">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
            </template>

            <template x-if="toast.type === 'danger' || toast.type === 'error'">
                <div
                    class="inline-flex items-center justify-center shrink-0 w-8 h-8 dark:text-red-500 dark:bg-red-100 rounded-lg bg-red-800 text-red-200">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
            </template>

            <template x-if="toast.type === 'warning'">
                <div
                    class="inline-flex items-center justify-center shrink-0 w-8 h-8 dark:text-orange-500 dark:bg-orange-100 rounded-lg bg-orange-800 text-orange-200">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
            </template>

            <template x-if="toast.type === 'info'">
                <div
                    class="inline-flex items-center justify-center shrink-0 w-8 h-8 dark:text-blue-500 dark:bg-blue-100 rounded-lg bg-blue-800 text-blue-200">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
            </template>

            <div class="ms-3 text-sm font-normal text-white dark:text-wira-dark-600" x-text="toast.message"></div>

            <button type="button" @click="removeToast(toast.id)"
                class="ms-auto -mx-1.5 -my-1.5 dark:bg-white dark:text-gray-400 dark:hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 dark:hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 text-gray-500 hover:text-white bg-gray-800 hover:bg-gray-700">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    </template>
</div>

<script>
    function toastNotification() {
        return {
            toasts: [],

            showToast(detail) {
                const id = Date.now();
                const toast = {
                    id: id,
                    type: detail.type || 'info',
                    message: detail.message || '',
                    visible: true
                };

                this.toasts.push(toast);

                // Auto remove after 5 seconds
                setTimeout(() => {
                    this.removeToast(id);
                }, detail.duration || 5000);
            },

            removeToast(id) {
                const index = this.toasts.findIndex(t => t.id === id);
                if (index > -1) {
                    this.toasts[index].visible = false;
                    setTimeout(() => {
                        this.toasts = this.toasts.filter(t => t.id !== id);
                    }, 300);
                }
            }
        }
    }
</script>
