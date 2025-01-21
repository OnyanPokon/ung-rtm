<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- jakarta sans --}}
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">

    {{-- alpine JS --}}
    {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}

    {{-- datatables.net --}}
    <link href="{{ asset('/DataTables/datatables.css') }}" rel="stylesheet">
    <Link href="{{asset('/template.css')}}"></Link>

    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}"></script> --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    @livewireStyles

    <title>{{ $title ?? 'Page Title' }}</title>
    @stack('styles')
</head>

<body>
    @if (isset($showNavbar) && $showNavbar)
        <livewire:navbar />
    @endif
    {{ $slot }}
    @if (isset($showFooter) && $showFooter)
        <livewire:footer />
    @endif

    @stack('scripts')
    <script src="{{ asset('/DataTables/datatables.js') }}"></script>
    @livewireScripts
</body>


</html>
