<x-admin.layout>
    <x-slot:title>
        @if($party->exists)
            Upravit politickou stranu ID {{ $party->id }}
        @else
            Přidat novou politickou stranu
        @endif
    </x-slot:title>

    <form action="@if($party->exists) {{ route('admin.parties.update', $party)  }} @else {{ route('admin.parties.store') }} @endif" method="POST">
        @csrf
        @if($party->exists)
            @method('PATCH')
        @endif
        <div class="mb-3">
            <label for="party-short-name-input" class="form-label">Zkratka</label>
            <input type="text" name="party_short_name"
                   value="{{ old('party_short_name', $party->short_name) }}"
                   id="party-short-name-input"
                   @class(['form-control', 'is-invalid' => $errors->has('party_short_name')])
                   maxlength="50" required>
            @error('party_short_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="party-name-input" class="form-label">Název</label>
            <input type="text" name="party_name"
                   value="{{ old('party_name', $party->name) }}"
                   id="party-name-input"
                   @class(['form-control', 'is-invalid' => $errors->has('party_name')])
                   maxlength="150" required>
            @error('party_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">@if($party->exists) Upravit @else Přidat @endif</button>
    </form>
</x-admin.layout>
