<main class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen" x-data="{
    showToast: {{ session()->has('toastMessage') ? 'true' : 'false' }},
    toastMessage: '{{ session('toastMessage') }}',
    toastType: '{{ session('toastType') }}'
}" x-init="if (showToast) { setTimeout(() => showToast = false, 5000); }">

    @push('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">
    @endpush

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

    <section class="max-w-7xl w-full mx-auto px-6 pt-24" x-data="{ addModal: false }">
        <!-- Kontainer Utama -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Kolom Kiri: Informasi RTM dan Filter -->
            <div class="space-y-6">
                <!-- Kartu Informasi RTM -->
                <div class="bg-white shadow rounded-lg p-6 border border-gray-200">
                    <h2 class="text-2xl font-bold mb-4 border-b pb-2">Filter</h2>
                    <div class="mb-4">
                        <label for="fakultas" class="block text-sm font-medium text-gray-700 mb-1">Fakultas</label>
                        <select id="fakultas" name="fakultas"
                            class="w-full p-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
                            <option value="">Pilih Fakultas</option>
                            @foreach ($fakultas as $f)
                                <option value="{{ $f->id }}">{{ $f->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="prodi" class="block text-sm font-medium text-gray-700 mb-1">Program Studi</label>
                        <select id="prodi" name="prodi"
                            class="w-full p-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
                            <option value="">Pilih Program Studi</option>
                            @foreach ($prodi as $p)
                                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="bg-white shadow rounded-lg p-6 border border-gray-200">
                    <h2 class="text-2xl font-bold mb-4 border-b pb-2">Informasi RTM</h2>
                    <p class="mb-2"><span class="font-semibold">Nama RTM:</span> {{ $rtm->name }}</p>
                    <p class="mb-2"><span class="font-semibold">Tahun:</span> {{ $rtm->tahun }}</p>

                    @if (!empty($rtm->ami_anchor))
                        <div class="mb-4">
                            <p class="font-semibold">AMI Anchor:</p>
                            <ul class="list-disc pl-4">
                                @foreach ($rtm->ami_anchor as $anchor)
                                    @php
                                        $matchedAnchor = collect($anchor_ami)->firstWhere('id', $anchor);
                                    @endphp
                                    <li>{{ $matchedAnchor ? $matchedAnchor['periode_name'] : '-' }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @else
                        <p><span class="font-semibold">AMI Anchor:</span> -</p>
                    @endif

                    @if (!empty($rtm->survei_anchor))
                        <div class="mb-4">
                            <p class="font-semibold">Survei Anchor:</p>
                            <ul class="list-disc pl-4">
                                @foreach ($rtm->survei_anchor as $anchor)
                                    @php
                                        $matchedAnchor = collect($anchor_survei)->firstWhere('id', (int) $anchor);
                                    @endphp
                                    <li>{{ $matchedAnchor['name'] ?? '-' }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @else
                        <p><span class="font-semibold">Survei Anchor:</span> -</p>
                    @endif

                    @if (!empty($rtm->akreditas_anchor))
                        <div>
                            <p class="font-semibold">Akreditasi Anchor:</p>
                            <ul class="list-disc pl-4">
                                @foreach ($rtm->akreditas_anchor as $anchor)
                                    @php
                                        $matchedAnchor = collect($anchor_ami)->firstWhere('id', (int) $anchor);
                                    @endphp
                                    <li>{{ $matchedAnchor['periode_name'] ?? '-' }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @else
                        <p><span class="font-semibold">Akreditasi Anchor:</span> -</p>
                    @endif

                    {{-- <p><span class="font-semibold">Deskripsi:</span> {{ $rtm->deskripsi ?? 'Tidak ada deskripsi' }}</p> --}}
                </div>

                <!-- Kartu Filter Fakultas dan Program Studi -->

            </div>

            <!-- Kolom Kanan: Tiga Kartu Data (disusun vertikal) -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Kartu Akreditasi -->

                <!-- Kartu Survei -->
                <div x-data="{ expanded: true }" class="bg-white shadow rounded-lg p-6 border border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-2xl font-bold">Survei</h2>
                        <button type="button" @click="expanded = !expanded"
                            class="text-gray-500 hover:text-gray-700 focus:outline-none">
                            <template x-if="expanded">
                                <i class="fas fa-chevron-up text-xl"></i>
                            </template>
                            <template x-if="!expanded">
                                <i class="fas fa-chevron-down text-xl"></i>
                            </template>
                        </button>
                    </div>
                    <div x-show="expanded" x-transition>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Code.</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Nama</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Aksi</th>

                                        {{-- <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Responden</th> --}}
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($rtm->survei_anchor as $index => $item)
                                        @php
                                            $matchedAnchor = collect($anchor_survei)->firstWhere('id', (int) $item);
                                        @endphp
                                        <tr>
                                            <td class="px-4 py-2 text-sm text-gray-600">{{ $matchedAnchor['code'] }}
                                            </td>
                                            <td class="px-4 py-2 text-sm text-gray-600">{{ $matchedAnchor['name'] }}
                                            </td>
                                            <td class="px-4 py-2 text-sm text-gray-600">  <x-button color="info" size="sm"
                                                onclick="window.location.href='{{ route('dashboard.master.rtm.detail', $rtm['id']) }}'">
                                                Detail
                                            </x-button></td>
                                                
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Kartu AMI -->
                <div x-data="{ expanded: true }" class="bg-white shadow rounded-lg p-6 border border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-2xl font-bold">AMI</h2>
                        <button type="button" @click="expanded = !expanded"
                            class="text-gray-500 hover:text-gray-700 focus:outline-none">
                            <template x-if="expanded">
                                <i class="fas fa-chevron-up text-xl"></i>
                            </template>
                            <template x-if="!expanded">
                                <i class="fas fa-chevron-down text-xl"></i>
                            </template>
                        </button>
                    </div>
                    <div x-show="expanded" x-transition>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">No.</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Nama</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Aksi</th>
                                        {{-- <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Hasil</th> --}}
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($rtm->ami_anchor as $index => $item)
                                        @php
                                            $matchedAnchor = collect($anchor_ami)->firstWhere('id', (int) $item);
                                        @endphp
                                        <tr>
                                            <td class="px-4 py-2 text-sm text-gray-600">{{ $loop->iteration }}</td>
                                            <td class="px-4 py-2 text-sm text-gray-600">
                                                {{ $matchedAnchor['periode_name'] }}</td>
                                            <td class="px-4 py-2 text-sm text-gray-600">  <x-button color="info" size="sm"
                                                onclick="window.location.href='{{ route('dashboard.master.rtm.detail', $rtm['id']) }}'">
                                                Detail
                                            </x-button></td>
                                                
                                            {{-- <td class="px-4 py-2 text-sm text-gray-600">{{ $item->hasil }}</td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div x-data="{ expanded: true }" class="bg-white shadow rounded-lg p-6 border border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-2xl font-bold">Akreditasi</h2>
                        <button type="button" @click="expanded = !expanded"
                            class="text-gray-500 hover:text-gray-700 focus:outline-none">
                            <template x-if="expanded">
                                <i class="fas fa-chevron-up text-xl"></i>
                            </template>
                            <template x-if="!expanded">
                                <i class="fas fa-chevron-down text-xl"></i>
                            </template>
                        </button>
                    </div>
                    <div x-show="expanded" x-transition>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">No.</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Nama</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($akreditasi as $index => $item)
                                        <tr>
                                            <td class="px-4 py-2 text-sm text-gray-600">{{ $index + 1 }}</td>
                                            <td class="px-4 py-2 text-sm text-gray-600">{{ $item->nama }}</td>
                                            <td class="px-4 py-2 text-sm text-gray-600">{{ $item->status }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

    @push('scripts')
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
