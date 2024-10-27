<!-- Extending layout -->
@extends('layouts.guest-index')

<!-- Section Title -->
@section('title','Home')

<!-- Section header begin -->
@section('header')
<div class="flex flex-col justify-center text-center gap-6 p-3">
    <!-- Header Text begin -->
    <div class="mt-6" style="font-family: Montserrat">
        <h1 class="font-bold text-4xl text-white" style="text-shadow: 1px 1px #000">DAUROH</h1>
        <h1 class="font-bold text-4xl text-white" style="text-shadow: 1px 1px #000">RBTQ IBNU'ABBAS</h1>
        <h1 class="font-medium text-2xl text-white" style="text-shadow: 1px 1px #000">BANDUNG 1446</h1>
    </div>
    <!-- Header Text end -->
</div>
@endsection
<!-- Section header end -->

<!-- Section content begin -->
@section('content')
<div class="flex flex-col justify-center text-center gap-6 p-4">
    <!-- guide Content begin -->
    <div style="font-family: Montserrat">
        <h2 class="font-semibold text-xl text-white" style="text-shadow: 1px 1px #000">Tekan Tombol
            sesuai Gender
            Anda
        </h2>
    </div>
    <!-- guide Content end -->

    <!-- Button & Icon Ikhwan begin -->
    <div class="inline-flex justify-center">
        <svg id="SvgjsSvg1001" width="50" height="50" xmlns="http://www.w3.org/2000/svg" version="1.1"
            xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs">
            <defs id="SvgjsDefs1002"></defs>
            <g id="SvgjsG1008"><svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32"
                    width="50" height="50">
                    <path fill="#3b82f6"
                        d="M26 11.54a3.12 3.12 0 0 0-1.85-.54h-2.06a2.1 2.1 0 0 0-1.27.4 7.94 7.94 0 0 1-9.63 0 2.1 2.1 0 0 0-1.28-.4H7.85a3.13 3.13 0 0 0-1.85.54 3 3 0 0 0-.82 4l8.18 13.91A3.13 3.13 0 0 0 15.59 31a3 3 0 0 0 3-1.45l8.25-14a3 3 0 0 0-.84-4.01Z"
                        class="color7dccfc svgShape"></path>
                    <circle cx="16" cy="5" r="5" fill="#3b82f6" class="color7dccfc svgShape"></circle>
                </svg></g>
        </svg>
        <a href="{{ route('participant.create', ['indexgender' => 'pria', 'gender' => 'P']) }}"
            class="rounded-full bg-blue-700 px-6 py-2.5 text-lg font-bold text-white shadow-sm hover:bg-blue-200 hover:text-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white"
            style="font-family: Montserrat">saya
            IKHWAN</a>
    </div>
    <!-- Button & Icon Ikhwan end -->

    <!-- Button & Icon Akhwat begin -->
    <div class="inline-flex justify-center">
        <a href="{{ route('participant.create', ['indexgender' => 'wanita', 'gender' => 'W']) }}"
            class="rounded-full bg-pink-600 px-6 py-2.5 text-lg font-bold text-white shadow-sm hover:bg-pink-200 hover:text-pink-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white"
            style="font-family: Montserrat">saya
            AKHWAT</a>
        <svg id="SvgjsSvg1012" width="50" height="50" xmlns="http://www.w3.org/2000/svg" version="1.1"
            xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs">
            <defs id="SvgjsDefs1013"></defs>
            <g id="SvgjsG1014"><svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32"
                    width="50" height="50">
                    <path fill="#f472b6"
                        d="m26.74 24.41-6.19-9.9a2 2 0 0 0-2.25-.85 7.93 7.93 0 0 1-4.6 0 2 2 0 0 0-2.26.85l-6.19 9.9A3 3 0 0 0 7.87 29h16.26a3 3 0 0 0 2.61-4.59Z"
                        class="color7dccfc svgShape"></path>
                    <circle cx="16" cy="6" r="5" fill="#f472b6" class="color7dccfc svgShape"></circle>
                </svg></g>
        </svg>
    </div>
    <!-- Button & Icon Akhwat end -->
</div>
@endsection
<!-- Section content end -->

<!-- Section footer begin -->
@section('footer')
<div class="flex flex-col justify-center items-center p-4 mt-10">
    <!-- footer teks begin -->
    <h1 style="font-family: Breathing Personal Use" class="font-medium text-sm text-white">Tinggalkan Jejak</h1>
    <h2 class="text-4xl font-medium text-yellow-400 mt-2" style="font-family: Breathing Personal Use">Kebaikan
    </h2>
    <p style="font-family: Montserrat" class="text-white text-xs">sebelum berpulang</p>
    <!-- footer teks end -->
</div>
@endsection
<!-- Section footer end -->