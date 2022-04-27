<x-admin.layout>
    <x-slot:title>
        Odpověď ID {{ $answer->id }}
    </x-slot:title>

    <x-slot:description>
        Pro otázku ID {{ $question->id }} (č. {{ $question->number }} – {{ $question->title }})
    </x-slot:description>

    <h4>Titulek</h4>
    {{ $question->title }}

    <h4>Popis</h4>
    {{ $question->description }}

    <div class="mt-3">
        <x-admin.button-edit :href="route('admin.questions.answers.edit', [$question, $answer])" />
        <x-admin.button-delete :href="route('admin.questions.answers.destroy', [$question, $answer])" />
        <x-admin.button-back :href="route('admin.questions.show', $question)">Zpět na otázku</x-admin.button-back>
    </div>
</x-admin.layout>
