
<main class="bg-[#f9fafc] min-h-screen">
    <section class="max-w-screen-xl w-full mx-auto px-4 pt-24">
        <div
            class="p-6 bg-white flex flex-col lg:flex-row lg:items-center gap-y-2 justify-between rounded-lg border border-slate-100 shadow-sm">
            <div>
                <h1 class="font-bold text-lg">Cetak Laporan {{ $master }}</h1>
            </div>
            <div>
                <x-button class="" color="danger" size="sm" wire:click="redirectToAdd">
                    Kembali
                </x-button>
            </div>
        </div>
    </section>
    <section class="max-w-screen-xl w-full mx-auto px-4 mt-4 pb-12">
        <div class="p-6 bg-white rounded-lg border-slate-100 shadow-sm">
            <form wire:submit.prevent="submitDocument" class="grid grid-cols-12">
                <div class="flex flex-col gap-y-2 col-span-12 mb-4">
                    <label for="ketua_upm" class="text-sm">Ketua UPM :</label>
                    <input type="text"  id="ketua_upm" name="ketua_upm"
                        wire:model="downloadDocument.ketua_upm"
                        placeholder="Masukan Ketua UPM"
                        class="p-4 text-sm rounded-md bg-neutral-100 text-slate-600 focus:outline-none focus:outline-color-info-500 border border-neutral-200">
                    @error('downloadDocument.ketua_upm')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col gap-y-2 col-span-12 mb-4">
                    <label for="dekan" class="text-sm">Dekan :</label>
                    <input type="text" id="dekan" name="dekan"
                        wire:model="downloadDocument.dekan"
                        placeholder="Masukan Dekan"
                        class="p-4 text-sm rounded-md bg-neutral-100 text-slate-600 focus:outline-none focus:outline-color-info-500 border border-neutral-200">
                    @error('downloadDocument.dekan')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col gap-y-2 col-span-12 mb-4">
                    <label for="tempat" class="text-sm">Tempat :</label>
                    <input type="text" id="tempat" name="tempat"
                        wire:model="downloadDocument.tempat"
                        placeholder="Masukan Tempat "
                        class="p-4 text-sm rounded-md bg-neutral-100 text-slate-600 focus:outline-none focus:outline-color-info-500 border border-neutral-200">
                    @error('downloadDocument.tempat')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col gap-y-2 col-span-12 mb-4">
                    <label for="waktu" class="text-sm">Waktu :</label>
                    <input type="time" id="waktu" name="waktu"
                        wire:model="downloadDocument.waktu"
                        placeholder="Masukan Waktu "
                        class="p-4 text-sm rounded-md bg-neutral-100 text-slate-600 focus:outline-none focus:outline-color-info-500 border border-neutral-200">
                    @error('downloadDocument.waktu')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col gap-y-2 col-span-12 mb-4">
                    <label for="hari_tanggal" class="text-sm">Hari Tanggal :</label>
                    <input type="date" id="hari_tanggal" name="hari_tanggal"
                        wire:model="downloadDocument.hari_tanggal"
                        placeholder="Masukan Hari Tanggal "
                        class="p-4 text-sm rounded-md bg-neutral-100 text-slate-600 focus:outline-none focus:outline-color-info-500 border border-neutral-200">
                    @error('downloadDocument.hari_tanggal')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
              
                <div class="flex flex-col gap-y-2 col-span-12 mb-4">
                    <label for="agenda" class="text-sm">Agenda :</label>
                    <input type="text" id="agenda" name="agenda"
                        wire:model="downloadDocument.agenda"
                        placeholder="Masukan Agenda "
                        class="p-4 text-sm rounded-md bg-neutral-100 text-slate-600 focus:outline-none focus:outline-color-info-500 border border-neutral-200">
                    @error('downloadDocument.agenda')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col gap-y-2 col-span-12 mb-4">
                    <label for="pemimpin_rapat" class="text-sm">Pemimpin Rapat :</label>
                    <input type="text" id="pemimpin_rapat" name="pemimpin_rapat"
                        wire:model="downloadDocument.pemimpin_rapat"
                        placeholder="Masukan Pemimpin Rapat "
                        class="p-4 text-sm rounded-md bg-neutral-100 text-slate-600 focus:outline-none focus:outline-color-info-500 border border-neutral-200">
                    @error('downloadDocument.agenda')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col gap-y-2 col-span-12 mb-4">
                    <label for="notulis" class="text-sm">Notulis :</label>
                    <input type="text" id="notulis" name="notulis"
                        wire:model="downloadDocument.notulis"
                        placeholder="Masukan Notulis "
                        class="p-4 text-sm rounded-md bg-neutral-100 text-slate-600 focus:outline-none focus:outline-color-info-500 border border-neutral-200">
                    @error('downloadDocument.notulis')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                
                <x-button class="inline-flex items-center w-fit gap-x-2 col-span-12" color="info" type="submit">
                    <span wire:loading.remove>
                        <i class="fas fa-download"></i>
                    </span>
                    <span wire:loading class="animate-spin">
                        <i class="fas fa-circle-notch"></i>
                    </span>
                    {{ $master }}
                </x-button>
            </form>
        </div>
    </section>
</main>
