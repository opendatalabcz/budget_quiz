<x-admin.layout>
    <x-slot:title>
        @if($budgetState->exists)
            Upravit počáteční stav státního rozpočtu ID {{ $budgetState->id }}
        @else
            Přidat počáteční stav státního rozpočtu
        @endif
    </x-slot:title>

    <x-slot:description>
        Pro kapitolu státního rozpočtu ID {{ $budgetChapter->id }} ({{ $budgetChapter->number }} – {{ $budgetChapter->name }})
    </x-slot:description>

    <form action="@if($budgetState->exists) {{ route('admin.budget_chapters.budget_state.update', [$budgetChapter, $budgetState])  }} @else {{ route('admin.budget_chapters.budget_state.store', $budgetChapter) }} @endif" method="POST">
        @csrf
        @if($budgetState->exists)
            @method('PATCH')
        @endif

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="budget-state-income-first-year-input" class="form-label">Příjem 1. rok</label>
                    <input type="number" name="budget_state_income_first_year"
                           value="{{ old('budget_state_income_first_year', $budgetState->income_first_year) }}"
                           id="budget-state-income-first-year-input"
                           @class(['form-control', 'is-invalid' => $errors->has('budget_state_income_first_year')])
                           min="0" required>
                    @error('budget_state_income_first_year')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="budget-state-income-first-year-input" class="form-label">Příjem 2. rok</label>
                    <input type="number" name="budget_state_income_second_year"
                           value="{{ old('budget_state_income_second_year', $budgetState->income_second_year) }}"
                           id="budget-state-income-second-year-input"
                           @class(['form-control', 'is-invalid' => $errors->has('budget_state_income_second_year')])
                           min="0" required>
                    @error('budget_state_income_second_year')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="budget-state-income-first-year-input" class="form-label">Příjem 3. rok</label>
                    <input type="number" name="budget_state_income_third_year"
                           value="{{ old('budget_state_income_third_year', $budgetState->income_third_year) }}"
                           id="budget-state-income-third-year-input"
                           @class(['form-control', 'is-invalid' => $errors->has('budget_state_income_third_year')])
                           min="0" required>
                    @error('budget_state_income_third_year')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="budget-state-expense-first-year-input" class="form-label">Výdaj 1. rok</label>
                    <input type="number" name="budget_state_expense_first_year"
                           value="{{ old('budget_state_expense_first_year', $budgetState->expense_first_year) }}"
                           id="budget-state-expense-first-year-input"
                           @class(['form-control', 'is-invalid' => $errors->has('budget_state_expense_first_year')])
                           min="0" required>
                    @error('budget_state_expense_first_year')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="budget-state-expense-second-year-input" class="form-label">Výdaj 2. rok</label>
                    <input type="number" name="budget_state_expense_second_year"
                           value="{{ old('budget_state_expense_second_year', $budgetState->expense_second_year) }}"
                           id="budget-state-expense-second-year-input"
                           @class(['form-control', 'is-invalid' => $errors->has('budget_state_expense_second_year')])
                           min="0" required>
                    @error('budget_state_expense_second_year')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="budget-state-expense-third-year-input" class="form-label">Výdaj 3. rok</label>
                    <input type="number" name="budget_state_expense_third_year"
                           value="{{ old('budget_state_expense_third_year', $budgetState->expense_third_year) }}"
                           id="budget-state-expense-third-year-input"
                           @class(['form-control', 'is-invalid' => $errors->has('budget_state_expense_third_year')])
                           min="0" required>
                    @error('budget_state_expense_third_year')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">@if($budgetState->exists) Upravit @else Přidat @endif</button>
    </form>
</x-admin.layout>
