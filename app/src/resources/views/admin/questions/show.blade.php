<x-admin.layout>
    <x-slot:title>
       Otázka ID {{ $question->id }}
    </x-slot:title>

    <div class="row">
        <div class="col-md-6">
            <h4>Číslo otázky</h4>
            {{ $question->number }}

            <h4>Titulek</h4>
            {{ $question->title }}

            <h4>Popis</h4>
            {{ $question->description }}
        </div>
        <div class="col-md-6">
            <h2>Odpovědi</h2>
        </div>
    </div>

    <div class="mt-3">
        <x-admin.button-edit :href="route('admin.questions.edit', $question)" />
        <x-admin.button-delete :href="route('admin.questions.destroy', $question)" />
        <x-admin.button-back :href="route('admin.questions.index')">Zpět na výpis otázek</x-admin.button-back>
    </div>
</x-admin.layout>
