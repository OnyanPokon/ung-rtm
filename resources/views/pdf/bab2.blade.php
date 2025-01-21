<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BAB II - Laporan Survei </title>
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
        BAB II <br> <br>
        METODE PENGUKURAN
    </h5>
    <h6>
        A. Ruang Lingkup
    </h6>
    <p class="paragraf">
        Universitas Negeri Gorontalo memiliki {{ $fakultas->count() }} fakultas yaitu
        @foreach ($fakultas as $item)
            {{ $item->name }} ({{ $item->code }}) ,
        @endforeach
        Sedangkan jumlah program studi terdapat {{ $prodi->count() }} program
        studi.
    </p>
    <h6>
        B. Operasional Variabel
    </h6>
    <p class="paragraf">
        Tingkat kepuasan terhadap layanan diukur dengan model SERVQUAL (Service Quality) yang terdiri dari lima dimensi
        yaitu Tangible, Reliability, Responsiveness, Assurance dan Empathy. Berikut dijelaskan definisi dari setiap
        dimensi kepuasan pada model SERVQUAL:
    <ol class="paragraf">
        <li class="paragraf">Tangibles: Dimensi yang tampak, misalnya fasilitas fisik, sarana prasarana, perlengkapan, penampilan
            pegawai dan dosen. </li>
        <li class="paragraf">Reliability: Dimensi mengenai kemauan dalam memberikan tanggapan pelayanan dengan cepat dan tanggap. </li>
        <li class="paragraf">Responsiveness: Dimensi mengenai kemauan dalam memberikan tanggapan pelayanan dengan cepat dan tanggap.
        </li>
        <li class="paragraf">Assurance: Dimensi mengenai kemampuan atas pengetahuan, kualitas keramahtamahan, perhatian dan sikap. </li>
        <li class="paragraf">Emphaty: Dimensi mengenai kemampuan untuk berkomunikasi dan usaha organisasi untuk memahami keinginan dan
            kebutuhan pelangganya.</li>
    </ol>
    </p>
    <p class="paragraf">
        Indikator untuk setiap aspek dijelaskan pada tabel 1. Pada tabel 1, dijelaskan indicator, aitem pernyataan serta
        skala pengukurannya.
    </p>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Aspek</th>
                <th>Indikator</th>
                <th>Item</th>
                <th>TP</th>
                <th>KP</th>
                <th>P</th>
                <th>SP</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td rowspan="2">1</td>
                <td rowspan="2">Tangible</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td rowspan="2">2</td>
                <td rowspan="2">Reliability</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td rowspan="2">3</td>
                <td rowspan="2">Responsiveness</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td rowspan="2">4</td>
                <td rowspan="2">Assurance</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td rowspan="2">5</td>
                <td rowspan="2">Empathy</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <p class="paragraf">
        Pilihan jawaban untuk setiap pertanyaan menggunakan skala likert yaitu:
        TP=Tidak puas.; KP = Kuang Puas, P = Puas dan SP = Sangat Puas
    </p>
    <h6>
        C. Tingkat Kepuasan
    </h6>
    <p class="paragraf">
        Pengukuran indeks kepuasan civitas akademika mengacu kepada Pedoman Penyusunan Indeks Kepuasan Masyarakat (IKM)
        Kepmen PAN No.25 Tahun 2004. Nilai IKM dihitung dengan menggunakan nilai rata-rata tertimbang masing-masing
        unsur pelayanan, dimana masing - masing unsur pelayanan memiliki penimbang yang sama dengan rumus sebagai
        berikut:
    </p>
    <img src="{{ public_path('rumusbab2.png') }}" alt="rumus 1">
    <p class="paragraf">
        Untuk memperoleh nilai IKM digunakan rumus berikut:
    </p>
    <img src="{{ public_path('rumusbab2(2).png') }}" alt="rumus 2">
    <p class="paragraf">
        Untuk memudahkan interpretasi terhadap penilaian IKM yaitu antara 25 - 100 maka hasil penilaian tersebut diatas
        dikonversikan dengan nilai dasar 25, dengan rumus sebagai berikut:
    </p>
    <img src="{{ public_path('rumusbab2(3).png') }}" alt="rumus 3">
    <p class="paragraf">
        Kualitas/mutu dari kinerja pelayanan publik yang diselenggarakan oleh penyelenggara pelayanan publik dapat
        dilihat dari penilaian Indeks Kepuasan Masyarakat (IKM). Katagori Indeks Kepuasan Masyarakat (IKM) berdasarkan
        Keputusan Menteri Pendayagunaan Aparatur Negara nomor : KEP/25/M.PAN/2/2004 dapat dilihat pada tabel sebagai
        berikut :
    </p>
    <table>
        <thead>
            <tr>
                <th>Nilai Persepsi</th>
                <th>Nilai Interval IKM</th>
                <th>Nilai Interval Konversi IKM</th>
                <th>Mutu Pelayanan</th>
                <th>Kinerja Unit Pelayanan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>1,00 – 1,75</td>
                <td>1,00 – 1,75</td>
                <td>D</td>
                <td>Tidak Baik</td>
            </tr>
            <tr>
                <td>2</td>
                <td>1,76 – 2,50</td>
                <td>43,76 – 62,50</td>
                <td>C</td>
                <td>Kurang Baik</td>
            </tr>
            <tr>
                <td>3</td>
                <td>2,51 – 3,25</td>
                <td>62,51 – 81,25</td>
                <td>B</td>
                <td>Baik</td>
            </tr>
            <tr>
                <td>4</td>
                <td>3,26 – 4,00</td>
                <td>81,26 – 100,00</td>
                <td>A</td>
                <td>Sangat Baik</td>
            </tr>
        </tbody>
    </table>
</body>

</html>
