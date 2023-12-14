<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">


        @livewireStyles
        @vite(['resources/js/app.js', 'resources/sass/app.scss'])

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased bg-light">
        <x-banner />
        @livewire('navigation-menu')

        <!-- Page Heading -->
{{--        <header class="d-flex py-3 bg-white shadow-sm border-bottom">--}}
{{--            <div class="container">--}}
{{--                {{ $header }}--}}
{{--            </div>--}}
{{--        </header>--}}

        <!-- Page Content -->
        <main class="container my-5">
            <div class="row">
                <div class="col-3 d-sm-block d-md-block d-none ">
                    <x-sidebar-menu></x-sidebar-menu>
                </div>
                <div class="col">
                    {{ $slot }}
                </div>
            </div>

        </main>

        @stack('modals')

        @livewireScripts

        @stack('scripts')

    </body>
</html>
