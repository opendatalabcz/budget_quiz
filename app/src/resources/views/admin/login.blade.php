<x-admin.base-layout>
    <div class="container login mt-3">
        <form method="POST" action="{{ route('admin.login') }}">
            @csrf

            <h1 class="h3 mb-3 fw-normal">{{ env('APP_NAME', 'Budget Quiz') }}</h1>
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

            <p class="mt-5 mb-3 text-muted">&copy; {{ env('COPYRIGHT', date('Y') . ' All rights reserved') }}</p>
        </form>
    </div>
</x-admin.base-layout>
