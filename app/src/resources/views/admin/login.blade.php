<x-admin.base-layout>
    <div class="container login mt-3">
        <form method="POST" action="{{ route('admin.login') }}">
            @csrf

            <h1 class="h3 mb-3 fw-normal">{{ config('app.name') }}</h1>
            <h2 class="h4 mb-3 fw-normal">Administrace</h2>

            @error('username')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-floating">
                <input type="text" name="username" class="form-control" id="username" placeholder="Uživatelské jméno" value="{{ old('username') }}">
                <label for="username">Uživatelské jméno</label>
            </div>
            <div class="form-floating mt-1">
                <input type="password" name="password" class="form-control" id="password" placeholder="Heslo">
                <label for="password">Heslo</label>
            </div>

            <div class="form-check mb-3 mt-2">
                <input class="form-check-input" type="checkbox" name="remember" value="on" id="rememberCheckbox" @checked(old('remember') == 'on')>
                <label class="form-check-label" for="rememberCheckbox">
                    Zapamatovat
                </label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Přihlásit</button>

            <div class="d-flex flex-wrap justify-content-between mt-5 mb-3">
                <div class="col-md-4">
                    <p class="text-muted mb-0">&copy; {{ config('app.copyright') }}</p>
                </div>

                <div class="col-md-4 text-right justify-content-end">
                    <a href="{{ route('index') }}" class="text-muted text-decoration-none">Hlavní stránka</a>
                </div>
            </div>

        </form>
    </div>
</x-admin.base-layout>
