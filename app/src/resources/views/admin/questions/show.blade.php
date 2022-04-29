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

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titulek</th>
                            <th>Změna stavu rozpočtu</th>
                            <th>Akce</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($question->answers as $answer)
                        <tr>
                            <td>{{ $answer->id }}</td>
                            <td>{{ $answer->title }}</td>
                            <td>
                                @if(empty($answer->budgetStateChange))
                                    <a href="{{ route("admin.questions.answers.budget_state_change.create", [$question, $answer]) }}">Přidat změnu stavu rozpočtu</a>
                                @else
                                    <a href="{{ route("admin.questions.answers.budget_state_change.show", [$question, $answer, $answer->budgetStateChange]) }}">Zobrazit změnu stavu rozpočtu</a>
                                @endif
                            </td>
                            <td class="actions-col">
                                <x-admin.button-icon-show :href="route('admin.questions.answers.show', [$question, $answer])" />
                                <x-admin.button-icon-edit :href="route('admin.questions.answers.edit', [$question, $answer])" />
                                <x-admin.button-icon-delete :href="route('admin.questions.answers.destroy', [$question, $answer])" />
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">
                                Žádná odpověď nebyla nalezena. <a href="{{ route('admin.questions.answers.create', $question) }}">Přidat novou odpověď</a>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <x-admin.button-edit :href="route('admin.questions.edit', $question)" />
        <x-admin.button-delete :href="route('admin.questions.destroy', $question)" />
        <x-admin.button-back :href="route('admin.questions.index')">Zpět na výpis otázek</x-admin.button-back>
    </div>
</x-admin.layout>
