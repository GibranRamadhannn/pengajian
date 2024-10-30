@extends('layouts.guest-index')

@section('title', 'Daftar Peserta')
@section('content')
<div class="flex-col flex justify-center items-center overflow-hidden p-2">
    <div class="mx-auto max-w-4xl py-2 sm:px-6 sm:py-10 lg:px-8 mb-5">
        <div class="relative isolate overflow-hidden bg-gray-900 p-4 shadow-2xl rounded-xl sm:rounded-3xl sm:px-4 md:pt-24 lg:flex lg:gap-x-20 lg:px-20 lg:pt-0 flex-row">
            <form action="/participant/store/ }}" method="POST">
                @csrf
                <div class="mx-auto max-w-full text-center lg:mx-0 lg:flex-auto lg:py-12 lg:text-left">
                    <!-- Input Nama lengkap -->
                    <div class="mb-2" style="font-family: Montserrat">
                        <!-- Label -->
                        <label for="No telepon" class="block text-xl font-medium leading-1 text-blue-300">Masukan No Telepon</label>
                     
                        <!-- Input -->
                        <div class="relative mt-2 rounded-md shadow-sm">
                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                class="block w-full rounded-md border-0 py-2 pl-7 pr-20 text-black ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 placeholder:text-sm focus:ring-inset focus:ring-yellow-500 focus:ring-4 sm:text-sm sm:leading-6"
                                placeholder="Masukkan No Telepon" required>
                        </div>
                    </div>

                    <!-- Input Nomor WA -->
                    <div class="mb-2" style="font-family: Montserrat">
                        <!-- Label -->
                       
                        <!-- Input -->
                    </div>

                    <!-- Input Usia -->
                

                    <!-- Input Gender begin -->
                    <div class="mt-2" style="display: none" style="font-family: Montserrat">
                      
                        <!-- Option begin -->
                        
                    </div>
                    <!-- Input Gender end -->
            </form>
        </div>
    </div>
</div>
@endsection