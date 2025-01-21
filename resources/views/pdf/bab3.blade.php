<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BAB III - Laporan Survei </title>
    <style>
        @page {
            margin-top: 2cm;
            margin-bottom: 2cm;
            margin-left: 2cm;
            margin-right: 2cm;
        }

        body {
            font-family: 'Helvetica', sans-serif;
            margin: 0;
        }

        * {
            font-size: 12;
        }

        .heading-1 {
            text-align: center;
        }

        .heading-2 {
            margin-bottom: 0;
        }

        .kop {
            border-bottom: 1px solid black;
        }

        .audit-detail {
            margin: 0 auto;
            margin-bottom: 20px;
        }

        .audit-detail th,
        .audit-detail td {
            text-align: left;
            vertical-align: top;
        }

        .audit-detail th {
            padding-right: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #000;
            padding: 8px;
        }

        .table th {
            text-align: center;
            vertical-align: middle;
        }

        .table td {
            text-align: left;
            vertical-align: top;
        }

        .paragraf {
            text-align: justify;
            text-indent: 25px;
            line-height: 2em;
        }

        .number-list {
            list-style-type: decimal;
            margin-left: 25px;
            padding: 0px;
            line-height: 2em;
        }

        .number-list li {
            text-align: justify;
        }

        .ttd {
            width: 100%;
        }

        .ttd td {
            width: 33.33%;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th,
        table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
            vertical-align: middle;
        }

        table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
    </style>
 
</head>

<body>
    <h5 class="heading-1">
        BAB III <br> <br>
        HASIL KEGIATAN
    </h5>
    <p class="paragraf">
        Teknik pengambilan data pada survei indeks kepuasan dilakukan secara online di
        laman survei.penjamu.ung.ac.id yang dilakukan pada {{ $tanggalKegiatan }}. Jumlah responden yang
        mengisi survei kepuasan di
        {{ $tingkat }} sebanyak {{ $totalRespoondenProdi }} responden.
    </p>
    <h6>
        A. Analisis Tingkat Kepuasan
    </h6>
    <p class="paragraf">
        Berdasarkan hasil pengolaha data, tingkat kepuasan mahasiswa di {{ $tingkat  }} disajikan pada
        gambar di bawah ini:
    </p>
    <div class="w-[4rem]" style="width: 42rem">
        {!! $facultyComparisonChart->container() !!}
    </div>
    <p class="paragraf">
        Hasil pengukuran tingkat kepuasan di dalam setiap aspek diuraikan berikut ini:
    </p>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Instrumen</th>
                <th>IKM</th>
                <th>Kinerja Unit Pelayanan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($survei->aspek as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $detail_rekapitulasi_aspek[$item->id]['ikm'] }}</td>
                    <td>{{ $detail_rekapitulasi_aspek[$item->id]['kinerja_unit'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <ul style="list-style: disc">
        @foreach ($survei->aspek as $item)
            <li>
                {{ $item->name }}
                <p class="paragraf">
                    Pada dimensi {{ $item->name }} terdiri dari {{ $item->indicator->count() }} item/pernyataan
                    yang terdistribusi
                    pada {{ $item->indicator->count() }} indikator. Setiap indikator terdiri dari beberapa aitem
                    yaitu:
                    Pada aspek tangible ini, diukur tingkat kepuasan untuk setiap aitem/pernyataan, hasilnya disajikan
                    pada
                    tabel berikut:

                </p>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pernyataan</th>
                            <th>IKM</th>
                            <th>Mutu layanan</th>
                            <th>Unit Kinerja Pelayanan</th>
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
                                <td class="p-2 border border-gray-600">{{ $index + 1 }}</td>
                                <td class="p-2 border border-gray-600">{{ $indi->name }}</td>
                                <td class="p-2 border border-gray-600">
                                    {{ $detail_rekapitulasi[$item->id][$indi->id]['ikm'] }}</td>
                                <td class="p-2 border border-gray-600">
                                    {{ $detail_rekapitulasi[$item->id][$indi->id]['mutu_layanan'] }}</td>
                                <td class="p-2 border border-gray-600">
                                    {{ $detail_rekapitulasi[$item->id][$indi->id]['kinerja_unit'] }}</td>
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
                <p class="paragraf">
                    Dapat diamati pada tabel diatas bahwa seluruh butir pernyataan pada aspek
                    Keandalan semua kinerja layanan masuk ke dalam kategori BAIK. Dari
                    {{ $item->indicator->count() }} butir
                    pernyataan, nilai IKM yang paling rendah adalah <strong>{{ $lowestIKM }}</strong>
                    ({{ $lowestIndi }}).
                    Sedangkan indikator yang memiliki
                    nilai IKM paling tinggi adalah pernyataan tentang <strong>{{ $highestIndi }}</strong>
                    ({{ $highestIKM }}).
                </p>
            </li>
        @endforeach
    </ul>
    <script src="{{ $facultyComparisonChart->cdn() }}"></script>
    {{ $facultyComparisonChart->script() }}
</body>



</html>
