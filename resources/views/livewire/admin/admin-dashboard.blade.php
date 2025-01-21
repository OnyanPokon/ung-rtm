<main class="bg-[#f9fafc] min-h-screen"
    x-data="{ showToast: {{ session()->has('toastMessage') ? 'true' : 'false' }}, toastMessage: '{{ session('toastMessage') }}', toastType: '{{ session('toastType') }}' }"
    x-init="
    if (showToast) {
        setTimeout(() => showToast = false, 5000);
    }
">
    <!-- Toast -->
    <div x-show="showToast" x-transition
        :class="toastType === 'success' ? 'text-color-success-500' : 'text-color-danger-500'"
        class="fixed top-24 right-5 z-50 flex items-center w-full max-w-xs p-4 rounded-lg shadow bg-white" role="alert">
        <div :class="toastType === 'success' ? 'text-color-success-500 bg-color-success-100' : 'text-color-danger-500 bg-color-danger-100'"
            class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 rounded-lg">
            <span>
                <i :class="toastType === 'success' ? 'fas fa-check' : 'fas fa-exclamation'"></i>
            </span>
        </div>
        <div class="ml-3 text-sm font-normal" x-text="toastMessage"></div>
        <button type="button" @click="showToast = false"
            class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8"
            aria-label="Close">
            <span><i class="fas fa-times"></i></span>
        </button>
    </div>
    <section class="max-w-screen-xl mx-auto px-8 py-24 grid grid-cols-12 gap-4 ">
        @foreach($dataAdmin as $card)
        <div
            class="p-8 bg-white rounded-md shadow-sm border border-neutral-100 flex items-center gap-x-4 col-span-12 md:col-span-6 lg:col-span-3">
            <div class="text-4xl">
                <span class="text-color-primary-500">
                    <i class="{{ $card['icon'] }}"></i>
                </span>
            </div>
            <div class="flex flex-col">
                <p class="text-2xl font-bold">{{ $card['value'] }}</p>
                <p class="text-sm text-slate-500 font-semibold">{{ $card['label'] }}</p>
            </div>
        </div>
        @endforeach
    </section>
</main>