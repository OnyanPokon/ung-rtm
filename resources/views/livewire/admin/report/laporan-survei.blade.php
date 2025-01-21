<main>
    <section class="p-24 h-screen flex flex-col justify-between ">
        <div class="font-bold text-center text-xl">
            <p>LAPORAN SURVEI {{ $survei->name }}</p>
            <p>UNIVERSITAS NEGERI GORONTALO</p>
            <p>Tahun {{ $tahunAkademik }}</p>
        </div>
        <div class="flex items-center justify-center w-full mt-24">
            <img src="/logo/ung.png" alt="" class="w-60">
        </div>
        <div class="font-bold text-center text-xl mt-24">
            <p>LEMBAGA PENJAMINAN MUTU</p>
            <p>DAN PENGEMBANGAN PEMBELAJARAN</p>
            <p>UNIVERSITAS NEGERI GORONTALO</p>
            <p>{{ $tahunAkademik }}</p>
        </div>
    </section>
    <section class="p-12 min-h-screen h-full flex flex-col justify-between">
        <div class="font-bold text-center text-xl flex flex-col gap-y-12">
            <p>KATA PENGANTAR</p>
            <div class="text-left flex flex-col gap-y-4 font-normal text-base">
                <p class="italic">Assalamualaikum wr. wb.</p>
                <p>
                    Segala puji dan syukur senantiasa dipanjatkan kehadirat Allah SWT., karena berkat
                    rahmat dan hidayahNya maka Laporan Survei {{ $survei->name }} dapat
                    diselesaikan.
                </p>
                <p>
                    Salah satu kata kunci kesuksesan pengelolaan lembaga atau organisasi adalah
                    satisfaction (kepuasan) para pengguna. Tingkat kepuasan layanan mengukur respon
                    pelanggan terhadap terhadap evaluasi kesesuaian atau ketidaksesuaian yang dirasakan
                    antara harapan tentang kinerja dengan kinerja aktual produk yang dirasakan setelah
                    pemakaiannya
                </p>
                <p>
                    Laporan hasil survei kepuasan menjadi acuan Universitas/Fakultas dan Program Studi
                    untuk berbenah dan menjadi barometer untuk meningkatkan kinerja di masa yang akan
                    datang. Akhirnya, kepada tim dan semua pihak yang terlibat dalam pelaksanaan survei
                    ini dihaturkan terima kasih yang sebenar – benarnya.
                </p>
            </div>
        </div>
        <div class="w-full flex flex-col gap-y-2">
            <table class="w-full">
                <tbody>
                    <tr class="w-[50%]">
                        <td class="w-[50%]">Mengetahui</td>
                        <td class="w-[50%]"></td>
                    </tr>
                    <tr class="w-[50%]">
                        <td class="py-12 w-[50%]"></td>
                        <td class="py-12 w-[50%]"></td>
                    </tr>
                    <tr class="w-[50%]">
                        <td class="w-[50%]">Kepala LPMPP UNG</td>
                        <td class="w-[50%]">Kepala Pusat SIM dan Survei SPMI</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </section>
    <section class="p-12 min-h-screen h-full flex flex-col gap-y-12">
        <div class="font-bold text-center text-xl flex flex-col gap-y-12">
            <p>DAFTAR ISI</p>
        </div>
        <div class="w-full flex flex-col gap-y-2">
            <ul class="flex flex-col gap-y-2">
                <li class="inline-flex w-full font-bold">
                    <p class="min-w-fit">KATA PENGANTAR</p>
                    <div class="w-full border-b-2 border-dashed border-black"></div>
                    <p class="">ii</p>
                </li>
                <li class="inline-flex w-full font-bold">
                    <p class="min-w-fit">LEMBAR PENGESAHAN</p>
                    <div class="w-full border-b-2 border-dashed border-black"></div>
                    <p class="">ii</p>
                </li>
                <li class="inline-flex w-full font-bold">
                    <p class="min-w-fit">DAFTAR ISI</p>
                    <div class="w-full border-b-2 border-dashed border-black"></div>
                    <p class="">ii</p>
                </li>
                <li class="inline-flex w-full font-bold">
                    <p class="min-w-fit">BAB 1 PENDAHULUAN</p>
                    <div class="w-full border-b-2 border-dashed border-black"></div>
                    <p class="">ii</p>
                </li>
                <li class="inline-flex w-full font-normal ps-12 ">
                    <p class="min-w-fit">A. LATAR BELAKANG</p>
                    <div class="w-full border-b-2 border-dashed border-black"></div>
                    <p class="">ii</p>
                </li>
                <li class="inline-flex w-full font-normal ps-12 ">
                    <p class="min-w-fit">B. TUJUAN KEGIATAN</p>
                    <div class="w-full border-b-2 border-dashed border-black"></div>
                    <p class="">ii</p>
                </li>
                <li class="inline-flex w-full font-normal ps-12 ">
                    <p class="min-w-fit">C. MANFAAT KEGIATAN</p>
                    <div class="w-full border-b-2 border-dashed border-black"></div>
                    <p class="">ii</p>
                </li>
                <li class="inline-flex w-full font-bold">
                    <p class="min-w-fit">BAB 2 PENDAHULUAN</p>
                    <div class="w-full border-b-2 border-dashed border-black"></div>
                    <p class="">ii</p>
                </li>
                <li class="inline-flex w-full font-normal ps-12 ">
                    <p class="min-w-fit">A. RUANG LINGKUP</p>
                    <div class="w-full border-b-2 border-dashed border-black"></div>
                    <p class="">ii</p>
                </li>
                <li class="inline-flex w-full font-normal ps-12 ">
                    <p class="min-w-fit">B. OPERASIONAL VARIABEL</p>
                    <div class="w-full border-b-2 border-dashed border-black"></div>
                    <p class="">ii</p>
                </li>
                <li class="inline-flex w-full font-normal ps-12 ">
                    <p class="min-w-fit">C. TINGKAT KEPUASAN MAHASISWA</p>
                    <div class="w-full border-b-2 border-dashed border-black"></div>
                    <p class="">ii</p>
                </li>
                <li class="inline-flex w-full font-bold">
                    <p class="min-w-fit">BAB 3 HASIL KEGIATAN</p>
                    <div class="w-full border-b-2 border-dashed border-black"></div>
                    <p class="">ii</p>
                </li>
                <li class="inline-flex w-full font-normal ps-12 ">
                    <p class="min-w-fit">A. ANALISIS TINGKAT KEPUASAN DOSEN</p>
                    <div class="w-full border-b-2 border-dashed border-black">


                    </div>
                    <p class="">ii</p>
                </li>
                <li class="inline-flex w-full font-bold">
                    <p class="min-w-fit">BAB 3 KESIMPULAN DAN TINGKAT LANJUT</p>
                    <div class="w-full border-b-2 border-dashed border-black"></div>
                    <p class="">ii</p>
                </li>
                <li class="inline-flex w-full font-normal ps-12 ">
                    <p class="min-w-fit">A. KESIMPULAN</p>
                    <div class="w-full border-b-2 border-dashed border-black"></div>
                    <p class="">ii</p>
                </li>
                <li class="inline-flex w-full font-bold">
                    <p class="min-w-fit">LAMPIRAN A. DATA REKAP SURVEI KEPUASAN DOSEN</p>
                    <div class="w-full border-b-2 border-dashed border-black"></div>
                    <p class="">ii</p>
                </li>


            </ul>
        </div>

    </section>
    <section class="p-12 min-h-screen h-full flex flex-col gap-y-12">
        <div class="font-bold text-center text-xl flex flex-col gap-y-12">
            <p>BAB I. PENDAHULUAN</p>
        </div>
        <div class="w-full flex flex-col gap-y-2">
            <P class="font-bold">
                A. LATAR BEKAKANG
            </P>
            <p>
                Sebagai sebuah unit penyelenggara pendidikan, Universitas Negeri Gorontalo
                dituntut untuk mampu memberikan layanan yang berkualitas kepada para pengguna
                internal yaitu mahasiswa, dosen dan tenaga kependidikan serta kepada pihak pengguna
                eksternal yaitu lulusan, pengguna lulusan dan mitra kerjasama.
            </p>
            <p>
                Kenyamanan civitas akademika sebagai pengguna internal tentu saja tidak
                terlepas dari layanan yang disediakan oleh Universitas Negeri Gorontalo. Oleh karena
                itu, salah satu upaya untuk meningkatkan pelayanan adalah mengukur tingkat kepuasan
                pengguna internal yang terdiri dari dosen, tenaga kependidikan dan mahasiswa.
            </p>
            <p>
                Universitas Negeri Gorontalo merupakan kapal yang diciptakan untuk
                mengarungi peradaban manusia yang terus berkembang dan berubah. Oleh karena
                itu, agar keberadaannya terus memberi manfaat, Universitas Negeri Gorontalo terus
                melakukan perbaikan-perbaikan yang progresif dengan berlandaskan semangat
                Unggul dan Berdaya Saing.
            </p>
            <p>
                Salah satu cara yang dilakukan Universitas Negeri Gorontalo untuk terus
                melakukan perbaikan adalah dengan melakukan survei kepuasan pihak internal yaitu
                mahasiswa, dosen, dan tenaga kependidikan serta pengguna eksternal yaitu alumni,
                pengguna alumni dan mitra kerjasama. Tujuan pelaksanaan survei adalah untuk
                mengetahui tingkat kepuasan para pengguna internal dan eksternal tersebut dalam
                pelayanan yang sudah diberikan oleh Universitas Negeri Gorontalo. Laporan hasil survei
                menjadi bahan untuk merumuskan kebijakan-kebijakan ke depan yang lebih responsif
                terhadap kebutuhan. Hasil survei kepuasan internal dan eksternal ini juga menjadi
                pertanggungjawaban dan informasi terkait layanan Universitas Negeri Gorontalo.
            </p>
            <p>
                Hasil survei kepuasan pengguna internal dan eksternal menjadi dasar yang
                penting untuk pembenahan pelayanan yang dinilai masih kurang dan mempertahankan
                atau mengembangkan pelayanan yang sudah baik.
            </p>
        </div>

    </section>
    <section class="p-12 min-h-screen h-full flex flex-col gap-y-12">
        <div class="w-full flex flex-col gap-y-2">
            <P class="font-bold">
                B. TUJUAN KEGIATAN
            </P>
            <p>
                Laporan kegiatan survei {{ $survei->name }} bertujuan untuk: Mengetahui indeks
                kepuasan {{ $survei->target->name }} terhadap layanan yang diberikan oleh Universitas Negeri Gorontalo
            </p>
            <P class="font-bold">
                B. TUJUAN KEGIATAN
            </P>
            <p>
                Manfaat kegiatan ini adalah :
            <ul class="list-disc list-inside">
                <li>
                    Menjadi tolok ukur untuk menilai tingkat kualitas pelayanan yang sudah diberikan
                    oleh Universitas Negeri Gorontalo.
                </li>
                <li>
                    Menjadi bahan penilaian terhadap unsur pelayanan yang masih perlu dilakukan
                    perbaikan dan menjadi pendorong setiap unit penyelenggara pelayanan untuk
                    meningkatkan kualitas pelayanannya.
                </li>
            </ul>
            </p>

        </div>

    </section>
    <section class="p-12 min-h-screen h-full flex flex-col gap-y-12">
        <div class="font-bold text-center text-xl flex flex-col gap-y-12">
            <p>BAB II. METODE PENGUKURAN</p>
        </div>
        <div class="w-full flex flex-col gap-y-2">
            <P class="font-bold">
                A. RUANG LINGKUP
            </P>
            <p>
                Universitas Negeri Gorontalo memiliki {{ $fakultas->count() }} fakultas yaitu
                @foreach ($fakultas as $item)
                    {{ $item->name }} ({{ $item->code }}) ,
                @endforeach
                Sedangkan jumlah program studi terdapat {{ $prodi->count() }} program
                studi.
            </p>
            <P class="font-bold">
                A. OPERASIONAL VARIABEL
            </P>
            <p>
                Tingkat kepuasan terhadap layanan diukur dengan model SERVQUAL (Service Quality)
                yang terdiri dari lima dimensi yaitu Tangible, Reliability, Responsiveness, Assurance dan
                Empathy. Berikut dijelaskan definisi dari setiap dimensi kepuasan pada model SERVQUAL:
            </p>
            <p>
            <ol class="list-decimal list-inside">
                <li>
                    Tangibles: Dimensi yang tampak, misalnya fasilitas fisik, sarana prasarana,
                    perlengkapan, penampilan pegawai dan dosen.
                </li>
                <li>
                    Reliability: Dimensi mengenai kemampuan memberikan pelayanan yang dijanjikan
                    dengan baik, akurat dan konsisten.
                </li>
                <li>
                    Responsiveness: Dimensi mengenai kemauan dalam memberikan tanggapan
                    pelayanan dengan cepat dan tanggap.
                </li>
                <li>
                    Assurance: Dimensi mengenai kemampuan atas pengetahuan, kualitas
                    keramahtamahan, perhatian dan sikap.
                </li>
                <li>
                    Emphaty: Dimensi mengenai kemampuan untuk berkomunikasi dan usaha organisasi
                    untuk memahami keinginan dan kebutuhan pelangganya.
                </li>
            </ol>
            </p>
            <p>
                Indikator untuk setiap aspek dijelaskan pada tabel 1. Pada tabel 1, dijelaskan indicator, aitem
                pernyataan serta skala pengukurannya.
            </p>

        </div>
    </section>
    <section class="p-12 min-h-screen h-full flex flex-col gap-y-12">
        <div class="text-center text-sm flex flex-col gap-y-12">
            <table class="w-full">
                <thead class="font-bold">
                    <tr>
                        <th class="bg-gray-200 p-2 border border-gray-600">No.</th>
                        <th class="bg-gray-200 p-2 border border-gray-600">Aspek</th>
                        <th class="bg-gray-200 p-2 border border-gray-600">Indikator</th>
                        <th class="bg-gray-200 p-2 border border-gray-600">Item</th>
                        <th class="bg-gray-200 p-2 border border-gray-600">TP</th>
                        <th class="bg-gray-200 p-2 border border-gray-600">KP</th>
                        <th class="bg-gray-200 p-2 border border-gray-600">P</th>
                        <th class="bg-gray-200 p-2 border border-gray-600">SP</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <th class=" p-2 border border-gray-600" rowspan="2">1</th>
                        <th class=" p-2 border border-gray-600" rowspan="2">Tangible</th>
                        <th class=" p-2 border border-gray-600"></th>
                        <th class=" p-2 border border-gray-600"></th>
                        <th class=" p-2 border border-gray-600"></th>
                        <th class=" p-2 border border-gray-600"></th>
                        <th class=" p-2 border border-gray-600"></th>
                        <th class=" p-2 border border-gray-600"></th>
                    </tr>
                    <tr>

                        <th class=" p-2 border border-gray-600"></th>
                        <th class=" p-2 border border-gray-600"></th>
                        <th class=" p-2 border border-gray-600"></th>
                        <th class=" p-2 border border-gray-600"></th>
                        <th class=" p-2 border border-gray-600"></th>
                        <th class=" p-2 border border-gray-600"></th>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="w-full flex flex-col gap-y-2">
            <P class="">
                Pilihan jawaban untuk setiap pertanyaan menggunakan skala likert yaitu:
                TP=Tidak puas.; KP = Kuang Puas, P = Puas dan SP = Sangat Puas
            </P>
            <P class="font-bold">
                C. Tingkat Kepuasan
            </P>
            <p>
                Pengukuran indeks kepuasan civitas akademika mengacu kepada Pedoman Penyusunan
                Indeks Kepuasan Masyarakat (IKM) Kepmen PAN No.25 Tahun 2004. Nilai IKM dihitung
                dengan menggunakan nilai rata-rata tertimbang masing-masing unsur pelayanan, dimana
                masing - masing unsur pelayanan memiliki penimbang yang sama dengan rumus sebagai
                berikut:
            <div>
                <span class="italic">Bobot rata rata tertimbang</span>
                =
                <sup>Jumlah Bobot</sup>&frasl;<sub>Jumlah Unsur</sub>
            </div>
            </p>
            <p>
                Untuk memperoleh nilai IKM digunakan rumus berikut:
            <div>
                <span class="italic">IKM</span>
                =
                <sup>Total nilai persepsi unsur</sup>&frasl;<sub>Total unsur yang terisi</sub>
                x
                <span class="italic">Nilai Pengambang</span>

            </div>
            </p>
        </div>
    </section>
    <section class="p-12 min-h-screen h-full flex flex-col gap-y-12">
        <div class="w-full flex flex-col gap-y-2">
            <p>
                Untuk memudahkan interpretasi terhadap penilaian IKM yaitu antara 25 - 100 maka hasil
                penilaian tersebut diatas dikonversikan dengan nilai dasar 25, dengan rumus sebagai berikut:
            <div>
                <span class="italic">Konversi IKM</span>
                =
                <span class="italic">IKM X 25</span>

            </div>
            </p>
            <p>
                Kualitas/mutu dari kinerja pelayanan publik yang diselenggarakan oleh penyelenggara
                pelayanan publik dapat dilihat dari penilaian Indeks Kepuasan Masyarakat (IKM). Katagori
                Indeks Kepuasan Masyarakat (IKM) berdasarkan Keputusan Menteri Pendayagunaan
                Aparatur Negara nomor : KEP/25/M.PAN/2/2004 dapat dilihat pada tabel sebagai berikut :
            </p>
        </div>
        <div class="text-center text-sm flex flex-col gap-y-12">
            <table class="w-full">
                <thead class="font-bold">
                    <tr>
                        <th class="bg-gray-200 p-2 border border-gray-600">Nilai Persepsi</th>
                        <th class="bg-gray-200 p-2 border border-gray-600">Nilai Interval IKM</th>
                        <th class="bg-gray-200 p-2 border border-gray-600">Nilai Interval Koversi IKM</th>
                        <th class="bg-gray-200 p-2 border border-gray-600">Mutu Pelayanan</th>
                        <th class="bg-gray-200 p-2 border border-gray-600">Kinerja Unit Pelayanan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class=" p-2 border border-gray-600">1</th>
                        <th class=" p-2 border border-gray-600">1,00 – 1,75</th>
                        <th class=" p-2 border border-gray-600">1,00 – 1,75</th>
                        <th class=" p-2 border border-gray-600">D</th>
                        <th class=" p-2 border border-gray-600">Tidak Baik</th>

                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    <section class="p-12 min-h-screen h-full flex flex-col gap-y-12">
        <div class="font-bold text-center text-xl flex flex-col gap-y-12">
            <p>BAB III. HASIL KEGIATAN</p>
        </div>
        <div class="w-full flex flex-col gap-y-2">
            <p>
                Teknik pengambilan data pada survei indeks kepuasan dilakukan secara online di
                laman survei.penjamu.ung.ac.id yang dilakukan pada {{ $tanggalKegiatan }}. Jumlah responden yang
                mengisi survei kepuasan di
                {{ $selectedProdi->name }} sebanyak {{ $totalRespoondenProdi }} responden.
            </p>
            <P class="font-bold">
                A. Analisis Tingkat Kepuasan
            </P>
            <p>
                Berdasarkan hasil pengolaha data, tingkat kepuasan mahasiswa di Prodi {{ $selectedProdi->name }}
                disajikan pada
                gambar di bawah ini:
            </p>
            <div class=" mx-auto p-12">
                
                <div class="w-[4rem]" style="width: 42rem">
                    {!! $facultyComparisonChart->container() !!}
                </div>
            </div>
            <p>
                Hasil pengukuran tingkat kepuasan di dalam setiap aspek diuraikan berikut ini:
            </p>
            <table class="w-full">
                <thead class="font-bold">
                    <tr>
                        <th class="bg-gray-200 p-2 border border-gray-600">No</th>
                        <th class="bg-gray-200 p-2 border border-gray-600">Instrumen</th>
                        <th class="bg-gray-200 p-2 border border-gray-600">IKM</th>
                        <th class="bg-gray-200 p-2 border border-gray-600">Kinerja Unit Pelayanan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($survei->aspek as $index => $item)
                        <tr>
                            <th class=" p-2 border border-gray-600">{{ $index++ }}</th>
                            <th class=" p-2 border border-gray-600">{{ $item->name }}</th>
                            <th class=" p-2 border border-gray-600">{{ $detail_rekapitulasi_aspek[$item->id]['ikm'] }}
                            </th>
                            <th class=" p-2 border border-gray-600">
                                {{ $detail_rekapitulasi_aspek[$item->id]['kinerja_unit'] }}</th>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <p>
                menunjukan bahwa nilai IKM aspek
                @foreach ($survei->aspek as $item)
                    {{ $item->name }} = {{ $detail_rekapitulasi_aspek[$item->id]['ikm'] }}
                @endforeach
                . Mutu layanan semua aspek masuk ke adalam kategori B,
                artinya kinerja pelayanan di Universitas Negeri Gorontalo sudah BAIK.
            </p>
        </div>
    </section>
    <section class="p-12 min-h-screen h-full flex flex-col gap-y-12">

        <div class="w-full flex flex-col gap-y-2">
            @foreach ($survei->aspek as $item)
                <div>
                    <P class="font-bold">
                        {{ $item->name }}
                    </P>
                    <p>
                        Pada dimensi {{ $item->name }} terdiri dari {{ $item->indicator->count() }} item/pernyataan
                        yang terdistribusi
                        pada {{ $item->indicator->count() }} indikator. Setiap indikator terdiri dari beberapa aitem
                        yaitu:
                    </p>

                    <p>
                        Pada aspek tangible ini, diukur tingkat kepuasan untuk setiap aitem/pernyataan,
                        hasilnya disajikan pada tabel berikut:
                    </p>
                    <table class="w-full">
                        <thead class="font-bold">
                            <tr>
                                <th class="bg-gray-200 p-2 border border-gray-600">No</th>
                                <th class="bg-gray-200 p-2 border border-gray-600">Pernyataan</th>
                                <th class="bg-gray-200 p-2 border border-gray-600">IKM</th>
                                <th class="bg-gray-200 p-2 border border-gray-600">Mutu Layanan</th>
                                <th class="bg-gray-200 p-2 border border-gray-600">Kinerja Unit Pelayanan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                // Initialize variables to hold the lowest and highest IKM values and their corresponding indicators.
                                $lowestIKM = null;
                                $highestIKM = null;
                                $lowestIndi = null;
                                $highestIndi = null;
                            @endphp
                            @foreach ($item->indicator as $index => $indi)
                                <tr>
                                    <th class="p-2 border border-gray-600">{{ $index + 1 }}</th>
                                    <th class="p-2 border border-gray-600">{{ $indi->name }}</th>
                                    <th class="p-2 border border-gray-600">
                                        {{ $detail_rekapitulasi[$item->id][$indi->id]['ikm'] }}</th>
                                    <th class="p-2 border border-gray-600">
                                        {{ $detail_rekapitulasi[$item->id][$indi->id]['mutu_layanan'] }}</th>
                                    <th class="p-2 border border-gray-600">
                                        {{ $detail_rekapitulasi[$item->id][$indi->id]['kinerja_unit'] }}</th>
                                </tr>

                                @php
                                    // Capture the IKM values and track the lowest and highest.
                                    $ikmValue = $detail_rekapitulasi[$item->id][$indi->id]['ikm'];

                                    // Check if it's the first iteration or if it's the lowest/highest value found so far.
                                    if (is_null($lowestIKM) || $ikmValue < $lowestIKM) {
                                        $lowestIKM = $ikmValue;
                                        $lowestIndi = $indi->name;
                                    }
                                    if (is_null($highestIKM) || $ikmValue > $highestIKM) {
                                        $highestIKM = $ikmValue;
                                        $highestIndi = $indi->name;
                                    }
                                @endphp
                            @endforeach
                        </tbody>
                    </table>

                    <p>
                        Dapat diamati pada tabel diatas bahwa seluruh butir pernyataan pada aspek
                        Keandalan semua kinerja layanan masuk ke dalam kategori BAIK. Dari
                        {{ $item->indicator->count() }} butir
                        pernyataan, nilai IKM yang paling rendah adalah <strong>{{ $lowestIKM }}</strong>
                        ({{ $lowestIndi }}).
                        Sedangkan indikator yang memiliki
                        nilai IKM paling tinggi adalah pernyataan tentang <strong>{{ $highestIndi }}</strong>
                        ({{ $highestIKM }}).
                    </p>

                </div>
            @endforeach
        </div>
    </section>
    <section class="p-12 h-screen flex flex-col gap-y-12">
        <div class="font-bold text-center text-xl flex flex-col gap-y-12">
            <p>BAB IV. KESIMPULAN DAN TINDAK LANJUT</p>
        </div>
        <div class="w-full flex flex-col gap-y-2">
            <p>
                Berdasarkan analisis hasil pengukuran {{ $survei->name }} pada
                periode {{ $tahunAkademik }} masuk ke dalam kategori {{ $survei->target->name }} artinya
                {{ $survei->target->name }} masuk
                ke dalam kategori BAIK
            </p>
            <P>
                Selanjutnya, urutan {{ $survei->name }} untuk setiap butir/aitem pernyataan
                disajikan pada tabel di bawah ini
            </P>
            <table class="w-full">
                <thead class="font-bold">
                    <tr>
                        <th class="bg-gray-200 p-2 border border-gray-600">No</th>
                        <th class="bg-gray-200 p-2 border border-gray-600">Item Pernyataan</th>
                        <th class="bg-gray-200 p-2 border border-gray-600">Indeks</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($survei->aspek as $item)
                        @foreach ($item->indicator as $index => $indi)
                            <tr>
                                <th class="p-2 border border-gray-600">{{ $index + 1 }}</th>
                                <th class="p-2 border border-gray-600">{{ $indi->name }}</th>
                                <th class="p-2 border border-gray-600">
                                    {{ $detail_rekapitulasi[$item->id][$indi->id]['nilai_butir'] }}</th>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>

            @php
                // Initialize an array to store all indicator values and their names
                $indicatorValues = [];

                // Loop through the indicators to capture their 'nilai_butir' and indicator name
                foreach ($survei->aspek as $item) {
                    foreach ($item->indicator as $indi) {
                        $indicatorValues[] = [
                            'id' => $indi->id,
                            'name' => $indi->name,
                            'nilai_butir' => $detail_rekapitulasi[$item->id][$indi->id]['nilai_butir'],
                        ];
                    }
                }

                // Sort the array by 'nilai_butir' in ascending order
                usort($indicatorValues, function ($a, $b) {
                    return $a['nilai_butir'] <=> $b['nilai_butir'];
                });

                // Get the top 5 lowest values (if there are at least 5 values)
                $lowestIndicators = array_slice($indicatorValues, 0, 5);
            @endphp

            <p>
                Dapat diamati dari tabel di atas, lima (5) item atau butir pernyataan yang memiliki
                nilai yang paling rendah yaitu:
            </p>
            <ul class="list-decimal list-inside">
                @foreach ($lowestIndicators as $key => $indicator)
                    <li>
                        {{ $indicator['name'] }} ({{ $indicator['nilai_butir'] }})
                    </li>
                @endforeach
            </ul>

            <p>
                Faktor-faktor atau akar permasalahan yang menyebabkan indeks kepuasan
                mahasiswa masih rendah yaitu:
            </p>
            <ul class="list-decimal list-inside">
                @foreach ($lowestIndicators as $indicator)
                    @php
                        // Fetch temuan related to the current indicator using its ID and prodi_id
                        $temuanCollection = App\Models\Temuan::where('indikator_id', $indicator['id'])
                            ->where('prodi_id', $selectedProdi->id)
                            ->get();
                    @endphp

                    @if ($temuanCollection->count() > 0)
                        <li>
                            @foreach ($temuanCollection as $temuan)
                                {{ $temuan->temuan . ', ' }}
                            @endforeach
                        </li>
                    @else
                        <li>Belum ada temuan untuk indikator ini.</li>
                    @endif
                @endforeach
            </ul>

            <p>
                Rencana tindak lanjutnya yaitu:
            </p>
            <ul class="list-decimal list-inside">
                @foreach ($lowestIndicators as $indicator)
                    @php
                        // Fetch temuan related to the current indicator using its ID and prodi_id
                        $temuanCollection = App\Models\Temuan::where('indikator_id', $indicator['id'])
                            ->where('prodi_id', $selectedProdi->id)
                            ->get();
                    @endphp

                    @if ($temuanCollection->count() > 0)
                        <li>
                            @foreach ($temuanCollection as $temuan)
                                {{ $temuan->solusi . ', ' }}
                            @endforeach
                        </li>
                    @else
                        <li>Belum ada solusi untuk indikator ini.</li>
                    @endif
                @endforeach
            </ul>

        </div>
    </section>
    @push('scripts')
    <script src="{{ $facultyComparisonChart->cdn() }}"></script>
    {{ $facultyComparisonChart->script() }}
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            window.print();
        });
    </script>
@endpush
</main>
