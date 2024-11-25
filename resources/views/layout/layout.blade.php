<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>School Data Management Application</title>
    @vite(['resources/css/app.css', 'resources/js/jquery-3.7.1.min.js'])
    <link rel="stylesheet" href="{{ config('app.url') }}resources/bootstrap/css/bootstrap.min.css">
</head>

<body>    
    @yield('navbar')
    @yield('content')
    <script src="{{ config('app.url') }}resources/bootstrap/js/bootstrap.min.js"></script>
    @vite(['resources/js/app.js'])
</body>

</html>
