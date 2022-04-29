<x-admin.layout>
    <x-slot:title>
        Stav státního rozpočtu ID {{ $budgetState->id }}
    </x-slot:title>

    <x-slot:description>
        Pro kapitolu státního rozpočtu ID {{ $budgetChapter->id }} ({{ $budgetChapter->number }} – {{ $budgetChapter->name }})
    </x-slot:description>

    <h4>Příjem 1. rok</h4>
    <div class="item-value mb-3">{{ $budgetState->income_first_year }}</div>

    <h4>Příjem 2. rok</h4>
    <div class="item-value mb-3">{{ $budgetState->income_second_year }}</div>

    <h4>Příjem 3. rok</h4>
    <div class="item-value mb-3">{{ $budgetState->income_third_year }}</div>

    <h4>Výdaj 1. rok</h4>
    <div class="item-value mb-3">{{ $budgetState->expense_first_year }}</div>

    <h4>Výdaj 2. rok</h4>
    <div class="item-value mb-3">{{ $budgetState->expense_second_year }}</div>

    <h4>Výdaj 3. rok</h4>
    <div class="item-value mb-3">{{ $budgetState->expense_third_year }}</div>

    <div class="mt-3">
        <x-admin.button-edit :href="route('admin.budget_chapters.budget_state.edit', [$budgetChapter, $budgetState])" />
        <x-admin.button-delete :href="route('admin.budget_chapters.budget_state.destroy', [$budgetChapter, $budgetState])" />
        <x-admin.button-back :href="route('admin.budget_chapters.index')">Zpět na výpis kapitol</x-admin.button-back>
    </div>
</x-admin.layout>
