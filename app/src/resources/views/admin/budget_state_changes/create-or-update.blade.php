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
            <label for="budget-state-change-chapter-id" class="form-label">Kapitola rozpočtu</label>
            <select name="budget_state_change_chapter_id" id="budget-state-change-chapter-id"
                    @class(['form-select', 'is-invalid' => $errors->has('budget_state_change_chapter_id')])>
                @foreach($budgetChapters as $budgetChapter)
                    <option value="{{ $budgetChapter->id }}"
                            @selected(old('budget_state_change_chapter_id', $budgetStateChange->budget_chapter_id) == $budgetChapter->id)>
                        {{ $budgetChapter->number }} – {{ $budgetChapter->name }}
                    </option>
                @endforeach
            </select>
            @error('budget_state_change_chapter_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="row">
            <div class="col-md-6">
                <h3>Změna příjmů</h3>
                <p>Pro snížení příjmů zadejte číslo se záporným znamínkem (-), pro zvýšení zadejte číslo bez znamínka.</p>

                <label for="budget-state-change-income-first-year-input" class="form-label">{{ config('app.first_year') }}</label>
                <div class="input-group mb-3">
                    <input type="number" name="budget_state_change_income_first_year"
                           value="{{ old('budget_state_change_income_first_year', $budgetStateChange->income_first_year) }}"
                           id="budget-state-change-income-first-year-input"
                           @class(['form-control', 'is-invalid' => $errors->has('budget_state_change_income_first_year')])
                           required>
                    <div class="input-group-append">
                        <span class="input-group-text">Kč</span>
                    </div>
                    @error('budget_state_change_income_first_year')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <label for="budget-state-change-income-second-year-input" class="form-label">{{ config('app.second_year') }}</label>
                <div class="input-group mb-3">
                    <input type="number" name="budget_state_change_income_second_year"
                           value="{{ old('budget_state_change_income_second_year', $budgetStateChange->income_second_year) }}"
                           id="budget-state-change-income-second-year-input"
                           @class(['form-control', 'is-invalid' => $errors->has('budget_state_change_income_second_year')])
                           required>
                    <div class="input-group-append">
                        <span class="input-group-text">Kč</span>
                    </div>
                    @error('budget_state_change_income_second_year')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <label for="budget-state-change-income-third-year-input" class="form-label">{{ config('app.third_year') }}</label>
                <div class="input-group mb-3">
                    <input type="number" name="budget_state_change_income_third_year"
                           value="{{ old('budget_state_change_income_third_year', $budgetStateChange->income_third_year) }}"
                           id="budget-state-change-income-third-year-input"
                           @class(['form-control', 'is-invalid' => $errors->has('budget_state_change_income_third_year')])
                           required>
                    <div class="input-group-append">
                        <span class="input-group-text">Kč</span>
                    </div>
                    @error('budget_state_change_income_third_year')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <h3>Změna výdajů</h3>
                <p>Pro snížení výdajů zadejte číslo se záporným znamínkem (-), pro zvýšení zadejte číslo bez znamínka.</p>

                <label for="budget-state-change-expense-first-year-input" class="form-label">{{ config('app.first_year') }}</label>
                <div class="input-group mb-3">
                    <input type="number" name="budget_state_change_expense_first_year"
                           value="{{ old('budget_state_change_expense_first_year', $budgetStateChange->expense_first_year) }}"
                           id="budget-state-change-expense-first-year-input"
                           @class(['form-control', 'is-invalid' => $errors->has('budget_state_change_expense_first_year')])
                           required>
                    <div class="input-group-append">
                        <span class="input-group-text">Kč</span>
                    </div>
                    @error('budget_state_change_expense_first_year')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <label for="budget-state-change-expense-second-year-input" class="form-label">{{ config('app.second_year') }}</label>
                <div class="input-group mb-3">
                    <input type="number" name="budget_state_change_expense_second_year"
                           value="{{ old('budget_state_change_expense_second_year', $budgetStateChange->expense_second_year) }}"
                           id="budget-state-change-expense-second-year-input"
                           @class(['form-control', 'is-invalid' => $errors->has('budget_state_change_expense_second_year')])
                           required>
                    <div class="input-group-append">
                        <span class="input-group-text">Kč</span>
                    </div>
                    @error('budget_state_change_expense_second_year')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <label for="budget-state-change-expense-third-year-input" class="form-label">{{ config('app.third_year') }}</label>
                <div class="input-group mb-3">
                    <input type="number" name="budget_state_change_expense_third_year"
                           value="{{ old('budget_state_change_expense_third_year', $budgetStateChange->expense_third_year) }}"
                           id="budget-state-change-expense-third-year-input"
                           @class(['form-control', 'is-invalid' => $errors->has('budget_state_change_expense_third_year')])
                           required>
                    <div class="input-group-append">
                        <span class="input-group-text">Kč</span>
                    </div>
                    @error('budget_state_change_expense_third_year')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">@if($budgetStateChange->exists) Upravit @else Přidat @endif</button>
    </form>
</x-admin.layout>
