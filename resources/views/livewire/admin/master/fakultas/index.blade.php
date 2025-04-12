<main class="bg-[#f9fafc] min-h-screen" x-data="{ showToast: {{ session()->has('toastMessage') ? 'true' : 'false' }}, toastMessage: '{{ session('toastMessage') }}', toastType: '{{ session('toastType') }}' }" x-init="if (showToast) {
    setTimeout(() => showToast = false, 5000);
}">
    @push('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">
    @endpush
    <!-- Toast -->
    <div x-show="showToast" x-transition
        :class="toastType === 'success' ? 'text-color-success-500' : 'text-color-danger-500'"
        class="fixed top-24 right-5 z-50 flex items-center w-full max-w-xs p-4 rounded-lg shadow bg-white" role="alert">
        <div :class="toastType === 'success' ? 'text-color-success-500 bg-color-success-100' :
            'text-color-danger-500 bg-color-danger-100'"
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
    <section class="max-w-screen-xl w-full mx-auto px-4 pt-24" x-data="{ addModal: false }">

        <div
            class="mt-4 p-6 bg-white flex flex-col lg:flex-row lg:items-center gap-y-2 justify-between rounded-lg border border-slate-100 shadow-sm">
            <div>
                <h1 class="font-bold text-lg">{{ $master }}</h1>
                <p class="text-slate-500 text-sm">List data {{ $master }} yang berhasil terinput dalam Database
                </p>
            </div>
            <div>
                <x-button class="" color="info" size="sm" @click="addModal = !addModal">
                    Tambah {{ $master }}
                </x-button>
            </div>
        </div>
        {{-- add modal --}}
        <div x-show="addModal" style="display: none" x-on:keydown.escape.window="addModal = false"
            class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full md:inset-0 h-full max-h-full bg-black/20">
            <div class="relative p-4 w-full max-w-2xl max-h-full" @click.outside="addModal = false">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow ">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                        <h3 class="text-lg font-bold text-gray-900 ">
                            Tambah Data {{ $master }}
                        </h3>
                        <button type="button" @click="addModal = false"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                            data-modal-hide="default-modal">
                            <span>
                                <i class="fas fa-times"></i>
                            </span>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <form wire:submit.prevent="addFakultas" class="grid grid-cols-12 p-2">
                            <div class="flex flex-col gap-y-2 col-span-12 mb-4">
                                <label for="fakultas" class="text-sm ">Nama {{ $master }} :</label>
                                <input type="text" id="fakultas" name="fakultas" wire:model="fakultas.nama"
                                    placeholder="Masukan Nama {{ $master }}"
                                    class="p-4 text-sm rounded-md bg-neutral-100 text-slate-600 focus:outline-none focus:outline-color-info-500 border border-neutral-200">
                                @error('fakultas.nama')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex flex-col gap-y-2 col-span-12 mb-4">
                                <label for="kode" class="text-sm ">Kode {{ $master }} :</label>
                                <input type="text" id="kode" name="Kode" wire:model="fakultas.kode"
                                    placeholder="Masukan Kode {{ $master }}"
                                    class="p-4 text-sm rounded-md bg-neutral-100 text-slate-600 focus:outline-none focus:outline-color-info-500 border border-neutral-200">
                                @error('fakultas.kode')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- AMI Anchor -->
                            <div class="flex flex-col gap-y-2 col-span-12 mb-4">
                                <label for="ami_anchor" class="text-sm">AMI:</label>
                                <select multiple id="ami_anchor" name="ami_anchor" wire:model="fakultas.ami_anchor"
                                    class="multi-select p-4 text-sm rounded-md bg-neutral-100 text-slate-600 border border-neutral-200">
                                    @foreach ($anchor_ami as $anchor)
                                        <option value="{{ $anchor['id'] }}">{{ $anchor['periode_name'] }}</option>
                                    @endforeach
                                </select>
                                @error('fakultas.ami_anchor')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="flex flex-col gap-y-2 col-span-12 mb-4">
                                <label for="survei_anchor" class="text-sm">Survei:</label>
                                <select multiple id="survei_anchor" name="survei_anchor"
                                    wire:model="fakultas.survei_anchor"
                                    class="multi-select p-4 text-sm rounded-md bg-neutral-100 text-slate-600 border border-neutral-200">
                                    @foreach ($anchor_survei as $anchor)
                                        <option value="{{ $anchor['id'] }}">{{ $anchor['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('fakultas.survei_anchor')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="flex flex-col gap-y-2 col-span-12 mb-4">
                                <label for="akreditas_anchor" class="text-sm">Akreditasi:</label>
                                <select multiple id="akreditas_anchor" name="akreditas_anchor"
                                    wire:model="fakultas.akreditas_anchor"
                                    class="multi-select p-4 text-sm rounded-md bg-neutral-100 text-slate-600 border border-neutral-200">
                                    {{-- <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option> --}}
                                </select>
                                @error('fakultas.akreditas_anchor')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <x-button class="inline-flex items-center w-fit gap-x-2 col-span-12" color="info"
                                type="submit">
                                <span wire:loading.remove>
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span wire:loading class="animate-spin">
                                    <i class="fas fa-circle-notch "></i>
                                </span>
                                Tambah {{ $master }}
                            </x-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="max-w-screen-xl w-full mx-auto px-4 mt-4 pb-12">
        <div class="p-4 bg-white rounded-lg border-slate-100 shadow-sm ">
            <div class="p-4 overflow-x-auto text-sm">
                <table id="myTable" class="cell-border stripe">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataFakultas as $fakultas)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $fakultas['code'] }}</td>
                                <td>{{ $fakultas['name'] }}</td>
                                <td>
                                    <div class="inline-flex gap-x-2">
                                        <!-- Edit button -->
                                        <x-button class="" color="info" size="sm"
                                            onclick="window.location.href='{{ route('dashboard.master.fakultas.edit', $fakultas['id']) }}'">
                                            Edit
                                        </x-button>
                                        <!-- Delete button (if needed) -->
                                        <x-button class="" color="danger" size="sm"
                                            onclick="confirmDelete({{ $fakultas['id'] }})">
                                            Hapus
                                        </x-button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
    @push('scripts')
        <script>
            $(document).ready(function() {
                // Inisialisasi DataTables
                var table = $('#myTable').DataTable();
            });
        </script>
        <script>
            function confirmDelete(id) {
                if (confirm(`Hapus fakultas? ${id}`)) {
                    @this.call('deleteFakultas', id);
                }
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const elements = document.querySelectorAll('.multi-select');
                elements.forEach(el => new Choices(el, {
                    removeItemButton: true,
                    allowHTML: true
                }));
            });
        </script>
    @endpush
</main>
