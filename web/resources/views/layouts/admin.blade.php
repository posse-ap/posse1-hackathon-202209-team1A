<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ mix('js/main.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <div class="text-sm relative min-h-screen pb-80">

        <!-- Page Heading -->
        @include('components.header')
        @include('components.admin-navigation')

        <!-- Page Content -->
        <main class="px-8 sm:px-12 lg:px-24">
            {{ $slot }}
        </main>

        <!-- Page Footer -->
        @include('components.footer')
    </div>
</body>

</html>
