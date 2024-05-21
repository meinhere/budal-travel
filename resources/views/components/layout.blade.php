<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  {{-- Fonts Style --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  {{-- Jquery --}}
  <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>

 {{-- App Icon --}}
 <link rel="icon" type="image/x-icon" href="{{ asset('/storage/img/logo.svg') }}">

  {{-- Select2 --}}
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
  
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <title>{{ $title }}</title>
</head>
<body class="h-full">
  <div class="min-h-full bg-center bg-cover before:fixed before:h-full before:w-full before:bg-black/30" style="background-image: url({{ $background }});">
    <div class="relative">
      <x-navbar></x-navbar>
      <main class="min-h-screen px-4 pt-32 pb-20 mx-auto max-w-7xl md:pb-10 md:pt-32 sm:px-6 lg:px-8">
          <!-- Your content -->
          {{ $slot }}
      </main>
      <x-footer></x-footer>
    </div>
  </div>
</body>
</html>