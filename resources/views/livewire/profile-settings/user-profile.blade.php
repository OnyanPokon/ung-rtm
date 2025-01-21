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
    <section class=" max-w-screen-xl w-full mx-auto px-4 pt-24 grid grid-cols-12 gap-4 pb-12 "
        x-data="{ activeMenu: 'profil' }">
        <div
            class="p-8 col-span-12 lg:col-span-4 h-fit bg-white flex flex-col lg:flex-row gap-y-2 gap-x-4 rounded-lg border border-slate-100 shadow-sm w-full">
            <div class=" flex flex-col gap-y-2 w-full">
                {{-- <h1 class="font-bold text-lg">{{ $survei['name'] }}</h1> --}}
                {{-- <p class="text-slate-500 text-sm">{{ $survei['description'] }}</p> --}}
                {{-- <div class="flex flex-col gap-y-2 font-semibold w-full">
                    <div class="inline-flex gap-x-2 items-center text-sm w-full">
                        <span>
                            <i class="fas fa-bullseye"></i>
                        </span>
                        <p class="w-full">Target : {{ $survei['target']->name }} <span @click="clickCount++"
                                class="cursor-default">.</span>
                        </p>
                    </div>
                    <div class="inline-flex gap-x-2 items-center text-sm">
                        <span>
                            <i class="fas fa-server"></i>
                        </span>
                        <p>Jenis Survei : {{ $survei['jenis']->name }}</p>
                    </div>
                    <div class="inline-flex gap-x-2 items-center text-sm text-color-success-500">
                        <span>
                            <i class="fas fa-check"></i>
                        </span>
                        <p>Aspek Total : {{ count($survei->aspek) }}</p>
                    </div>
                </div> --}}
                <div class="w-full grid grid-cols-12 gap-2 items-center border p-2 py-3 rounded-lg ">
                    <div class="col-span-3 p-2">
                        <img src="{{ Auth::user()->avatar_url ?? '/avatar/placeholder.jpg' }}" alt=""
                            class="w-full rounded-full hover:cursor-pointer" />
                    </div>
                    <div class="col-span-9 flex flex-col gap-y-px">
                        <h1 class="font-bold text-sm">{{ $user['name'] }}</h1>
                        <p class="text-xs font-semibold">Petugas tingkat {{ Auth::user()->role->slug }}</p>

                        <p class="text-xs">Aktif sejak :
                            @php
                            use Carbon\Carbon;
                            @endphp
                            {{ Carbon::parse($user['created_at'])->translatedFormat('F Y')}}
                        </p>
                    </div>
                </div>
                <div class="mt-2 flex flex-col gap-y-2">
                    <div @click="activeMenu = 'profil'"
                        :class="{ 'bg-color-info-500 text-white border-color-info-500': activeMenu === 'profil' }"
                        class="p-3 px-4 border  rounded-lg inline-flex gap-x-2 items-center hover:cursor-pointer transition-colors hover:bg-color-info-400 hover:text-white hover:border-color-info-400">
                        <span class="text-lg">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="font-semibold text-sm">
                            Ganti Profil
                        </span>
                    </div>
                    <div @click="activeMenu = 'password'"
                        :class="{ 'bg-color-info-500 text-white border-color-info-500': activeMenu === 'password' }"
                        class="p-3 px-4 border  rounded-lg inline-flex gap-x-2 items-center hover:cursor-pointer transition-colors hover:bg-color-info-400 hover:text-white hover:border-color-info-400">
                        <span class="text-lg">
                            <i class="fas fa-lock"></i>
                        </span>
                        <span class="font-semibold text-sm">
                            Ganti Kata Sandi
                        </span>
                    </div>
                </div>
                <div class="inline-flex items-center gap-x-2 mt-4">
                    <x-button color="danger" size="sm" onclick="window.location.href='{{ route('dashboard') }}'">
                        Kembali
                    </x-button>
                </div>
            </div>
        </div>
        <div class="col-span-12 lg:col-span-8 w-full flex flex-col gap-y-4 h-fit">
            <div x-show="activeMenu === 'password'" x-cloak>
                <div class="p-6 bg-white rounded-lg border-slate-100 shadow-sm flex flex-col">
                    <div class="mb-4">
                        <p class="text-lg font-bold">Ganti Kata Sandi</p>
                    </div>
                    <hr class="mb-4">
                    <p class="mb-4 text-sm">Silahkan ubah kata sandi dengan yang baru</p>
                    <form wire:submit.prevent="changePassword" class="grid grid-cols-12"
                        x-data="{ showPassword: false }">
                        <div class="flex flex-col gap-y-2 col-span-12 mb-4">
                            <label for="currentpass" class="text-sm">Kata sandi sekarang:</label>
                            <input :type="showPassword ? 'text' : 'password'" id="currentpass" name="currentpass"
                                wire:model="user.currentpass" placeholder="Masukan Kata Sandi Saat Ini"
                                class="p-4 text-sm rounded-md bg-neutral-50 text-slate-800 focus:outline-none focus:outline-color-info-500 border border-neutral-200">
                            @error('user.currentpass') <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col gap-y-2 col-span-12 mb-4">
                            <label for="newpass" class="text-sm">Kata Sandi baru:</label>
                            <input :type="showPassword ? 'text' : 'password'" id="newpass" name="newpass"
                                wire:model="user.newpass" placeholder="Masukan Kata Sandi Baru"
                                class="p-4 text-sm rounded-md bg-neutral-50 text-slate-800 focus:outline-none focus:outline-color-info-500 border border-neutral-200">
                            @error('user.newpass') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div class="flex flex-col gap-y-2 col-span-12 mb-4">
                            <label for="confirmnewpass" class="text-sm">Ketik ulang kata sandi baru:</label>
                            <input :type="showPassword ? 'text' : 'password'" id="confirmnewpass" name="confirmnewpass"
                                wire:model="user.confirmnewpass" placeholder="Masukan Kembali Kata Sandi Baru"
                                class="p-4 text-sm rounded-md bg-neutral-50 text-slate-800 focus:outline-none focus:outline-color-info-500 border border-neutral-200">
                            @error('user.confirmnewpass') <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex px-2 col-span-12 mb-4">
                            <input type="checkbox" id="show_pass" x-model="showPassword" class="mr-2 leading-tight">
                            <label for="show_pass" class="text-sm">Tampil Kata Sandi</label>
                        </div>
                        <x-button class="inline-flex items-center w-fit gap-x-2 col-span-12" color="info" type="submit">
                            <span wire:loading.remove>
                                <i class="fas fa-edit"></i>
                            </span>
                            <span wire:loading class="animate-spin">
                                <i class="fas fa-circle-notch"></i>
                            </span>
                            Simpan
                        </x-button>
                    </form>
                </div>
            </div>
            <div x-show="activeMenu === 'profil'" x-cloak>
                <div class="p-6 bg-white rounded-lg border-slate-100 shadow-sm flex flex-col">
                    <div class="mb-4">
                        <p class="text-lg font-bold">Profile User</p>
                    </div>
                    <hr class="mb-4">
                    <p class="mb-4 text-sm">Silahkan ubah data profil user dengan data baru</p>
                    <form wire:submit.prevent="changeUserProfile" class="grid grid-cols-12"
                        x-data="{ showPassword: false }">
                        <div class="flex flex-col gap-y-2 col-span-12 mb-4">
                            <label for="name" class="text-sm">Nama User:</label>
                            <input type="text" id="name" name="name"
                                wire:model="user.name" placeholder="Masukan Kata Sandi Saat Ini"
                                class="p-4 text-sm rounded-md bg-neutral-50 text-slate-800 focus:outline-none focus:outline-color-info-500 border border-neutral-200">
                            @error('user.name') <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col gap-y-2 col-span-12 mb-4">
                            <label for="email" class="text-sm">Email:</label>
                            <input type="email" id="email" name="email"
                                wire:model="user.email" placeholder="Masukan Kata Sandi Baru"
                                class="p-4 text-sm rounded-md bg-neutral-50 text-slate-800 focus:outline-none focus:outline-color-info-500 border border-neutral-200">
                            @error('user.email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <x-button class="inline-flex items-center w-fit gap-x-2 col-span-12" color="info" type="submit">
                            <span wire:loading.remove>
                                <i class="fas fa-edit"></i>
                            </span>
                            <span wire:loading class="animate-spin">
                                <i class="fas fa-circle-notch"></i>
                            </span>
                            Simpan
                        </x-button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
    @endpush
</main>