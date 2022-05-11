<x-admin.base-layout>
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="{{ route('admin.welcome') }}"
               class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <span class="fs-4">Administrace</span>
            </a>

            <ul class="nav nav-pills">
                <x-nav-link route-name="admin.regions.index">Kraje</x-nav-link>
                <x-nav-link route-name="admin.parties.index">Strany</x-nav-link>
                <x-nav-link route-name="admin.educations.index">Vzdělání</x-nav-link>
                <x-nav-link route-name="admin.budget_chapters.index">Kapitoly rozpočtu</x-nav-link>
                <x-nav-link route-name="admin.questions.index">Otázky</x-nav-link>
                <x-nav-link route-name="admin.logout" active-routes="none">Odhlásit se</x-nav-link>
            </ul>
        </header>
    </div>

    <div class="container py-3">
        @if (isset($title) || isset($description))
            <div class="description mb-4">
                @isset($title)
                    <h1>{{ $title }}</h1>
                @endisset

                @isset($description)
                    <p class="lead">{{ $description }}</p>
                @endisset
            </div>
        @endif

        <div class="content">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            {{ $slot }}
        </div>
    </div>

    <div class="container footer">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <p class="col-md-4 mb-0 text-muted">&copy; {{ config('app.copyright') }}</p>

            <p class="col-md-4 text-center">Vytvořil Vojtěch Sillik v rámci své bakalářské práce</p>

            <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item"><a href="{{ route('index') }}" class="nav-link px-2 text-muted">Zpět na hlavní stránku</a></li>
            </ul>
        </footer>
    </div>
</x-admin.base-layout>
