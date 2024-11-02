<!-- IF ELSE Function for gender was chained to Text-color and Icon
    Don't Forget to add P or W index in route if button in Guest-Home was clicked 
-->

<!-- Gender P = Pria or Laki-Laki in DB
    Gender W = Wanita or Perempuan in DB
-->

<!-- Extending layout -->
@extends('layouts.guest-index')

<!-- Section Title -->
@section('title', 'Daftar Peserta')

<!-- Section content begin -->
@section('content')
<div class="flex-col flex justify-center items-center overflow-hidden p-2">
    <!-- Form code Begin -->
    <div class="mx-auto max-w-4xl py-2 sm:px-6 sm:py-10 lg:px-8 mb-5">
        <!-- Form Card -->
        <div
            class="relative isolate overflow-hidden bg-gray-900 p-4 shadow-2xl rounded-xl sm:rounded-3xl sm:px-4 md:pt-24 lg:flex lg:gap-x-20 lg:px-20 lg:pt-0 flex-row">
            <!-- Form Card & csrf token -->
            <form action="/participant/store/{{ $indexgender }}" method="POST">
                @csrf
                <div class="mx-auto max-w-full text-center lg:mx-0 lg:flex-auto lg:py-12 lg:text-left">
                    <!-- Input Nama lengkap -->
                    <div class="mb-2" style="font-family: Montserrat">
                        <!-- Label -->
                        {{-- @if ($indexgender == 'pria' && $gender == 'P') --}}
                        <label for="name" class="{{ $indexgender == 'P' ? 'block text-xl font-medium leading-1 text-blue-300' : 'block text-xl font-medium leading-1 text-pink-300' }}">
                            Nama Lengkap
                        </label>
                        {{-- @else
                        <label for="name" class="block text-xl font-medium leading-1 text-pink-300">Nama
                            Lengkap</label>
                        @endif --}}
                        <!-- Input -->
                        <div class="relative mt-2 rounded-md shadow-sm">
                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                class="block w-full rounded-md border-0 py-2 pl-7 pr-20 text-black ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 placeholder:text-sm focus:ring-inset focus:ring-yellow-500 focus:ring-4 sm:text-sm sm:leading-6"
                                placeholder="Masukkan Nama Lengkap" required>
                        </div>
                    </div>

                    <!-- Input Nomor WA -->
                    <div class="mb-2" style="font-family: Montserrat">
                        <!-- Label -->
                        {{-- @if ($indexgender === 'pria' && $gender === 'P') --}}
                        <label for="phone" class="{{ $indexgender == 'P' ? 'block text-xl font-medium leading-1 text-blue-300' : 'block text-xl font-medium leading-1 text-pink-300' }}">Nomor WA
                            Aktif</label>
                        {{-- @else
                        <label for="phone" class="block text-xl font-medium leading-1 text-pink-300">Nomor WA
                            Aktif</label>
                        @endif --}}
                        <!-- Input -->
                        <div class="relative mt-2 rounded-md shadow-sm">
                            <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                                class="block w-full rounded-md border-0 py-2 pl-7 pr-20 text-black ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 placeholder:text-sm focus:ring-inset focus:ring-yellow-500 focus:ring-4 sm:text-sm sm:leading-6"
                                placeholder="Masukkan Nomor WA Aktif" required>
                        </div>
                    </div>

                    <!-- Input Usia -->
                    <div class="mt-2" style="font-family: Montserrat">
                        <!-- label -->
                        {{-- @if ($indexgender === 'pria' && $gender === 'P') --}}
                        <label class="{{ $indexgender == 'P' ? 'block text-xl font-medium leading-1 text-blue-300' : 'block text-xl font-medium leading-1 text-pink-300' }}">Usia
                            (tahun)
                        </label>
                        {{-- @else
                        <label class="block text-xl font-medium leading-1 text-pink-300">Usia
                            (tahun)
                        </label>
                        @endif --}}
                        <!-- option -->
                        @if ($indexgender === 'P' || $gender === 'pria')
                        <div class="inline-flex gap-5 md:inline-flex justify-center items-center">
                            <!-- Age Radio Options : Remaja -->
                            <div class="flex items-center gap-x-1">
                                <input id="usia-remaja" name="age" type="radio" value="Remaja" {{ old('age')=='Remaja'
                                    ? 'checked' : '' }} class="h-4 w-4 border-white text-blue-300 focus:ring-blue-400">
                                <label for="usia-remaja"
                                    class="block text-large font-medium leading-6 text-blue-300">12-20</label>
                            </div>
                            <!-- Age Radio Options : Dewasa -->
                            <div class="flex items-center gap-x-1">
                                <input id="usia-dewasa" name="age" type="radio" value="Dewasa" {{ old('age')=='Dewasa'
                                    ? 'checked' : '' }} class="h-4 w-4 border-white text-blue-300 focus:ring-blue-400">
                                <label for="usia-dewasa"
                                    class="block text-large font-medium leading-6 text-blue-300">21-40</label>
                            </div>
                            <!-- Age Radio Options : Tua -->
                            <div class="flex items-center gap-x-1">
                                <input id="usia-tua" name="age" type="radio" value="Tua" {{ old('age')=='Tua'
                                    ? 'checked' : '' }}
                                    class="h-4 w-4 border-gray-300 text-blue-300 focus:ring-blue-400">
                                <label for="usia-tua"
                                    class="block text-large font-medium leading-6 text-blue-300">>41</label>
                            </div>
                            <!-- Icon gender -->
                            <div class="rounded-full bg-white w-[55px] h-[55px] flex justify-center items-center mx-4">
                                <div>
                                    <svg id="SvgjsSvg1001" width="40" height="40" xmlns="http://www.w3.org/2000/svg"
                                        version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        xmlns:svgjs="http://svgjs.com/svgjs">
                                        <defs id="SvgjsDefs1002"></defs>
                                        <g id="SvgjsG1008"><svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"
                                                viewBox="0 0 32 32" width="40" height="40">
                                                <path fill="#3b82f6"
                                                    d="M26 11.54a3.12 3.12 0 0 0-1.85-.54h-2.06a2.1 2.1 0 0 0-1.27.4 7.94 7.94 0 0 1-9.63 0 2.1 2.1 0 0 0-1.28-.4H7.85a3.13 3.13 0 0 0-1.85.54 3 3 0 0 0-.82 4l8.18 13.91A3.13 3.13 0 0 0 15.59 31a3 3 0 0 0 3-1.45l8.25-14a3 3 0 0 0-.84-4.01Z"
                                                    class="color7dccfc svgShape"></path>
                                                <circle cx="16" cy="5" r="5" fill="#3b82f6"
                                                    class="color7dccfc svgShape"></circle>
                                            </svg></g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="inline-flex gap-5 md:inline-flex justify-center items-center">
                            <!-- Age Radio Options : Remaja -->
                            <div class="flex items-center gap-x-1">
                                <input id="usia-remaja" name="age" type="radio" value="Remaja" {{ old('age')=='Remaja'
                                    ? 'checked' : '' }} class="h-4 w-4 border-white text-pink-300 focus:ring-pink-400">
                                <label for="usia-remaja"
                                    class="block text-xs font-medium leading-6 text-pink-300">12-20</label>
                            </div>
                            <!-- Age Radio Options : Dewasa -->
                            <div class="flex items-center gap-x-1">
                                <input id="usia-dewasa" name="age" type="radio" value="Dewasa" {{ old('age')=='Dewasa'
                                    ? 'checked' : '' }} class="h-4 w-4 border-white text-pink-300 focus:ring-pink-400">
                                <label for="usia-dewasa"
                                    class="block text-xs font-medium leading-6 text-pink-300">21-40</label>
                            </div>
                            <!-- Age Radio Options : Tua -->
                            <div class="flex items-center gap-x-1">
                                <input id="usia-tua" name="age" type="radio" value="Tua" {{ old('age')=='Tua'
                                    ? 'checked' : '' }} class="h-4 w-4 border-white text-pink-300 focus:ring-pink-400">
                                <label for="usia-tua"
                                    class="block text-xs font-medium leading-6 text-pink-300">>41</label>
                            </div>
                            <!-- Icon gender -->
                            <div
                                class="rounded-full bg-blue-400 w-[55px] h-[55px] flex justify-center items-center mx-4">
                                <div>
                                    <svg id="SvgjsSvg1017" width="40" height="40" xmlns="http://www.w3.org/2000/svg"
                                        version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        xmlns:svgjs="http://svgjs.com/svgjs">
                                        <defs id="SvgjsDefs1018"></defs>
                                        <g id="SvgjsG1019"><svg xmlns="http://www.w3.org/2000/svg"
                                                enable-background="new 0 0 512 512" viewBox="0 0 512 512" width="40"
                                                height="40">
                                                <path fill="#ff6699" d="M491.9,431.5v53.8c0,11.8-9.6,21.4-21.4,21.4h-429c-11.8,0-21.4-9.6-21.4-21.4v-53.8c0-70.7,57.3-128,128-128
                                        h215.7C434.6,303.5,491.9,360.8,491.9,431.5z" class="colorc9d2d7 svgShape">
                                                </path>
                                                <path fill="#ff6699"
                                                    d="M379.3,381.5H132.7c-24.6,0-42.6-23.1-36.6-46.9c52-208.4,65.6-261.9,69-275.2c0.5-0.5,12.4-54,92.8-52.8
                                        c44.8,0.7,79.7,21.3,89,52.5l-0.1,0.1c3.7,14,68.4,272.8,69,275.5C421.9,358.5,403.9,381.5,379.3,381.5z"
                                                    class="colorc9d2d7 svgShape"></path>
                                                <path fill="#ff6699" d="M335.5,173.6c-6,64.5-50.9,101.6-79.4,101.6c-30.5,0-72.3-38.5-79.5-101.6c-6.9-61.5,35.6-82.1,79.5-82.1
                                        C300,91.4,341.3,111.9,335.5,173.6z" class="colorc9d2d7 svgShape"></path>
                                                <path fill="#fdece5"
                                                    d="M335.5,173.6H176.7c-6.9-61.6,35.6-82.2,79.5-82.2C300,91.4,341.4,111.9,335.5,173.6z"
                                                    class="colorfdece5 svgShape"></path>
                                                <path fill="#3E3E3E"
                                                    d="M171.4,174.3c7.2,63.6,49.6,106.3,84.8,106.3c30.5,0,78.2-37.9,84.7-106.4v-0.1c5.4-56.9-28.3-88-84.7-88
                                        C200.4,86.1,164.9,116.5,171.4,174.3C171.4,174.2,171.4,174.2,171.4,174.3z M256.1,96.8c48.3,0,76.9,24.1,74.4,71.5H181.6
                                        C178.1,119.5,209,96.8,256.1,96.8z M256.1,269.9c-25,0-64.3-32.4-73.3-91h146.6C321.8,235.4,282.4,269.9,256.1,269.9z"
                                                    class="color81889a svgShape"></path>
                                                <path fill="#3E3E3E" d="M413.6,307.9c-50.3-201.3-57.4-229.2-63.5-253.6C340.6,22.1,304.4,0.7,258,0c-83.3-1.2-95.6,54.2-96.1,54.6
                                        c-3.4,13.1-16.2,63.7-63.5,253.2c-48.9,19.8-83.6,67.7-83.6,123.6v53.8c0,14.7,12,26.7,26.7,26.7h429.1c14.7,0,26.7-12,26.7-26.7
                                        v-53.8C497.2,375.6,462.6,327.7,413.6,307.9z M172.2,57.3c8.1-31.8,50.3-47.1,85.6-46.6c34.1,0.5,72.7,15.2,82.1,46.7
                                        c1.3,4.8,49.7,198.2,71.3,284.8c4.5,17.9-9.1,35.2-27.6,35.2H128.3c-18.5,0-32-17.3-27.6-35.2C154.6,126.4,168.7,71.1,172.2,57.3z
                                         M486.6,485.3c0,8.8-7.2,16-16,16H41.5c-8.8,0-16-7.2-16-16v-53.8c0-48.7,28.5-90.8,69.7-110.6c-1.5,6.1-3.1,12.3-4.7,18.7
                                        c-6.2,24.6,12.5,48.5,37.9,48.5h255.3c25.4,0,44.1-23.8,37.9-48.5c-0.1-0.4-1.8-7.3-4.7-18.6c41.2,19.8,69.7,61.9,69.7,110.6
                                        L486.6,485.3L486.6,485.3z" class="color81889a svgShape"></path>
                                            </svg></g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- Additional Form Elements -->
                        <div class="mt-5 flex justify-center items-center gap-4" style="font-family: Montserrat">
                            <button type="submit"
                                class="bg-green-500 text-black px-6 py-3 rounded-lg font-medium hover:bg-green-300 hover:text-green-700">
                                Kirim
                            </button>
                            <a href="{{ route('guest.home') }}"
                                class="bg-red-400 text-white px-6 py-3 rounded-lg font-medium hover:bg-red-300 hover:text-red-500">
                                Batal
                            </a>
                        </div>
                    </div>

                    <!-- Input Gender begin -->
                    <div class="mt-2" style="display: none" style="font-family: Montserrat">
                        <!-- Title begin -->
                        <div>
                            <label class="block text-xl font-bold leading-1 text-yellow-500">Jenis
                                Kelamin</label>
                        </div>
                        <!-- Option begin -->
                        <div class="inline-flex gap-2 md:inline-flex justify-center items-center">
                            <!-- Value = laki-Laki begin-->
                            <div class="flex items-center gap-x-1">
                                <input id="gender-l" name="gender" type="radio" value="laki-laki"
                                    class="h-4 w-4 border-gray-300 text-yellow-400 focus:ring-yellow-500" {{
                                    $gender=='P' ? 'checked' : '' }}>
                                <label for="gender-l"
                                    class="block text-xs font-medium leading-6 text-yellow-500">Laki-laki</label>
                            </div>
                            <!-- Value = laki-Laki end-->
                            <!-- Value = perempuan begin-->
                            <div class="flex items-center gap-x-1">
                                <input id="gender-p" name="gender" type="radio" value="perempuan"
                                    class="h-4 w-4 border-gray-300 text-yellow-400 focus:ring-yellow-500" {{
                                    $gender=='W' ? 'checked' : '' }}>
                                <label for="gender-p"
                                    class="block text-xs font-medium leading-6 text-yellow-500">Perempuan</label>
                            </div>
                            <!-- Value = perempuan end-->
                        </div>
                    </div>
                    <!-- Input Gender end -->
            </form>
        </div>
    </div>
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