<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BAB IV - Laporan Survei </title>
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
        BAB IV <br> <br>
        KESIMPULAN DAN TINDAK LANJUT
    </h5>
    <p class="paragraf">
        Berdasarkan analisis hasil pengukuran {{ $survei->name }} pada
        periode {{ $tahunAkademik }} masuk ke dalam kategori {{ $survei->target->name }} artinya
        {{ $survei->target->name }} masuk
        ke dalam kategori BAIK
        Selanjutnya, urutan indeks kepuasan {{ $survei->name }} untuk setiap butir/aitem pernyataan disajikan pada tabel
        di bawah
        ini:
    </p>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Aitem Pernyataan</th>
                <th>Indeks</th>
                {{-- <th>Predikat</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($survei->aspek as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $detail_rekapitulasi_aspek[$item->id]['ikm'] }}</td>
                    {{-- <td>{{ $detail_rekapitulasi_aspek[$item->id]['kinerja_unit'] }}</td> --}}
                </tr>
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
    <ul class="list-decimal list-inside paragraf">
        @foreach ($lowestIndicators as $key => $indicator)
            <li class="paragraf">
                {{ $indicator['name'] }} ({{ $indicator['nilai_butir'] }})
            </li>
        @endforeach
    </ul>

    <p>
        Faktor-faktor atau akar permasalahan yang menyebabkan indeks kepuasan
        mahasiswa masih rendah yaitu:
    </p>
    <ul class="list-decimal list-inside paragraf">
        @foreach ($lowestIndicators as $indicator)
            @php
                // Fetch temuan related to the current indicator using its ID and prodi_id
              
                if (Auth::user()->role->slug == 'prodi') {
                    $temuanCollection = App\Models\Temuan::where('indikator_id', $indicator['id'])
                    ->where('prodi_id', Auth::user()->prodi_id)
                    ->get();

                } elseif (Auth::user()->role->slug == 'fakultas') {
                    $prodiIds = App\Models\Prodi::where('fakultas_id', Auth::user()->fakultas_id)->pluck('id');
                    $temuanCollection = App\Models\Temuan::where('indikator_id', $indicator['id'])
                    ->whereIn('prodi_id', $prodiIds)
                    ->get();

                }
                else {
                    $temuanCollection = App\Models\Temuan::where('indikator_id', $indicator['id'])
                    ->get();
                }

            @endphp

            @if ($temuanCollection->count() > 0)
                <li class="pargraf">
                    @foreach ($temuanCollection as $temuan)
                        {{ $temuan->temuan . ', ' }}
                    @endforeach
                </li>
            @else
                <li class="paragraf">Belum ada temuan untuk indikator ini.</li>
            @endif
        @endforeach
    </ul>

    <p>
        Rencana tindak lanjutnya yaitu:
    </p>
    <ul class="list-decimal list-inside paragraf">
        @foreach ($lowestIndicators as $indicator)
            @php
                if (Auth::user()->role->slug == 'prodi') {
                    $temuanCollection = App\Models\Temuan::where('indikator_id', $indicator['id'])
                    ->where('prodi_id', Auth::user()->prodi_id)
                    ->get();

                } elseif (Auth::user()->role->slug == 'fakultas') {
                    $prodiIds = App\Models\Prodi::where('fakultas_id', Auth::user()->fakultas_id)->pluck('id');
                    $temuanCollection = App\Models\Temuan::where('indikator_id', $indicator['id'])
                    ->whereIn('prodi_id', $prodiIds)
                    ->get();

                }
                else {
                    $temuanCollection = App\Models\Temuan::where('indikator_id', $indicator['id'])
                    ->get();
                }
            @endphp

            @if ($temuanCollection->count() > 0)
                <li class="paragraf">
                    @foreach ($temuanCollection as $temuan)
                        {{ $temuan->solusi . ', ' }}
                    @endforeach
                </li>
            @else
                <li class="paragraf">Belum ada solusi untuk indikator ini.</li>
            @endif
        @endforeach
    </ul>

</body>

</html>
