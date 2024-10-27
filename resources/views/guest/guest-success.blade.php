<!-- Extending layout -->
@extends('layouts.guest-index')

<!-- Section Title -->
@section('title','Berhasil Terdaftar')

<!-- Section header begin -->
@section('header')
<div class="p-1 md:p-4 flex flex-col justify-center items-center" style="font-family: Montserrat">
    <!-- Header Teks begin -->
    <h1 class="font-bold text-4xl md:text-3xl text-white" lang="ar" dir="rtl" style="text-shadow: 1px 1px #000">الحمد
        للة كثيرا</h1>
    <div class="bg-blue-500 bg-opacity-80 flex justify-center text-center px-4">
        <h1 class="font-bold text-2xl md:text-3xl text-white" style="text-shadow: 1px 1px #000">ANDA SUDAH TERDAFTAR
        </h1>
    </div>
    <!-- Header Teks end -->
</div>
@endsection
<!-- Section header end -->

<!-- Section content begin -->
@section('content')
<div class="p-2 md:p-4 flex flex-col justify-center items-center">
    <!-- barcode begin -->
    <div class="p-2 md:p-4">
        <img src="{{ asset('/images/barcode_sample-2.png') }}" alt="" class="w-50 h-50 md:w-[400px] md:h-50">
    </div>
    <!-- barcode end -->
    <!-- teks -->
    <h1 class="font-normal text-lg md:text-2xl text-white text-center" style="font-family: Montserrat">silakan
        screenshot layar ini</h1>
    <!-- icon & teks -->
    <div class="inline-flex justify-center items-center w-full gap-3 mt-2">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" id="info" width="20" height="20">
            <g fill="#eab308">
                <path d="M8 2a6 6 0 1 0 6 6 6 6 0 0 0-6-6Zm0 11a5 5 0 1 1 5-5 5 5 0 0 1-5 5Z"></path>
                <path
                    d="M8 6.85a.5.5 0 0 0-.5.5v3.4a.5.5 0 0 0 1 0v-3.4a.5.5 0 0 0-.5-.5zM8 4.8a.53.53 0 0 0-.51.52v.08a.47.47 0 0 0 .51.47.52.52 0 0 0 .5-.5v-.12A.45.45 0 0 0 8 4.8z">
                </path>
            </g>
        </svg>
        <p href="#" class="text-xs font-normal text-yellow-500 hover:text-blue-300 underline italic"
            style="font-family: Montserrat">
            pelajari lebih lanjut
        </p>
    </div>
</div>
@endsection
<!-- Section content end -->

<!-- Section footer begin -->
@section('footer')
<div class="flex flex-col justify-center items-center p-4 md:p-5">
    <h1 style="font-family: Breathing Personal Use" class="font-medium text-sm md:text-lg text-white text-center">
        Tinggalkan Jejak</h1>
    <h2 class="text-3xl md:text-4xl font-medium text-yellow-400 mt-2" style="font-family: Breathing Personal Use">
        Kebaikan
    </h2>
    <p style="font-family: Montserrat" class="text-white text-xs md:text-sm text-center">sebelum berpulang</p>
</div>
@endsection
<!-- Section footer end -->