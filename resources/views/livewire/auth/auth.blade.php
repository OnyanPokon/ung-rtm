<main class="w-full flex items-center h-screen" x-data="{ 
        showToast: @entangle('showToast').defer, 
        toastMessage: @js(session('toastMessage')), 
        toastType: @js(session('toastType'))
    }" x-init="
        if (toastMessage) {
            showToast = true;
            setTimeout(() => showToast = false, 5000);
        }
    ">
    <div x-show="showToast" x-transition
        :class="toastType === 'success' ? 'text-color-success-500' : 'text-color-danger-500'"
        class="fixed top-8 right-5 z-50 flex items-center w-full max-w-xs p-4 rounded-lg shadow bg-white" role="alert">
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
    <section class="flex-[3] w-full lg:flex items-center justify-center bg-color-primary-100 h-full hidden">
        <div class="w-60 relative">
            <img src="/hero/3d-business-man-and-woman-working-at-the-table.png" alt="" class="w-full">
            <div class="absolute -top-16 -left-24 bg-white p-4 max-w-xs rounded-lg rounded-br-none">
                <p class="font-medium text-sm">Bantu isi survei ini ya??</p>
            </div>
            <div
                class="absolute -top-16 -right-8 bg-color-primary-500 text-white p-4 max-w-xs rounded-lg rounded-bl-none">
                <p class="font-bold text-sm">Boleh-boleh aja</p>
            </div>
        </div>
    </section>
    <section class="flex-[4] w-full flex items-center justify-center bg-white h-full px-6">
        <div class="max-w-md w-full flex flex-col gap-y-2">
            <p class="text-sm text-slate-500">Selamat Datang Kembali👋</p>
            <h1 class="text-2xl font-bold">Masuk Ke Akun Kamu</h1>
            <form action="" wire:submit.prevent="handleLogin" x-data="{ showPassword: false }">
                @csrf
                <div class="flex flex-col gap-y-2 mt-2">
                    <label for="credential" class="text-sm">Kredensial :</label>
                    <input type="text" name="credential" wire:model="credential"
                        class="p-4 text-sm rounded-md bg-neutral-100 text-slate-600 focus:outline-none focus:outline-color-primary-500">
                    @error('credential') <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col gap-y-2 mt-2">
                    <label for="password" class="text-sm">Password :</label>
                    <input :type="showPassword ? 'text' : 'password'" name="password" wire:model="password"
                        class="p-4 text-sm rounded-md bg-neutral-100 text-slate-600 focus:outline-none focus:outline-color-primary-500">
                    @error('password') <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex mt-6 px-2">
                    <input type="checkbox" id="show_pass" x-model="showPassword" class="mr-2 leading-tight">
                    <label for="show_pass" class="text-sm">Tampil Password</label>
                </div>
                <div class="mt-4">
                    <x-button color="primary" class="w-full" size="lg" type="submit">
                        Login
                    </x-button>
                </div>
                <p class="text-sm mt-4">Bukan petugas? silahkan <a href="{{ route('home') }}" class="text-color-primary-500 underline font-bold">Kembali ke beranda</a></p>
               
            </form>
        </div>
    </section>
</main>