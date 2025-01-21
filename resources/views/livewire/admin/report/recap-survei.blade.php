<main>
    <style>
        main {
            padding: 4px;
        }

        section.header {
            width: 100%;
            padding: 8px;
            font-weight: 700;
            background: #CAF1FC;
            text-align: center
        }

        section.header p {
            font-size: 12px;
        }

        section.content {
            width: 100%;
        }

        table {
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        thead {
            background: lightgray;
        }

        thead th {
            font-size: 12px;
        }

        tbody tr.indikator td {
            font-size: 12px;
            text-align: center;
        }

        tbody tr.aspek td {
            background: lightgray;
            font-size: 12px;
            font-weight: 700;
            text-align: left;
        }

        tbody tr.hasil {
            font-size: 12px;
            font-weight: 700;
            text-align: center;
        }

        section.footer {
            font-size: 12px;
            width: 100%;
            margin-top: 12px
        }

        section.footer thead tr th {
            text-align: left;
        }

        section.footer thead tr.header th {
            text-align: center;
        }
    </style>
    <section class="header">
        <p>SURVEY KEPUASAN TENAGA KEPENDIDIKAN</p>
        <p>UNIVERSITAS NEGERI GORONTALO</p>
        <p>TAHUN 2023</p>
        <p>LEVEL UNIVERSITAS</p>
    </section>
    <section class="content">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pertanyaan</th>
                    <th>Sangat Tidak Memuaskan</th>
                    <th>Tidak Memuaskan</th>
                    <th>Cukup Memuaskan</th>
                    <th>Memuaskan</th>
                    <th>Sangat Memuaskan</th>
                    <th>Total Responden</th>
                    <th>Nilai Butir</th>
                    <th>IKM</th>
                    <th>Mutu Layanan</th>
                    <th>Kinerja Unit Pelayanan</th>
                    <th>Tingkat Kepuasan</th>
                    <th>Predikat Kepuasan</th>
                </tr>
            </thead>
            <tbody>
                {{-- foraech start here --}}
                <tr class="aspek">
                    <td colspan="14">
                        Layanan Manajemen
                    </td>
                </tr>
                <tr class="indikator">
                    <td>
                        1
                    </td>
                    <td>
                        Kemudahan dalam mendapatkan informasi dalam menunjang kegiatan sesuai dengan uraian jabatan
                        serta tugas pokok dan fungsi. (Aspek Tangibles)
                    </td>
                    <td>
                        0
                    </td>
                    <td>
                        0
                    </td>
                    <td>
                        7
                    </td>
                    <td>
                        47
                    </td>
                    <td>
                        23
                    </td>
                    <td>
                        77
                    </td>
                    <td>
                        3.208
                    </td>
                    <td>
                        80.19
                    </td>
                    <td>
                        B
                    </td>
                    <td>
                        Baik
                    </td>
                    <td>
                        85%
                    </td>
                    <td>
                        Sangat Puas
                    </td>
                </tr>
                <tr class="hasil">
                    <td colspan="2">
                        Total Rerata Penilaian Aspek
                    </td>
                    <td>
                        0
                    </td>
                    <td>
                        0
                    </td>
                    <td>
                        7
                    </td>
                    <td>
                        47
                    </td>
                    <td>
                        23
                    </td>
                    <td>
                        77
                    </td>
                    <td>
                        3.208
                    </td>
                    <td>
                        80.19
                    </td>
                    <td>
                        B
                    </td>
                    <td>
                        Baik
                    </td>
                    <td>
                        85%
                    </td>
                    <td>
                        Sangat Puas
                    </td>
                </tr>

            </tbody>
        </table>
    </section>
    <section class="footer">
        <table style="margin-bottom: 12px;">
            <thead>
                <tr>
                    <th colspan="8">Rekapitulasi Akhir Rerata Tiap Dimensi</th>
                </tr>
                <tr class="header">
                    <th>No</th>
                    <th>Instrumen</th>
                    <th>Sangat Tidak Memuaskan</th>
                    <th>Tidak Memuaskan</th>
                    <th>Cukup Memuaskan</th>
                    <th>Memuaskan</th>
                    <th>Sangat Memuaskan</th>
                    <th>Total Responden</th>
                </tr>
            </thead>
            <tbody style="font-weight: normal;">
                <tr>
                    <th>1</th>
                    <th>Layanan Manajemen</th>
                    <th>0</th>
                    <th>1</th>
                    <th>0</th>
                    <th>12</th>
                    <th>42</th>
                    <th>23</th>
                </tr>
            </tbody>
        </table>
        <table style="margin-bottom: 12px;">
            <thead>
                <tr>
                    <th colspan="8">Rekapitulasi Akhir Persentase Tiap Dimensi</th>
                </tr>
                <tr class="header">
                    <th>No</th>
                    <th>Instrumen</th>
                    <th>Sangat Tidak Memuaskan</th>
                    <th>Tidak Memuaskan</th>
                    <th>Cukup Memuaskan</th>
                    <th>Memuaskan</th>
                    <th>Sangat Memuaskan</th>
                    <th>Total Responden</th>
                </tr>
            </thead>
            <tbody style="font-weight: normal;">
                <tr>
                    <th>1</th>
                    <th>Layanan Manajemen</th>
                    <th>0</th>
                    <th>1</th>
                    <th>0</th>
                    <th>12</th>
                    <th>42</th>
                    <th>23</th>
                </tr>
            </tbody>
        </table>
        <table style="margin-bottom: 12px;">
            <thead>
                <tr>
                    <th colspan="8">Rekapitulasi Akhir Tingkat Kepuasan Tiap Dimensi</th>
                </tr>
                <tr class="header">
                    <th>No</th>
                    <th>Instrumen</th>
                    <th>Tingkat Kepuasan</th>
                    <th>Predikat</th>
                </tr>
            </thead>
            <tbody>
                <tr style="font-weight: 300">
                    <th style="font-weight: 500">1</th>
                    <th style="font-weight: 500">Layanan Manajemen</th>
                    <th style="font-weight: 500">0</th>
                    <th style="font-weight: 500">Sangat Puas</th>
                </tr>
                <tr>
                    <th colspan="2">Tingkat Kepuasan Tenaga Pendidik</th>
                    <th>0</th>
                    <th>Sangat Puas</th>
                </tr>
            </tbody>
        </table>
        <table style="margin-bottom: 12px;">
            <thead>
                <tr>
                    <th colspan="8">Konversi Nilai Mutu Layanan</th>
                </tr>
                <tr class="header">
                    <th>Batas Bawah</th>
                    <th>Rentang Nilai</th>
                    <th>Mutu Pelayanan</th>
                </tr>
            </thead>
            <tbody>
                <tr style="font-weight: 300">
                    <th style="font-weight: 500">1</th>
                    <th style="font-weight: 500">Layanan Manajemen</th>
                    <th style="font-weight: 500">0</th>
                </tr>
            </tbody>
        </table>
        <table style="margin-bottom: 12px;">
            <thead>
                <tr>
                    <th colspan="8">Konversi Nilai Kinerja Unit Pelayanan Berdasarkan IKM PERMENPANRB</th>
                </tr>
                <tr class="header">
                    <th>Batas Bawah</th>
                    <th>Rentang Nilai</th>
                    <th>Kinerja Unit Pelayanan</th>
                </tr>
            </thead>
            <tbody>
                <tr style="font-weight: 300">
                    <th style="font-weight: 500">1</th>
                    <th style="font-weight: 500">Layanan Manajemen</th>
                    <th style="font-weight: 500">0</th>
                </tr>
            </tbody>
        </table>
        <table style="margin-bottom: 12px;">
            <thead>
                <tr>
                    <th colspan="8">Konversi Nilai Tingkat Kepuasan Berdasarkan Rubrik Kepuasan BAN-PT</th>
                </tr>
                <tr class="header">
                    <th>Batas Bawah</th>
                    <th>Rentang Nilai</th>
                    <th>Tingkat Kepuasan</th>
                </tr>
            </thead>
            <tbody>
                <tr style="font-weight: 300">
                    <th style="font-weight: 500">1</th>
                    <th style="font-weight: 500">Layanan Manajemen</th>
                    <th style="font-weight: 500">0</th>
                </tr>
            </tbody>
        </table>
    </section>
</main>