<div x-data="{
    show: false,
    message: '',
    type: 'info',
    timeout: null,

    init() {
        window.addEventListener('toast', (event) => {
            this.showToast(event.detail[0] ?? event.detail);
        });
    },

    showToast(detail) {
        clearTimeout(this.timeout);

        this.message = detail.message ?? '';
        this.type = detail.type ?? 'info';
        this.show = true;

        this.timeout = setTimeout(() => {
            this.show = false;
        }, 3500);
    }
}" x-show="show" x-transition x-cloak
    class="
        fixed z-50 w-full max-w-sm px-4
        top-6
        left-1/2 -translate-x-1/2
        sm:left-auto sm:right-6 sm:translate-x-0
    "
    style="display: none;">

    <div class="flex items-center gap-3 px-5 py-4 rounded-xl shadow-2xl border backdrop-blur-sm"
        :class="{
            'bg-white border-green-500 text-green-500': type === 'success',
            'bg-white border-red-500 text-red-500': type === 'error',
            'bg-white border-yellow-400 text-yellow-500': type === 'warning',
            'bg-white border-blue-500 text-blue-500': type === 'info',
        }">

        <div class="flex-shrink-0 mt-0.5">
            <template x-if="type === 'success'">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </template>
            <template x-if="type === 'error'">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </template>
            <template x-if="type === 'warning'">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                    </path>
                </svg>
            </template>
            <template x-if="type === 'info'">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </template>
        </div>

        <div class="flex-1 text-sm font-medium" x-text="message"></div>

        <button @click="show = false" class="flex-shrink-0 ml-2 opacity-70 hover:opacity-100 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
</div>
