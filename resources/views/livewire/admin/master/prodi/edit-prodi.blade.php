<main class="bg-[#f9fafc] min-h-screen">
    <section class="max-w-screen-xl w-full mx-auto px-4 pt-24" x-data="{ addModal: false }">
        <div
            class="p-6 bg-white flex flex-col lg:flex-row lg:items-center gap-y-2 justify-between rounded-lg border border-slate-100 shadow-sm">
            <div>
                <h1 class="font-bold text-lg">Edit {{ $master }}</h1>
                <p class="text-slate-500 text-sm">Edit data {{ $master }} yang berhasil terinput dalam Database</p>
            </div>
            <div>
                <x-button class="" color="danger" size="sm" wire:click="redirectToAdd">
                    Kembali
                </x-button>
            </div>
        </div>

    </section>
    <section class="max-w-screen-xl w-full mx-auto px-4 mt-4">
        <div class="p-6 bg-white rounded-lg border-slate-100 shadow-sm">
            <form wire:submit.prevent="updateProdi" class="grid grid-cols-12">
                <div class="flex flex-col gap-y-2 col-span-12 mb-4">
                    <label for="nama" class="text-sm">Nama {{ $master }} :</label>
                    <input type="text" id="nama" name="nama" wire:model="prodi.name"
                        placeholder="Masukan Nama {{ $master }}"
                        class="p-4 text-sm rounded-md bg-neutral-100 text-slate-600 focus:outline-none focus:outline-color-info-500 border border-neutral-200">
                    @error('prodi.nama')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col gap-y-2 col-span-12 mb-4">
                    <label for="kode" class="text-sm">Kode {{ $master }} :</label>
                    <input type="text" id="kode" name="kode" wire:model="prodi.code"
                        placeholder="Masukan Kode {{ $master }}"
                        class="p-4 text-sm rounded-md bg-neutral-100 text-slate-600 focus:outline-none focus:outline-color-info-500 border border-neutral-200">
                    @error('prodi.kode')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col gap-y-2 col-span-12 mb-4">
                    <label for="fakultas_id" class="text-sm">Fakultas :</label>
                    <select name="fakultas_id" id="fakultas_id" wire:model="prodi.fakultas_id"
                        class="p-4 text-sm rounded-md bg-neutral-100 text-slate-600 focus:outline-none focus:outline-color-info-500 border border-neutral-200">
                        <option value="">Pilih Fakultas</option>
                        @foreach ($dataFakultas as $fakultas)
                            <option value="{{ $fakultas->id }}">{{ $fakultas->name }}</option>
                        @endforeach
                    </select>
                    @error('prodi.fakultas_id')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <x-button class="inline-flex items-center w-fit gap-x-2 col-span-4" color="info" type="submit">
                    <span>
                        <i class="fas fa-edit"></i>
                    </span>
                    Edit {{ $master }}
                </x-button>
            </form>
        </div>

    </section>
    @push('scripts')
    @endpush
</main>
