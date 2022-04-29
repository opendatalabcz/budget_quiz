<x-admin.layout>
    <x-slot:title>
        Změna stavu rozpočtu ID {{ $budgetStateChange->id }}
    </x-slot:title>

    <x-slot:description>
        Pro odpověď ID {{ $answer->id }} ({{ $answer->title }})
    </x-slot:description>

    <h4>Kapitola rozpočtu</h4>
    <div class="item-value mb-3">{{ $budgetStateChange->budgetChapter->number }} – {{ $budgetStateChange->budgetChapter->name }}</div>

    <h4>Typ</h4>
    <div class="item-value mb-3">{{ $budgetStateChange->is_increase ? 'Zvýšení' : 'Snížení'}} {{ $budgetStateChange->is_expense ? 'výdajů' : 'příjmů' }}</div>

    <h4>Změna 1. rok</h4>
    <div class="item-value mb-3">{{ $budgetStateChange->first_year }}</div>

    <h4>Změna 2. rok</h4>
    <div class="item-value mb-3">{{ $budgetStateChange->second_year }}</div>

    <h4>Změna 3. rok</h4>
    <div class="item-value mb-3">{{ $budgetStateChange->third_year }}</div>

    <div class="mt-3">
        <x-admin.button-edit :href="route('admin.questions.answers.budget_state_change.edit', [$question, $answer, $budgetStateChange])" />
        <x-admin.button-delete :href="route('admin.questions.answers.budget_state_change.destroy', [$question, $answer, $budgetStateChange])" />
        <x-admin.button-back :href="route('admin.questions.answers.show', [$question, $answer])">Zpět na odpověď</x-admin.button-back>
    </div>
</x-admin.layout>
