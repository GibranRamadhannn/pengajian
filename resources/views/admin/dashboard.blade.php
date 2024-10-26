<!-- Extending Layouts.app -->
@extends('layouts.app')

<!-- Title Page -->
@section('title', 'Panitia')

@section('content')
<div class="flex flex-col min-h-screen pt-24">
    <!-- Add pt-24 to offset for fixed header -->
    <!-- Main content container with flex-grow -->
    <main class="flex-grow max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        @include('admin.data-participants')
    </main>

    <!-- Section footer begin -->
    <footer class="bg-gray-800">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <p class="text-center text-white">© {{ date('Y') }} Your Company. All rights reserved.</p>
        </div>
    </footer>
    <!-- Section footer end -->
</div>
@endsection