<!-- Extending layout -->
@extends('layouts.guest-index')

<!-- Section Background Image -->
@section('background_image', '/images/bg-new-gs.jpeg')

<!-- Section Title -->
@section('title','Quota Full')

<!-- Section Content begin -->
@section('content')
<div class="flex flex-col justify-center items-center md:justify-start">
    <div class="mx-auto max-w-6xl p-4 sm:px-6 sm:py-10 lg:px-8 mb-5 text-center">
        <!-- Section Content Teks begin -->
        <div class="flex flex-col gap-4 p-2 mt-6" style="font-family: Montserrat">
            <h1 class="font-bold text-4xl md:text-5xl text-white" style="text-shadow: 1px 1px #000">Pendaftaran Ditutup
            </h1>
            <div class="bg-yellow-500 bg-opacity-80 px-1 py-1">
                <h1 class="font-bold text-3xl md:text-4xl text-black">QUOTA TERPENUHI
                </h1>
            </div>
            <h1 class="font-bold text-4xl md:text-3xl text-white" lang="ar" dir="rtl" style="text-shadow: 1px 1px #000">
                بارك الله فيك</h1>
        </div>
        <!-- Section Content Teks end -->
    </div>
</div>
@endsection
<!-- Section Content end -->

<!-- Section Footer begin -->
@section('footer')
<div class="flex flex-col justify-center items-center p-4 mt-10">
    <!-- Section Footer Teks begin -->
    <h1 style="font-family: Breathing Personal Use" class="font-medium text-xs md:text-sm text-white">Tinggalkan Jejak
    </h1>
    <h2 class="text-3xl md:text-4xl font-medium text-yellow-400 mt-2" style="font-family: Breathing Personal Use">
        Kebaikan
    </h2>
    <p style="font-family: Montserrat" class="text-white text-xs md:text-sm">sebelum berpulang</p>
    <!-- Section Footer Teks end -->
</div>
@endsection
<!-- Section Footer end -->