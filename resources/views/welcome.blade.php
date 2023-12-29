<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!-- Styles -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body class="antialiased text-bg-dark">
<x-banner/>
<x-navigation-menu/>
<div id="banners">
    <x-landing.slider></x-landing.slider>
</div>
<div class="container-fluid just">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-sm-12 p-2">
            <div class="pb-2">
                <x-landing.news-section/>
            </div>
            <div class="pb-2">
                <x-landing.changelog-section/>
            </div>
        </div>
        <div class="col-lg-5 col-sm-12 p-2">
            <x-landing.server-status-card/>
            <x-landing.donate-card/>
        </div>

        <div class="col-11 ">
            <hr class="text-black">
            <x-landing.general-status/>
        </div>

        <div class="col-6 ">
            <x-landing.market-section></x-landing.market-section>
        </div>
        <div class="col-6 ">
            <h2>Rankings</h2>
        </div>
    </div>
</div>

</body>
</html>
