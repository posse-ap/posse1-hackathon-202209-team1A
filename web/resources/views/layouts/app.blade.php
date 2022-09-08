@props([
    'keyword',
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">

        <!-- Scripts -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

    </head>
    <body class="font-sans antialiased">
        <div class="text-sm relative">

            <!-- Page Heading -->
            @if(isset($keyword))
                @include('components.header', ["keyword", $keyword])
            @else
                @include('components.header')
            @endif

            <!-- Page Content -->
            <main class="h-full">
                {{ $slot }}
            </main>

            <!-- Page Footer -->
            @include('components.footer')
        </div>
    </body>
    <script src="{{ asset('js/modal.js') }}"></script>
@push('scripts_bottom')
    <script>
        let target = document.getElementById('scroll-inner');
        target.scrollIntoView(false)

        function dropdownOpen() {
            let dropdown = document.getElementById('dropdown');
            // dropdown.classList.toggle('block');
            if (dropdown.style.display == "block") {
                // noneで非表示
                dropdown.style.display = "none";
            } else {
                // blockで表示
                dropdown.style.display = "block";
            }
        }
    </script>
@endpush
</html>
