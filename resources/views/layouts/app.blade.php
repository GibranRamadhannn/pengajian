<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- csrf-token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- web title -->
    <title>Daftar Dauroh - @yield('title', "Ibnu'Abbas")</title>
    <!-- Fonts Library -->
    <link href="https://fonts.cdnfonts.com/css/breathing-personal-use" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.3/dist/cdn.min.js"></script>
</head>

<body class="font-sans antialiased">
    <!-- Code begin -->
    <div class="min-h-screen bg-white">
        @include('layouts.navigation')
        <!-- Page Heading -->
        @yield('header')
        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
        <!-- Page Footer -->
        @yield('footer')
    </div>
    <!-- Code end -->

    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</body>

</html>