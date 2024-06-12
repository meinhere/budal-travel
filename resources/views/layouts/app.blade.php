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
        
        {{-- App Icon --}}
        <link rel="icon" type="image/x-icon" href="{{ asset('/storage/img/logo.svg') }}">

        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
        <link rel="stylesheet" href="{{ asset('/build/assets/app-BIGoXwAh.css') }}">
        <script type="module" src="{{ asset('/build/assets/app-Da4RN6ke.js') }}" defer></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.0/dist/cdn.min.js"></script>

        <title>{{ $title }}</title>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            
            <!-- component -->
            <!-- This is an example component -->
            <div>
                {{-- Navigation --}}
                @include('layouts.navigation')
                
                <div class="flex overflow-hidden bg-white">
                    {{-- Sidebar --}}
                    @include('layouts.sidebar')

                    <div class="fixed inset-0 z-10 hidden bg-gray-900 opacity-50" id="sidebarBackdrop"></div>
                    
                    {{-- Main Content --}}
                    <div id="main-content" class="relative w-full h-full overflow-y-auto lg:ml-64">
                        <main>
                            {{ $slot }}
                        </main>  
                    </div>
                </div>
                <script async defer src="https://buttons.github.io/buttons.js"></script>
                <script src="https://demo.themesberg.com/windster/app.bundle.js"></script>
            </div>
        </div>
    </body>
</html>
