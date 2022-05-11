<x-admin.layout>
    <x-slot:title>
        Odpověď ID {{ $answer->id }}
    </x-slot:title>

    <x-slot:description>
        Pro otázku ID {{ $question->id }} (č. {{ $question->number }} – {{ $question->title }})
    </x-slot:description>

    <h4>Titulek</h4>
    <div class="item-value mb-3">{{ $answer->title }}</div>

    <h4>Popis</h4>
    <div class="item-value mb-3">{{ $answer->description }}</div>

    <h4>Změna stavu rozpočtu</h4>
    <div class="item-value mb-3">
        @if(empty($answer->budgetStateChange))
            <a href="{{ route("admin.questions.answers.budget_state_change.create", [$question, $answer]) }}">Přidat změnu stavu rozpočtu</a>
        @else
            <a href="{{ route("admin.questions.answers.budget_state_change.show", [$question, $answer, $answer->budgetStateChange]) }}">Zobrazit změnu stavu rozpočtu</a>
        @endif
    </div>

    <div class="mt-3">
        <x-admin.button-edit :href="route('admin.questions.answers.edit', [$question, $answer])" />
        <x-admin.button-delete :href="route('admin.questions.answers.destroy', [$question, $answer])" />
        <x-admin.button-back :href="route('admin.questions.show', $question)">Zpět na otázku</x-admin.button-back>
    </div>
</x-admin.layout>
