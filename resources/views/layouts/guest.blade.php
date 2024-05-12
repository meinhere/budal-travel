<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    
    {{-- Fonts Style --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .hero::before {
            content: '';
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.3);
        }
    </style>
    <title>{{ $title }}</title>
</head>

<body class="h-full">
  <div class="bg-center bg-cover hero" style="background-image: url({{ $background }});">
    <div class="relative flex flex-col items-center justify-center min-h-screen p-5">
      <main class="flex w-full rounded-lg shadow-md sm:max-w-4xl bg-secondary-base">
        <!-- Your content -->
        <div class="px-16 pt-4 pb-10 auth-form-input basis-full sm:basis-1/2">
          {{ $slot }}
        </div> 
        <div class="hidden p-3 auth-image sm:block sm:basis-1/2">
          <div class="w-full h-full bg-center bg-cover rounded-lg" style="background-image: url({{ $background_caption }});"></div>
        </div>
      </main>
    </div>
  </div>
</body>
</html>
