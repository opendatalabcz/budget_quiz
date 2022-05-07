<x-admin.layout>
    <x-slot:title>
        Změna stavu rozpočtu ID {{ $budgetStateChange->id }}
    </x-slot:title>

    <x-slot:description>
        Pro odpověď ID {{ $answer->id }} ({{ $answer->title }})
    </x-slot:description>

    <h4>Kapitola rozpočtu</h4>
    <div class="item-value mb-3">{{ $budgetStateChange->budgetChapter->number }} – {{ $budgetStateChange->budgetChapter->name }}</div>


    <div class="row">
        <div class="col-md-6">
            <h3>Změna příjmů</h3>

            <h4>{{ config('app.first_year') }}</h4>
            <div class="item-value mb-3">{{ number_format($budgetStateChange->income_first_year, 0, null, ' ') }}&nbsp;Kč</div>

            <h4>{{ config('app.second_year') }}</h4>
            <div class="item-value mb-3">{{ number_format($budgetStateChange->income_second_year, 0, null, ' ') }}&nbsp;Kč</div>

            <h4>{{ config('app.third_year') }}</h4>
            <div class="item-value mb-3">{{ number_format($budgetStateChange->income_third_year, 0, null, ' ') }}&nbsp;Kč</div>
        </div>

        <div class="col-md-6">
            <h3>Změna výdajů</h3>

            <h4>{{ config('app.first_year') }}</h4>
            <div class="item-value mb-3">{{ number_format($budgetStateChange->expense_first_year, 0, null, ' ') }}&nbsp;Kč</div>

            <h4>{{ config('app.second_year') }}</h4>
            <div class="item-value mb-3">{{ number_format($budgetStateChange->expense_second_year, 0, null, ' ') }}&nbsp;Kč</div>

            <h4>{{ config('app.third_year') }}</h4>
            <div class="item-value mb-3">{{ number_format($budgetStateChange->expense_third_year, 0, null, ' ') }}&nbsp;Kč</div>
        </div>
    </div>

    <div class="mt-3">
        <x-admin.button-edit :href="route('admin.questions.answers.budget_state_change.edit', [$question, $answer, $budgetStateChange])" />
        <x-admin.button-delete :href="route('admin.questions.answers.budget_state_change.destroy', [$question, $answer, $budgetStateChange])" />
        <x-admin.button-back :href="route('admin.questions.answers.show', [$question, $answer])">Zpět na odpověď</x-admin.button-back>
    </div>
</x-admin.layout>
