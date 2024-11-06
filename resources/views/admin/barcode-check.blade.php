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
    <style>
        #participant-table-one {
    border-collapse: separate;
    border-spacing: 1px; /* cellspacing */
}

#participant-table-one td{
    border: 1px solid black; /* border */
    padding: 5px; /* cellpadding */
    text-transform: uppercase;
}
    </style>
</head>

<body class="font-sans antialiased">
    <!-- Code begin -->
    <div class="min-h-screen bg-white">
        @include('layouts.navigation')
        <!-- Page Heading -->
        @yield('header')
        <!-- Page Content -->
        <main>
            <div class="container mx-auto p-6 rounded-lg shadow-lg bg-white">
    <!-- Title -->
    <h1 class="text-3xl font-bold text-black mb-6">Participant</h1>
    <!-- Table Code begin -->
    <div class="rounded-lg shadow-lg p-4">
        <div class="grid justify-items-center mb-5">
            <label for="Input barcode">Scan Barcode</label>
            <input type="text" id="scan-barcode" name="barcode_scan">
        </div>
        <table class="min-w-full divide-y divide-gray-200 bg-white border border-gray-200 overflow-x-auto "
            id="participant-table-one">
            <!-- Table Head begin -->
            <thead class="bg-[#F4F6FF] text-black" border="1" cellspacing="1" cellpadding="5">
                <!-- Table Row Head begin -->
                <tr>
                    <!-- Row Head Items begin -->
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gender
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Class
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Barcode
                        Check In</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action
                    </th>
                    <!-- Row Head Items end -->
                </tr>
                <!-- Table Row Head end -->
            </thead>
            <!-- Table Head end -->
            <!-- Table Body begin -->
           <tbody border="1" cellspacing="1" cellpadding="5">

           </tbody>
            <!-- Table Body End -->
        </table>
    </div>
    <!-- Table Code end -->
</div>
        </main>
        <!-- Page Footer -->
        @yield('footer')
    </div>
    <!-- Code end -->

    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</body>

</html>