<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kata Pengantar - Laporan Survei </title>
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
    </style>
</head>

<body>
    <h5 class="heading-1">
        KATA PENGANTAR
    </h5>
    <p class="paragraf" style="font-style: italic">
        Assalamualaikum wr. wb.
    </p>
    <p class="paragraf">
        Segala puji dan syukur senantiasa dipanjatkan kehadirat Allah SWT., karena berkat rahmat dan hidayahNya maka
        LAPORAN SURVEI KEPUASAN DOSEN dapat diselesaikan.
    </p>
    <p class="paragraf">
        Salah satu kata kunci kesuksesan pengelolaan lembaga atau organisasi adalah satisfaction (kepuasan) para
        pengguna. Tingkat kepuasan layanan mengukur respon pelanggan terhadap terhadap evaluasi kesesuaian atau
        ketidaksesuaian yang dirasakan antara harapan tentang kinerja dengan kinerja aktual produk yang dirasakan
        setelah pemakaiannya
    </p>
    <p class="paragraf">
        Laporan hasil survei kepuasan menjadi acuan Universitas/Fakultas dan Program Studi untuk berbenah dan menjadi
        barometer untuk meningkatkan kinerja di masa yang akan datang. Akhirnya, kepada tim dan semua pihak yang
        terlibat dalam pelaksanaan survei ini dihaturkan terima kasih yang sebenar – benarnya.
    </p>
    <p class="paragraf" style="font-style: italic">
        Wassalammualaikum
    </p>
    <table style="width: 100%;">
        <tbody>
            <tr style="width: 50%;">
                <td style="width: 50%;">Mengetahui</td>
                <td style="width: 50%;">Penanggung Jawab</td>
            </tr>

            <tr style="width: 50%;">
                <td style="width: 50%;">{{$jabatan_mengetahui}}</td>
                <td style="width: 50%;">{{$jabatan_penanggung_jawab}}</td>
            </tr>
            <tr style="width: 50%;">
                <td style="padding: 3rem 0; width: 50%;"></td>
                <td style="padding: 3rem 0; width: 50%;"></td>
            </tr>
            <tr style="width: 50%;">
                <td style="width: 50%;">{{ $nama_mengetahui }}</td>
                <td style="width: 50%;">{{ $nama_penanggung_jawab }}</td>
            </tr>
            <tr style="width: 50%;">
                <td style="width: 50%;">{{ $nip_mengetahui }}</td>
                <td style="width: 50%;">{{ $nip_penanggung_jawab }}</td>
            </tr>
        </tbody>
    </table>

</body>

</html>
