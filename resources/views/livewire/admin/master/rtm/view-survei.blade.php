<main class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen" x-data="{
    showToast: {{ session()->has('toastMessage') ? 'true' : 'false' }},
    toastMessage: '{{ session('toastMessage') }}',
    toastType: '{{ session('toastType') }}'
}" x-init="if (showToast) { setTimeout(() => showToast = false, 5000); }">

    <!-- Toast -->
    <div x-show="showToast" x-transition.opacity.duration.300ms
        :class="toastType === 'success' ? 'text-green-600' : 'text-red-600'"
        class="fixed top-20 right-5 z-50 flex items-center w-full max-w-xs p-4 rounded-lg shadow-lg bg-white">
        <div :class="toastType === 'success' ? 'text-green-600 bg-green-100' : 'text-red-600 bg-red-100'"
            class="inline-flex items-center justify-center flex-shrink-0 w-10 h-10 rounded-full">
            <span>
                <i :class="toastType === 'success' ? 'fas fa-check' : 'fas fa-exclamation'" class="text-xl"></i>
            </span>
        </div>
        <div class="ml-4 text-sm font-medium" x-text="toastMessage"></div>
        <button type="button" @click="showToast = false"
            class="ml-auto p-1 text-gray-400 hover:text-gray-700 rounded focus:outline-none" aria-label="Close">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <section class="max-w-7xl w-full mx-auto px-6 pt-24">
        <!-- Header with info card and filter in grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            <!-- Info Card -->
            <div
                class="bg-white rounded-xl shadow-md p-6 border border-gray-200 hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center border-b border-gray-200 pb-4 mb-4">
                    <div class="bg-indigo-100 p-2 rounded-full mr-3">
                        <i class="fas fa-info-circle text-indigo-600 text-xl"></i>
                    </div>
                    <h2 class="text-xl font-bold text-gray-800">Informasi Survei</h2>
                </div>
                <div class="space-y-3">
                    <div class="bg-gray-50 p-3 rounded-lg">
                        <p class="text-sm text-gray-500 mb-1">Nama Survei</p>
                        <p class="font-medium text-gray-800">{{ $anchorName }}</p>
                    </div>
                    <div class="bg-gray-50 p-3 rounded-lg">
                        <p class="text-sm text-gray-500 mb-1">RTM</p>
                        <p class="font-medium text-gray-800">{{ $rtm->name }} ({{ $rtm->tahun }})</p>
                    </div>
                </div>
            </div>

            <!-- Filter Card -->
            <div
                class="lg:col-span-2 bg-white rounded-xl shadow-md p-6 border border-gray-200 hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center border-b border-gray-200 pb-4 mb-4">
                    <div class="bg-blue-100 p-2 rounded-full mr-3">
                        <i class="fas fa-filter text-blue-600 text-xl"></i>
                    </div>
                    <h2 class="text-xl font-bold text-gray-800">Filter Data</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="fakultas" class="block text-sm font-medium text-gray-700 mb-2">Fakultas</label>
                        <div class="relative" wire:key="fakultas-dropdown">
                            <select id="fakultas" wire:model.live="selectedFakultas"
                                class="w-full p-3 border rounded-lg appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 bg-gray-50 hover:bg-white pl-4 pr-10">
                                <option value="">Semua Fakultas</option>
                            
                                @foreach ($fakultas as $fak)
                                    <option value="{{ $fak->id }}">{{ $fak->name }}</option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <i class="fas fa-chevron-down text-gray-500"></i>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-end">
                        <button wire:click="resetFilter"
                            class="w-full bg-gradient-to-r from-indigo-200 to-blue-200 hover:from-indigo-300 hover:to-blue-300 text-black font-medium py-3 px-4 rounded-lg transition-colors duration-200 flex items-center justify-center shadow-md hover:shadow-lg">
                            <i class="fas fa-redo-alt mr-2"></i> Reset Filter
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Rencana Tindak Lanjut Modal -->
        <div x-show="$wire.formIsOpen"
            class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center z-50">
            <div class="bg-white rounded-lg p-6 max-w-2xl w-full mx-4 shadow-2xl"
                @click.outside="$wire.closeRencanaForm()">
                <div class="flex justify-between items-center mb-4 border-b pb-4">
                    <div class="flex items-center">
                        <div
                            class="w-10 h-10 bg-gradient-to-br from-indigo-200 to-blue-200 rounded-lg flex items-center justify-center mr-3 shadow-md">
                            <i class="fas fa-clipboard-list text-black"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800">Rencana Tindak Lanjut</h3>
                    </div>
                    <button @click="$wire.closeRencanaForm()"
                        class="text-gray-500 hover:text-gray-700 bg-gray-100 hover:bg-gray-200 p-2 rounded-full">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="mb-5 p-4 bg-indigo-50 rounded-xl border border-indigo-100">
                    <h4 class="text-sm font-medium text-indigo-600 mb-1.5">Indikator:</h4>
                    <p class="text-gray-800">{{ $currentIndicatorDesc }}</p>
                </div>
                <form wire:submit.prevent="saveRencanaTindakLanjut">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-medium mb-2">Rencana Tindak Lanjut <span
                                class="text-red-500">*</span></label>
                        <textarea wire:model="rencanaForms.{{ $currentIndicatorId }}.rencana_tindak_lanjut"
                            class="w-full p-3.5 text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200 bg-gray-50 hover:bg-white shadow-sm"
                            rows="3" placeholder="Masukkan rencana tindak lanjut..."></textarea>
                        @error('rencanaForms.' . $currentIndicatorId . '.rencana_tindak_lanjut')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label class="block text-gray-700 text-sm font-medium mb-2">Target Penyelesaian <span
                                class="text-red-500">*</span></label>
                        <textarea wire:model="rencanaForms.{{ $currentIndicatorId }}.target_penyelesaian"
                            class="w-full p-3.5 text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200 bg-gray-50 hover:bg-white shadow-sm"
                            rows="2" placeholder="Contoh: Desember 2023"></textarea>
                        @error('rencanaForms.' . $currentIndicatorId . '.target_penyelesaian')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex justify-end space-x-4 pt-3">
                        <button type="button" @click="$wire.closeRencanaForm()"
                            class="px-5 py-2.5 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg transition-colors duration-200 font-medium shadow-sm hover:shadow-md">
                            <i class="fas fa-times mr-1.5"></i> Batal
                        </button>
                        <button type="submit"
                            class="px-5 py-2.5 text-black bg-gradient-to-r from-indigo-500 to-blue-600 hover:from-indigo-600 hover:to-blue-700 rounded-lg transition-colors duration-200 font-medium shadow-md hover:shadow-lg">
                            <span wire:loading.remove wire:target="saveRencanaTindakLanjut"><i
                                    class="fas fa-save mr-1.5"></i> Simpan</span>
                            <span wire:loading wire:target="saveRencanaTindakLanjut"><i
                                    class="fas fa-spinner fa-spin mr-1.5"></i> Menyimpan...</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Loading Indicator -->
        <div wire:loading wire:target="selectedFakultas, resetFilter" class="mb-4">
            <div class="bg-white rounded-xl shadow-md p-4 flex items-center justify-center">
                <i class="fas fa-circle-notch fa-spin text-blue-500 mr-2"></i>
                <span class="text-gray-700">Memuat data survei...</span>
            </div>
        </div>

        <!-- Survei Data Card -->
        <div
            class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transition-shadow duration-300 mt-8">
            <div
                class="flex items-center bg-gradient-to-r from-indigo-200 to-blue-200 border-b border-gray-200 px-6 py-4">
                <div
                    class="w-12 h-12 bg-white/90 backdrop-blur-md rounded-lg flex items-center justify-center mr-4 shadow-md">
                    <i class="fas fa-table text-indigo-600 text-xl"></i>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-gray-800">Data Survei</h2>
                    <p class="text-base text-gray-700">
                        {{ $selectedFakultas ? App\Models\Fakultas::find($selectedFakultas)->name : 'Semua Fakultas' }}
                    </p>
                </div>
            </div>

            <div wire:loading.remove wire:target="selectedFakultas, resetFilter">
                @if (isset($surveiData['data']['tabel']) && count($surveiData['data']['tabel']) > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-16">
                                        No
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Indikator
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-28">
                                        Nilai Butir
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-28">
                                        IKM
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Rencana Tindak Lanjut
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Target Penyelesaian
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($surveiData['data']['tabel'] as $index => $item)
                                    <tr class="hover:bg-indigo-50/30 transition-colors duration-200">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">
                                            {{ $index + 1 }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">{{ $item['name'] }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-center">
                                            <span
                                                class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium {{ floatval($item['nilai_butir']) >= 3.5 ? 'bg-green-100 text-green-800' : (floatval($item['nilai_butir']) >= 3 ? 'bg-blue-100 text-blue-800' : (floatval($item['nilai_butir']) >= 2.5 ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800')) }}">
                                                {{ $item['nilai_butir'] }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-center">
                                            <span
                                                class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium {{ floatval($item['ikm']) >= 85 ? 'bg-green-100 text-green-800' : (floatval($item['ikm']) >= 75 ? 'bg-blue-100 text-blue-800' : (floatval($item['ikm']) >= 65 ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800')) }}">
                                                {{ number_format($item['ikm'], 2) }}%
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-600">
                                            @if (isset($rencanaForms[$item['id']]) && !empty($rencanaForms[$item['id']]['rencana_tindak_lanjut']))
                                                <div class="flex justify-between items-center">
                                                    <div class="text-gray-800 pr-2">
                                                        {{ $rencanaForms[$item['id']]['rencana_tindak_lanjut'] }}</div>
                                                    <button
                                                        wire:click="openRencanaForm('{{ $item['id'] }}', '{{ $item['name'] }}')"
                                                        class="text-xs bg-indigo-100 hover:bg-indigo-200 text-indigo-700 py-1 px-2 rounded-full transition-colors duration-200 shadow-sm hover:shadow-md flex-shrink-0">
                                                        <i class="fas fa-edit text-xs"></i>
                                                    </button>
                                                </div>
                                            @else
                                                <button
                                                    wire:click="openRencanaForm('{{ $item['id'] }}', '{{ $item['name'] }}')"
                                                    class="text-xs bg-indigo-100 hover:bg-indigo-200 text-indigo-700 py-1.5 px-3 rounded-full transition-colors duration-200 shadow-sm hover:shadow-md">
                                                    <i class="fas fa-plus text-xs mr-1"></i> Tambah
                                                </button>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-600">
                                            @if (isset($rencanaForms[$item['id']]) && !empty($rencanaForms[$item['id']]['target_penyelesaian']))
                                                <div class="flex justify-between items-center">
                                                    <div class="text-gray-800 pr-2">
                                                        {{ $rencanaForms[$item['id']]['target_penyelesaian'] }}</div>
                                                    <button
                                                        wire:click="openRencanaForm('{{ $item['id'] }}', '{{ $item['name'] }}')"
                                                        class="text-xs bg-indigo-100 hover:bg-indigo-200 text-indigo-700 py-1 px-2 rounded-full transition-colors duration-200 shadow-sm hover:shadow-md flex-shrink-0">
                                                        <i class="fas fa-edit text-xs"></i>
                                                    </button>
                                                </div>
                                            @else
                                                <span class="text-gray-400">-</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="p-10 text-center">
                        <div
                            class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gradient-to-br from-indigo-500/20 to-blue-500/20 mb-4">
                            <i class="fas fa-search text-indigo-500 text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-medium text-gray-800 mb-2">Tidak ada data survei yang tersedia</h3>
                        <p class="text-gray-500">Coba pilih fakultas lain atau reset filter untuk melihat data</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
</main>
