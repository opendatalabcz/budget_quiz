<x-admin.layout>
    <x-slot:title>
        @if($budgetCapitol->exists)
            Upravit kapitolu státního rozpočtu ID {{ $budgetCapitol->id }}
        @else
            Přidat novou kapitolu státního rozpočtu
        @endif
    </x-slot:title>

    <form action="@if($budgetCapitol->exists) {{ route('admin.budget_capitols.update', $budgetCapitol)  }} @else {{ route('admin.budget_capitols.store') }} @endif" method="POST">
        @csrf
        @if($budgetCapitol->exists)
            @method('PATCH')
        @endif
        <div class="mb-3">
            <label for="budget-capitol-number-input" class="form-label">Číslo</label>
            <input type="number" name="budget_capitol_number"
                   value="{{ old('budget_capitol_number', $budgetCapitol->number) }}"
                   id="budget-capitol-number-input"
                   @class(['form-control', 'is-invalid' => $errors->has('budget_capitol_number')])
                   required>
            @error('budget_capitol_number')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="budget-capitol-name-input" class="form-label">Název</label>
            <input type="text" name="budget_capitol_name"
                   value="{{ old('budget_capitol_name', $budgetCapitol->name) }}"
                   id="budget-capitol-name-input"
                   @class(['form-control', 'is-invalid' => $errors->has('budget_capitol_name')])
                   maxlength="100" required>
            @error('budget_capitol_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">@if($budgetCapitol->exists) Upravit @else Přidat @endif</button>
    </form>
</x-admin.layout>
