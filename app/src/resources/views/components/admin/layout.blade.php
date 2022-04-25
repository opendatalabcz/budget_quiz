<x-admin.base-layout>
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="{{ route('admin.welcome') }}"
               class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <span class="fs-4">Administrace</span>
            </a>

            <ul class="nav nav-pills">
                <x-nav-link route-name="admin.regions.index">Kraje</x-nav-link>
                <li class="nav-item"><a href="#" class="nav-link">Výsledky</a></li>
                <li class="nav-item"><a href="{{ route('admin.logout') }}" class="nav-link">Odhlásit se</a></li>
            </ul>
        </header>
    </div>

    <div class="container">
        @if (isset($title) || isset($description))
            <div class="description mb-4">
                @isset($title)
                    <h1>{{ $title }}</h1>
                @endisset

                @isset($description)
                    <p>{{ $description }}</p>
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
</x-admin.base-layout>