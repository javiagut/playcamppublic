<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PlayCamp</title>

        {{-- TRIX RICH TEXT EDITOR --}}
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
        <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
        <link rel="icon" type="image/x-icon" href="{{asset('vectors/playa.png')}}">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        @vite(['resources/css/app.css','resources/js/app.js'])
        @livewireStyles
    </head>

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-3DWK6PJTY3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-3DWK6PJTY3');
    </script>
    <body class="font-sans antialiased bg-gray-100 min-h-screen flex flex-col justify-between">
        @livewire('header')
        {{ $slot }}
        @livewireScripts
    </body>
    <footer class="w-full flex justify-center items-center bg-black p-4 text-white flex-col">
        © 2024 PlayCamp™. All Rights Reserved.
        <a href="{{route('politica-privacidad')}}">Política de privacidad</a>
    </footer>
</html>
