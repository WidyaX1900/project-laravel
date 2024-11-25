<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>School Data Management Application</title>
    <link rel="stylesheet" href="{{ config('app.url') }}resources/bootstrap/css/bootstrap.min.css">
    @vite(['resources/css/app.css'])
</head>

<body>
    @yield('content')
    @vite(['resources/js/app.js'])
    <script src="{{ config('app.url') }}resources/bootstrap/js/bootstrap.min.css"></script>
</body>

</html>
