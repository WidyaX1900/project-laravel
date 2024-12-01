@php
    $version = time();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>School Data Management App</title>
    <link rel="stylesheet" href="{{ config('app.asset_url') }}bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ config('app.asset_url') }}css/app.css?v={{ $version }}">
    <script src="{{ config('app.asset_url') }}js/jquery-3.7.1.min.js"></script>
</head>

<body>    
    @yield('navbar')
    @yield('content')
    <script src="{{ config('app.asset_url') }}bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ config('app.asset_url') }}js/app.js?v={{ $version }}"></script>
</body>

</html>
