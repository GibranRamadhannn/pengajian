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
            <form action="{{ route('participant.store') }}" method="POST">
                @csrf
                <div class="mx-auto max-w-full text-center lg:mx-0 lg:flex-auto lg:py-12 lg:text-left">
                    <!-- Input Nama lengkap -->
                    <div class="mb-2">
                        <!-- Label -->
                        <label for="name" class="block text-xl font-bold leading-1 text-yellow-500">Nama Lengkap</label>
                        <!-- Input -->
                        <div class="relative mt-2 rounded-md shadow-sm">
                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                class="block w-full rounded-md border-0 py-2 pl-7 pr-20 text-black ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 placeholder:text-sm focus:ring-inset focus:ring-yellow-500 focus:ring-4 sm:text-sm sm:leading-6"
                                placeholder="Masukkan Nama Lengkap" required>
                        </div>
                    </div>

                    <!-- Input Nomor WA -->
                    <div class="mb-2">
                        <!-- Label -->
                        <label for="phone" class="block text-xl font-bold leading-1 text-yellow-500">Nomor WA
                            Aktif</label>
                        <!-- Input -->
                        <div class="relative mt-2 rounded-md shadow-sm">
                            <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                                class="block w-full rounded-md border-0 py-2 pl-7 pr-20 text-black ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 placeholder:text-sm focus:ring-inset focus:ring-yellow-500 focus:ring-4 sm:text-sm sm:leading-6"
                                placeholder="Masukkan Nomor WA Aktif" required>
                        </div>
                    </div>

                    <!-- Input Usia -->
                    <div class="mt-2">
                        <!-- label -->
                        <div>
                            <label class="block text-xl font-bold leading-1 text-yellow-500">Usia
                                (tahun)</label>
                        </div>
                        <!-- option -->
                        <div class="inline-flex gap-5 md:inline-flex justify-center items-center">
                            <!-- Age Radio Options : Remaja -->
                            <div class="flex items-center gap-x-1">
                                <input id="usia-remaja" name="age" type="radio" value="Remaja" {{ old('age')=='Remaja'
                                    ? 'checked' : '' }}
                                    class="h-4 w-4 border-gray-300 text-yellow-400 focus:ring-yellow-500">
                                <label for="usia-remaja"
                                    class="block text-xs font-medium leading-6 text-yellow-500">12-20</label>
                            </div>
                            <!-- Age Radio Options : Dewasa -->
                            <div class="flex items-center gap-x-1">
                                <input id="usia-dewasa" name="age" type="radio" value="Dewasa" {{ old('age')=='Dewasa'
                                    ? 'checked' : '' }}
                                    class="h-4 w-4 border-gray-300 text-yellow-400 focus:ring-yellow-500">
                                <label for="usia-dewasa"
                                    class="block text-xs font-medium leading-6 text-yellow-500">21-40</label>
                            </div>
                            <!-- Age Radio Options : Tua -->
                            <div class="flex items-center gap-x-1">
                                <input id="usia-tua" name="age" type="radio" value="Tua" {{ old('age')=='Tua'
                                    ? 'checked' : '' }}
                                    class="h-4 w-4 border-gray-300 text-yellow-400 focus:ring-yellow-500">
                                <label for="usia-tua"
                                    class="block text-xs font-medium leading-6 text-yellow-500">>41</label>
                            </div>
                            <!-- Icon gender -->
                            @if ($gender == 'L')
                            <div
                                class="rounded-full bg-yellow-500 w-[55px] h-[55px] flex justify-center items-center mx-4">
                                <div>
                                    <svg id="SvgjsSvg1028" width="40" height="40" xmlns="http://www.w3.org/2000/svg"
                                        version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        xmlns:svgjs="http://svgjs.com/svgjs">
                                        <defs id="SvgjsDefs1029"></defs>
                                        <g id="SvgjsG1030" transform="matrix(1,0,0,1,0,0)"><svg
                                                xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"
                                                viewBox="0 0 32 32" width="40" height="40">
                                                <path fill="#ffffff"
                                                    d="M18.5,14.5h-5a5.07583,5.07583,0,0,1-3.478,2.943l-3.16446.76383A7,7,0,0,0,1.5,25.01139V29.5a2,2,0,0,0,2,2h25a2,2,0,0,0,2-2V25.01139a7,7,0,0,0-5.35753-6.80458L21.978,17.443A5.07583,5.07583,0,0,1,18.5,14.5Z"
                                                    class="colorfff svgShape"></path>
                                                <path fill="#ffdaa7"
                                                    d="M19.5,18.07937a4.99822,4.99822,0,0,1-7,0v-2.9l2.39,1.59a1.99408,1.99408,0,0,0,2.22,0l2.39-1.59v2.9Z"
                                                    class="colorffdaa7 svgShape"></path>
                                                <path fill="#8b8891"
                                                    d="M20.23843,17.09631a5.00153,5.00153,0,0,1-8.55408,0L9.6514,17.5251a6.992,6.992,0,0,0,12.62,0Z"
                                                    class="color8b8891 svgShape"></path>
                                                <path fill="#ffffff"
                                                    d="M11,3.5a4.42636,4.42636,0,0,1,1.59689-2.17184A4.38185,4.38185,0,0,1,15.16228.5h1.67544A4.38743,4.38743,0,0,1,21,3.5"
                                                    class="colore5303e svgShape"></path>
                                                <path fill="#2c2b2d"
                                                    d="M21,4a.5019.5019,0,0,1-.47461-.3418A3.88248,3.88248,0,0,0,16.83789,1H15.16211a3.86855,3.86855,0,0,0-2.27344.7334,3.9335,3.9335,0,0,0-1.41406,1.9248.50028.50028,0,0,1-.94922-.3164A4.935,4.935,0,0,1,12.30469.92285,4.857,4.857,0,0,1,15.16211,0h1.67578a4.88223,4.88223,0,0,1,4.63672,3.3418.50135.50135,0,0,1-.31641.63281A.49616.49616,0,0,1,21,4Z"
                                                    class="color2c2b2d svgShape"></path>
                                                <path fill="#2c2b2d"
                                                    d="M28.5,32H3.5A2.50231,2.50231,0,0,1,1,29.5V25.01172a7.4798,7.4798,0,0,1,5.74023-7.291l3.165-.76367A4.59534,4.59534,0,0,0,13.04,14.30371.50066.50066,0,0,1,13.5,14h5a.50066.50066,0,0,1,.46.30371A4.59534,4.59534,0,0,0,22.09473,16.957l3.165.76367A7.4798,7.4798,0,0,1,31,25.01172V29.5A2.50231,2.50231,0,0,1,28.5,32ZM13.81934,15a5.6107,5.6107,0,0,1-3.67969,2.92969l-3.165.76367A6.48205,6.48205,0,0,0,2,25.01172V29.5A1.50164,1.50164,0,0,0,3.5,31h25A1.50164,1.50164,0,0,0,30,29.5V25.01172a6.48205,6.48205,0,0,0-4.97461-6.31836l-3.165-.76367A5.60786,5.60786,0,0,1,18.18066,15Z"
                                                    class="color2c2b2d svgShape"></path>
                                                <path fill="#2c2b2d"
                                                    d="M16,22a7.53543,7.53543,0,0,1-6.76074-4.26465.50013.50013,0,1,1,.90234-.43164,6.49075,6.49075,0,0,0,11.7168,0,.50013.50013,0,0,1,.90234.43164A7.53543,7.53543,0,0,1,16,22Z"
                                                    class="color2c2b2d svgShape"></path>
                                                <path fill="#2c2b2d"
                                                    d="M16 20a5.46561 5.46561 0 0 1-4.70508-2.64941.50044.50044 0 0 1 .85547-.51954 4.50076 4.50076 0 0 0 7.69922 0 .50044.50044 0 0 1 .85547.51954A5.46561 5.46561 0 0 1 16 20zM25.5 32a.49971.49971 0 0 1-.5-.5v-4a.5.5 0 0 1 1 0v4A.49971.49971 0 0 1 25.5 32zM6.5 32a.49971.49971 0 0 1-.5-.5v-4a.5.5 0 0 1 1 0v4A.49971.49971 0 0 1 6.5 32z"
                                                    class="color2c2b2d svgShape"></path>
                                                <rect width="3" height="10" x="14.5" y="21.5" fill="#8b8891"
                                                    class="color8b8891 svgShape"></rect>
                                                <path fill="#2c2b2d"
                                                    d="M17.5,32h-3a.49971.49971,0,0,1-.5-.5v-10a.49971.49971,0,0,1,.5-.5h3a.49971.49971,0,0,1,.5.5v10A.49971.49971,0,0,1,17.5,32ZM15,31h2V22H15Z"
                                                    class="color2c2b2d svgShape"></path>
                                                <path fill="#ffdaa7"
                                                    d="M19.75594,14.99606l-2.64656,1.76433a2,2,0,0,1-2.21876,0l-2.64656-1.76433a2,2,0,0,1-.87052-1.38127L10.5,7.5a30.67639,30.67639,0,0,1,11,0l-.87354,6.11479A2,2,0,0,1,19.75594,14.99606Z"
                                                    class="colorffdaa7 svgShape"></path>
                                                <path fill="#8b8891"
                                                    d="M21.5,5.5c-1.70232-.13481-3.54082-.21742-5.49948-.21744-1.95906,0-3.7979.08261-5.50052.21744-.5916-.22789-1-.6104-1-1a1,1,0,0,1,1-1c1.74275-.11034,3.59412-.1749,5.54352-.17392C17.96082,3.327,19.783,3.3913,21.5,3.5a1,1,0,0,1,0,2Z"
                                                    class="color8b8891 svgShape"></path>
                                                <path fill="#2c2b2d"
                                                    d="M21.5,6c-.0127,0-.02637-.001-.03906-.00195a69.35375,69.35375,0,0,0-10.92188,0,.52073.52073,0,0,1-.21875-.03125C9.49414,5.64844,9,5.10059,9,4.5A1.50164,1.50164,0,0,1,10.5,3c1.81543-.11621,3.71875-.14941,5.54395-.17383,1.81835.001,3.665.05957,5.4873.17481h.002A1.49969,1.49969,0,0,1,21.5,6ZM16.001,4.78223c1.8291,0,3.68457.07324,5.51562.21777A.50093.50093,0,0,0,22,4.5a.50609.50609,0,0,0-.5-.5c-1.84766-.11621-3.66992-.1875-5.499-.17383-1.81739,0-3.65723.0586-5.46973.17285A.51.51,0,0,0,10,4.5c0,.08789.17188.3125.58008.49219C12.37891,4.85254,14.20215,4.78223,16.001,4.78223Z"
                                                    class="color2c2b2d svgShape"></path>
                                                <path fill="#58565d"
                                                    d="M21,10.38048l-2.7498,3.24545a.29148.29148,0,0,1-.46491-.02675l-.55307-.82961a.78224.78224,0,0,0-.65086-.34833H15.41864a.78222.78222,0,0,0-.65084.34832l-.55588.83381a.29148.29148,0,0,1-.46253.02951l-2.82664-3.2524-.00275.00076.45,3.15a2.02184,2.02184,0,0,0,.87,1.39l2.65,1.76a1.99408,1.99408,0,0,0,2.22,0l2.65-1.76a2.02184,2.02184,0,0,0,.87-1.39l.45-3.14"
                                                    class="color58565d svgShape"></path>
                                                <path fill="#2c2b2d"
                                                    d="M16,17.59766a2.50292,2.50292,0,0,1-1.38672-.4209L11.9668,15.41211a2.5009,2.5009,0,0,1-1.08789-1.72656l-.874-6.11524a.5002.5002,0,0,1,.419-.56445,31.01581,31.01581,0,0,1,11.15234,0,.5002.5002,0,0,1,.41895.56445l-.874,6.11524a2.5009,2.5009,0,0,1-1.08789,1.72656l-2.64648,1.76465A2.50056,2.50056,0,0,1,16,17.59766ZM11.06543,7.9209l.80371,5.624a1.49755,1.49755,0,0,0,.65234,1.03516L15.168,16.34473a1.49982,1.49982,0,0,0,1.66406,0l2.64649-1.76465h0a1.49755,1.49755,0,0,0,.65234-1.03516l.80371-5.624A29.2702,29.2702,0,0,0,11.06543,7.9209Z"
                                                    class="color2c2b2d svgShape"></path>
                                                <path fill="#2c2b2d"
                                                    d="M13.96777,14.31152a.78933.78933,0,0,1-.59472-.26953l-2.82813-3.25488a.5005.5005,0,0,1,.75586-.65625l2.64649,3.04687.40429-.60644A1.28231,1.28231,0,0,1,15.419,12h1.1621a1.28231,1.28231,0,0,1,1.06739.57129l.39941.59863,2.57031-3.03418a.50029.50029,0,0,1,.76368.64649l-2.75,3.24609a.79374.79374,0,0,1-.64942.27832.78575.78575,0,0,1-.61328-.35156l-.55273-.8291A.28205.28205,0,0,0,16.58105,13H15.419a.28205.28205,0,0,0-.23536.126l-.55566.833a.78374.78374,0,0,1-.60547.35059A.51253.51253,0,0,1,13.96777,14.31152Z"
                                                    class="color2c2b2d svgShape"></path>
                                                <path fill="#8b8891"
                                                    d="M21.5,7.5a51.682,51.682,0,0,0-11,0,1,1,0,0,1,0-2c1.67862-.13293,3.48793-.215,5.41293-.21739,1.99074-.00249,3.8586.0805,5.58707.21739a1,1,0,0,1,0,2Z"
                                                    class="color8b8891 svgShape"></path>
                                                <path fill="#2c2b2d"
                                                    d="M21.5,8a.47772.47772,0,0,1-.05273-.00293,51.56153,51.56153,0,0,0-5.4043-.291h-.02442a51.40732,51.40732,0,0,0-5.46484.291h-.00586A1.49893,1.49893,0,1,1,10.5,5c1.76563-.1416,3.59961-.21484,5.41211-.21777,1.87109.02539,3.76465.07226,5.62695.21972H21.542A1.49931,1.49931,0,0,1,21.5,8ZM15.98047,5.78223h-.06641c-1.78711.00293-3.5957.07519-5.375.21582A.5135.5135,0,0,0,10,6.5a.50609.50609,0,0,0,.5.5,51.42307,51.42307,0,0,1,5.51953-.29395H16.044A52.43257,52.43257,0,0,1,21.52246,7,.50026.50026,0,0,0,21.5,6C19.64648,5.85449,17.80273,5.78223,15.98047,5.78223Z"
                                                    class="color2c2b2d svgShape"></path>
                                            </svg></g>
                                    </svg>
                                </div>
                            </div>
                            @endif
                            @if ($gender == 'P')
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
                            @endif
                        </div>

                        <!-- Additional Form Elements -->
                        <div class="mt-5 flex justify-center items-center gap-4">
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
                    <div class="mt-2" style="display: none">
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
                                    $gender=='L' ? 'checked' : '' }}>
                                <label for="gender-l"
                                    class="block text-xs font-medium leading-6 text-yellow-500">Laki-laki</label>
                            </div>
                            <!-- Value = laki-Laki end-->
                            <!-- Value = perempuan begin-->
                            <div class="flex items-center gap-x-1">
                                <input id="gender-p" name="gender" type="radio" value="perempuan"
                                    class="h-4 w-4 border-gray-300 text-yellow-400 focus:ring-yellow-500" {{
                                    $gender=='P' ? 'checked' : '' }}>
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