<x-admin.layout>
    <x-slot:title>
        Stav státního rozpočtu ID {{ $budgetState->id }}
    </x-slot:title>

    <x-slot:description>
        Pro kapitolu státního rozpočtu ID {{ $budgetChapter->id }} ({{ $budgetChapter->number }} – {{ $budgetChapter->name }})
    </x-slot:description>

    <div class="row">
        <div class="col-md-6">
            <h2>Příjmy</h2>

            <h4>{{ config('app.first_year') }}</h4>
            <div class="item-value mb-3">{{ number_format($budgetState->income_first_year, 0, null, ' ') }}&nbsp;Kč</div>

            <h4>{{ config('app.second_year') }}</h4>
            <div class="item-value mb-3">{{ number_format($budgetState->income_second_year, 0, null, ' ') }}&nbsp;Kč</div>

            <h4>{{ config('app.first_year') }}</h4>
            <div class="item-value mb-3">{{ number_format($budgetState->income_third_year, 0, null, ' ') }}&nbsp;Kč</div>
        </div>

        <div class="col-md-6">
            <h2>Výdaje</h2>

            <h4>{{ config('app.first_year') }}</h4>
            <div class="item-value mb-3">{{ number_format($budgetState->expense_first_year, 0, null, ' ') }}&nbsp;Kč</div>

            <h4>{{ config('app.second_year') }}</h4>
            <div class="item-value mb-3">{{ number_format($budgetState->expense_second_year, 0, null, ' ') }}&nbsp;Kč</div>

            <h4>{{ config('app.first_year') }}</h4>
            <div class="item-value mb-3">{{ number_format($budgetState->expense_third_year, 0, null, ' ') }}&nbsp;Kč</div>

        </div>
    </div>

    <div class="mt-3">
        <x-admin.button-edit :href="route('admin.budget_chapters.budget_state.edit', [$budgetChapter, $budgetState])" />
        <x-admin.button-delete :href="route('admin.budget_chapters.budget_state.destroy', [$budgetChapter, $budgetState])" />
        <x-admin.button-back :href="route('admin.budget_chapters.index')">Zpět na výpis kapitol</x-admin.button-back>
    </div>
</x-admin.layout>
