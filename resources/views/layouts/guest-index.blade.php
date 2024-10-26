<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <!-- csrf-token -->
 <meta name="csrf-token" content="{{ csrf_token() }}">
 <!-- Web Title -->
 <title>Daftar Dauroh - @yield('title', "Ibnu'Abbas")</title>

 <!-- Fonts Library -->
 <link href="https://fonts.cdnfonts.com/css/breathing-personal-use" rel="stylesheet">
 <link rel="preconnect" href="https://fonts.googleapis.com">
 <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
  rel="stylesheet">
 <!-- Vite -->
 @vite(['resources/css/app.css', 'resources/js/app.js'])
 <!-- Adding Style using CSS -->
 <style>
  /* Responsive Background begin */
  .responsive-bg {
   background-image: url("@yield('background_image', '/images/bg-new.jpeg')");
   background-repeat: no-repeat;
   background-position: center;
   background-size: cover;
  }

  @media (min-width: 768px) {
   .responsive-bg {
    background-position: center center;
   }
  }

  /* Responsive Background end */
 </style>
 <!-- Adding Style using CSS -->
</head>

<body>
 <!-- Code begin -->
 <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 responsive-bg">
  <!-- Header begin -->
  <div class="mx-auto max-w-4xl py-2 md:py-3 sm:px-6 lg:px-8 mb-3 flex flex-col justify-center items-center">
   @yield('header')
  </div>
  <!-- Header end -->
  <!-- Content begin -->
  <div class="mx-auto max-w-4xl py-2 md:py-3 sm:px-6 lg:px-8 mb-3 flex flex-col justify-center items-center">
   @yield('content')
  </div>
  <!-- Content end -->
  <!-- Content begin -->
  <div class="mx-auto max-w-4xl py-2 md:py-3 sm:px-6 lg:px-8 mb-3 flex flex-col justify-center items-center">
   @yield('footer')
  </div>
  <!-- Conten end -->
 </div>
 <!-- Code end -->
</body>

</html>