<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Todos los campings de España. Campings de Playa, campings de montaña, campings de costa, campings para practicar deporte o estar de relax, con spa y jacuzzis. Todos los campings de Cataluña, Aragón, Andalucía, Madrid, Cantábria, Andalucía, etc.">
        <meta keywords="campings de montaña, campings para hacer deporte, campings de fiesta, campings familiares, campings de costa, campings de playa, campings con spa">
        
        <title>PlayCamp - Descubre el mejor sitio para pasar tus vacaciones</title>
        <meta name="robots" content="index,follow">

        <link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}">
        @vite(['resources/css/app.css','resources/js/app.js'])
        @livewireStyles
        <style>
            @font-face {
            font-family: 'Righteous';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/righteous/v17/1cXxaUPXBpj2rGoU7C9WhnGFucE.woff2) format('woff2');
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F, U+A720-A7FF;
            }
            @font-face {
            font-family: 'Righteous';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/righteous/v17/1cXxaUPXBpj2rGoU7C9WiHGF.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            }
            @font-face {
            font-family: 'Material Symbols Outlined';
            font-style: normal;
            font-weight: 350;
            src: url(https://fonts.gstatic.com/s/materialsymbolsoutlined/v190/kJF4BvYX7BgnkSrUwT8OhrdQw4oELdPIeeII9v6oDMzByHX9rA6RzaxHMPdY43zj-jCxv3fzvRNU22ZXGJpEpjC_1v-p5Y0.woff2) format('woff2');
            }

            .material-symbols-outlined {
                font-family: 'Material Symbols Outlined';
                font-weight: normal;
                font-style: normal;
                font-size: 24px;
                line-height: 1;
                letter-spacing: normal;
                text-transform: none;
                display: inline-block;
                white-space: nowrap;
                word-wrap: normal;
                direction: ltr;
                -webkit-font-feature-settings: 'liga';
                -webkit-font-smoothing: antialiased;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            @font-face {
            font-family: 'Material Symbols Rounded';
            font-style: normal;
            font-weight: 350;
            src: url(https://fonts.gstatic.com/s/materialsymbolsrounded/v188/syl7-zNym6YjUruM-QrEh7-nyTnjDwKNJ_190FjpZIvDmUSVOK7BDB_Qb9vUSzq3wzLK-P0J-V_Zs-QtQth3-jOcbTCPqw.woff2) format('woff2');
            }

            .material-symbols-rounded {
            font-family: 'Material Symbols Rounded';
            font-weight: normal;
            font-style: normal;
            font-size: 24px;
            line-height: 1;
            letter-spacing: normal;
            text-transform: none;
            display: inline-block;
            align-items: center;
            justify-content: center;
            white-space: nowrap;
            word-wrap: normal;
            direction: ltr;
            -webkit-font-feature-settings: 'liga';
            -webkit-font-smoothing: antialiased;
            }
        </style>
    </head>

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-3DWK6PJTY3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-3DWK6PJTY3');
    </script>
    <body class="font-sans antialiased bg-gray-100 min-h-screen flex flex-col justify-between" style="background-image: url('{{asset('img/fondo.png')}}')">
        @livewire('header')
        {{ $slot }}
        @livewireScripts
    </body>
    <footer class="w-full flex justify-center items-center bg-black p-4 text-white flex-col">
        © 2024 PlayCamp™. All Rights Reserved.
        <a href="{{route('politica-privacidad')}}">Política de privacidad</a>
    </footer>
</html>
