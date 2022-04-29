<x-admin.layout>
    <x-slot:title>
        @if($budgetStateChange->exists)
            Upravit změnu stavu státního rozpočtu ID {{ $budgetStateChange->id }}
        @else
            Přidat změnu stavu státního rozpočtu
        @endif
    </x-slot:title>

    <x-slot:description>
        Pro odpověď ID {{ $answer->id }} ({{ $answer->title }})
    </x-slot:description>

    <form action="@if($budgetStateChange->exists) {{ route('admin.questions.answers.budget_state_change.update', [$question, $answer, $budgetStateChange])  }} @else {{ route('admin.questions.answers.budget_state_change.store', [$question, $answer]) }} @endif" method="POST">
        @csrf
        @if($budgetStateChange->exists)
            @method('PATCH')
        @endif

        <div class="mb-3">
            <label for="budget-state-change-capitol-id" class="form-label">Kapitola rozpočtu</label>
            <select name="budget_state_change_capitol_id" id="budget-state-change-capitol-id"
                    @class(['form-select', 'is-invalid' => $errors->has('budget_state_change_capitol_id')])>
                @foreach($budgetCapitols as $budgetCapitol)
                    <option value="{{ $budgetCapitol->id }}"
                            @selected(old('budget_state_change_capitol_id', $budgetStateChange->budget_capitol_id) == $budgetCapitol->id)>
                        {{ $budgetCapitol->number }} – {{ $budgetCapitol->name }}
                    </option>
                @endforeach
            </select>
            @error('budget_state_change_capitol_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-check form-switch mb-3">
            <input class="form-check-input" type="checkbox" name="budget_state_change_is_increase"
                   value="on" role="switch"
                   id="budget-state-change-is-increase-input"
                   @checked(old('budget_state_change_is_increase', $budgetStateChange->is_increase ? 'on' : false) == 'on')>
            <label class="form-check-label" for="budget-state-change-is-increase-input">
                Tato změna je přičtení k výsledku simulace
            </label>
        </div>

        <div class="form-check form-switch mb-3">
            <input class="form-check-input" type="checkbox" name="budget_state_change_is_expense"
                   value="on" role="switch"
                   id="budget-state-change-is-expense-input"
                   @checked(old('budget_state_change_is_expense', $budgetStateChange->is_expense ? 'on' : false) == 'on')>
            <label class="form-check-label" for="budget-state-change-is-expense-input">
                Tato změna je výdaj
            </label>
        </div>

        <div class="mb-3">
            <label for="budget-state-change-first-year-input" class="form-label">Změna 1. rok</label>
            <input type="number" name="budget_state_change_first_year"
                   value="{{ old('budget_state_change_first_year', $budgetStateChange->first_year) }}"
                   id="budget-state-change-first-year-input"
                   @class(['form-control', 'is-invalid' => $errors->has('budget_state_change_first_year')])
                   min="0" required>
            @error('budget_state_change_first_year')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="budget-state-change-first-year-input" class="form-label">Změna 2. rok</label>
            <input type="number" name="budget_state_change_second_year"
                   value="{{ old('budget_state_change_second_year', $budgetStateChange->second_year) }}"
                   id="budget-state-change-second-year-input"
                   @class(['form-control', 'is-invalid' => $errors->has('budget_state_change_second_year')])
                   min="0" required>
            @error('budget_state_change_second_year')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="budget-state-change-first-year-input" class="form-label">Změna 3. rok</label>
            <input type="number" name="budget_state_change_third_year"
                   value="{{ old('budget_state_change_third_year', $budgetStateChange->third_year) }}"
                   id="budget-state-change-third-year-input"
                   @class(['form-control', 'is-invalid' => $errors->has('budget_state_change_third_year')])
                   min="0" required>
            @error('budget_state_change_third_year')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">@if($budgetStateChange->exists) Upravit @else Přidat @endif</button>
    </form>
</x-admin.layout>
