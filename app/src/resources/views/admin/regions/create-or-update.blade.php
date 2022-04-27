<x-admin.layout>
    <x-slot:title>
        @if($region->exists)
            Upravit kraj ID {{ $region->id }}
        @else
            Přidat nový kraj
        @endif
    </x-slot:title>

    <form action="@if($region->exists) {{ route('admin.regions.update', $region)  }} @else {{ route('admin.regions.store') }} @endif" method="POST">
        @csrf
        @if($region->exists)
            @method('PATCH')
        @endif
        <div class="mb-3">
            <label for="region-name-input" class="form-label">Název</label>
            <input type="text" name="region_name"
                   value="{{ old('region_name', $region->name) }}"
                   id="region-name-input"
                   @class(['form-control', 'is-invalid' => $errors->has('region_name')])
                   maxlength="100" required>
            @error('region_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">@if($region->exists) Upravit @else Přidat @endif</button>
    </form>
</x-admin.layout>
