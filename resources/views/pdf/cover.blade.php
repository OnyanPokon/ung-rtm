<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cover - Laporan Survei</title>
    <style>
        @page {
            margin: 2cm;
        }

        body {
            font-family: 'Helvetica', sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100vh;
        }

        .container img {
            width: 150px;
            margin: 6rem 0;
        }

        .title {
            font-size: 24px;
            font-weight: 700;
            color: #333;
            text-transform: uppercase;
        }

        .subtitle {
            font-size: 24px;
            font-weight: 700;
            color: #333;
        }

        .subtitle-wrapper {
            margin-top: 120px;
        }

        img {
            width: 6rem;
            margin-top: 120px
        }
    </style>
</head>

<body>
    <div class="container" style="display: flex; justify-content: space-between; height: 100%;">
        <div class="title-wrapper">
            <div class="title">LAPORAN {{ $survei->name }}</div>
            @if ($user->role->slug === 'fakultas')
                <div class="title">{{ $user->fakultas->name}}</div>
            @endif
            @if ($user->role->slug === 'prodi')
                <div class="title">FAKULTAS {{ $user->fakultas->name}}</div>
                <div class="title">PRODI {{ $user->prodi->name}}</div>
            @endif
            <div class="title">UNIVERSITAS NEGERI GORONTALO</div>
            <div class="title">Tahun {{ $tahunAkademik }}</div>
        </div>
        <img class="logo" src="{{ public_path('logo/ung.png') }}" alt="Logo Universitas">
        <div class="subtitle-wrapper">
            <div class="subtitle">
                LEMBAGA PENJAMINAN MUTU
            </div>
            <div class="subtitle">
                DAN PENGEMBANGAN PEMBELAJARAN
            </div>
            <div class="subtitle">
                UNIVERSITAS NEGERI GORONTALO
            </div>
            <div class="subtitle">
                {{ $tahunAkademik }}
            </div>
        </div>
    </div>
</body>

</html>
