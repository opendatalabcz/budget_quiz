<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME', 'Budget Quiz') }}</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}" type="text/css">
    <script src="{{ mix('js/app.js') }}"></script>
</head>

<body>
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <span class="fs-4">{{ env('APP_NAME', 'Budget Quiz') }}</span>
            </a>

            <ul class="nav nav-pills">
                <x-nav-link route-name="index">Úvod</x-nav-link>
                <x-nav-link route-name="quiz.index">Kvíz</x-nav-link>
                <x-nav-link route-name="results">Výsledky</x-nav-link>
            </ul>
        </header>
    </div>

    <div class="container main-content">
        {{ $slot }}
    </div>

    <div class="container footer">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <p class="col-md-4 mb-0 text-muted">&copy; {{ env('COPYRIGHT', date('Y') . ' All rights reserved') }}</p>

            <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item"><a href="{{ route('admin.welcome') }}" class="nav-link px-2 text-muted">Administrace</a></li>
            </ul>
        </footer>
    </div>
</body>

</html>
