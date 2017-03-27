<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}@yield('title')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @yield('css')
</head>
<body>
<div id="app" class="main">
    @include('components.header')
    <div class="container">
        @section('content')

        @show
    </div>
</div>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>