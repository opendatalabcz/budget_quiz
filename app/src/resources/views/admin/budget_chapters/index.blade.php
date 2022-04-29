<x-admin.layout>
    <x-slot:title>Kapitoly státního rozpočtu</x-slot:title>
    <x-slot:description>Zde jsou definované kapitoly státního rozpočtu, ke kterým se může přiřadit počáteční stav státního rozpočtu</x-slot:description>

    <x-admin.button-add :href="route('admin.budget_chapters.create')" />

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Číslo</th>
                        <th>Název</th>
                        <th>Stav rozpočtu</th>
                        <th>Akce</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($budgetChapters as $budgetChapter)
                    <tr>
                        <td>{{ $budgetChapter->id }}</td>
                        <td>{{ $budgetChapter->number }}</td>
                        <td>{{ $budgetChapter->name }}</td>
                        <td>
                            @if(empty($budgetChapter->budgetState))
                                <a href="{{ route("admin.budget_chapters.budget_state.create", $budgetChapter) }}">Přidat stav rozpočtu</a>
                            @else
                                <a href="{{ route("admin.budget_chapters.budget_state.show", [$budgetChapter, $budgetChapter->budgetState]) }}">Zobrazit stav rozpočtu</a>
                            @endif
                        </td>
                        <td class="actions-col">
                            <x-admin.button-icon-edit :href="route('admin.budget_chapters.edit', $budgetChapter)" />
                            <x-admin.button-icon-delete :href="route('admin.budget_chapters.destroy', $budgetChapter)" />
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">
                            Žádná kapitola státního rozpočtu nebyla nalezena. <a href="{{ route('admin.budget_chapters.create') }}">Přidat novou kapitolu státního rozpočtu</a>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
</x-admin.layout>
