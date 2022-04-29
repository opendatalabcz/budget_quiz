<x-admin.layout>
    <x-slot:title>
        @if($education->exists)
            Upravit vzdělání ID {{ $education->id }}
        @else
            Přidat nové vzdělání
        @endif
    </x-slot:title>

    <form action="@if($education->exists) {{ route('admin.educations.update', $education)  }} @else {{ route('admin.educations.store') }} @endif" method="POST">
        @csrf
        @if($education->exists)
            @method('PATCH')
        @endif
        <div class="mb-3">
            <label for="education-name-input" class="form-label">Název</label>
            <input type="text" name="education_name"
                   value="{{ old('education_name', $education->name) }}"
                   id="education-name-input"
                   @class(['form-control', 'is-invalid' => $errors->has('education_name')])
                   maxlength="100" required>
            @error('education_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">@if($education->exists) Upravit @else Přidat @endif</button>
    </form>
</x-admin.layout>
