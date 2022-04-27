<x-admin.layout>
    <x-slot:title>
        Stav státního rozpočtu ID {{ $budgetState->id }}
    </x-slot:title>

    <x-slot:description>
        Pro kapitolu státního rozpočtu ID {{ $budgetCapitol->id }} ({{ $budgetCapitol->number }} – {{ $budgetCapitol->name }})
    </x-slot:description>

    <div class="row">
        <dt class="col-sm-3">Příjem 1. rok</dt>
        <dd class="col-sm-9">{{ $budgetState->income_first_year }}</dd>

        <dt class="col-sm-3">Příjem 2. rok</dt>
        <dd class="col-sm-9">{{ $budgetState->income_second_year }}</dd>

        <dt class="col-sm-3">Příjem 3. rok</dt>
        <dd class="col-sm-9">{{ $budgetState->income_third_year }}</dd>

        <dt class="col-sm-3">Výdaj 1. rok</dt>
        <dd class="col-sm-9">{{ $budgetState->expense_first_year }}</dd>

        <dt class="col-sm-3">Výdaj 2. rok</dt>
        <dd class="col-sm-9">{{ $budgetState->expense_second_year }}</dd>

        <dt class="col-sm-3">Výdaj 3. rok</dt>
        <dd class="col-sm-9">{{ $budgetState->expense_third_year }}</dd>
    </div>

    <div class="mt-3">
        <a href="{{ route('admin.budget_capitols.budget_state.edit', [$budgetCapitol, $budgetState]) }}" class="btn btn-primary">Upravit</a>

        <form action="{{ route('admin.budget_capitols.budget_state.destroy', [$budgetCapitol, $budgetState]) }}" method="POST" class="d-inline-block mx-2">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Smazat</button>
        </form>

        <a href="{{ route('admin.budget_capitols.index') }}" class="btn btn-secondary">Zpět na výpis kapitol</a>
    </div>
</x-admin.layout>
