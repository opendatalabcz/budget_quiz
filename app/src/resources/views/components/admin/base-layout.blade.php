<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ mix('css/admin.css') }}" type="text/css">
    <script src="{{ mix('js/app.js') }}"></script>
</head>

<body>
    {{ $slot }}
</body>

</html>
