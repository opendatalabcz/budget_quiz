<x-admin.layout>
    <x-slot:title>Kapitoly státního rozpočtu</x-slot:title>
    <x-slot:description>Zde jsou definované kapitoly státního rozpočtu, ke kterým se může přiřadit počáteční stav státního rozpočtu</x-slot:description>

    <x-admin.button-add :href="route('admin.budget_capitols.create')" />

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
                @forelse ($budgetCapitols as $budgetCapitol)
                    <tr>
                        <td>{{ $budgetCapitol->id }}</td>
                        <td>{{ $budgetCapitol->number }}</td>
                        <td>{{ $budgetCapitol->name }}</td>
                        <td>
                            @if(empty($budgetCapitol->budgetState))
                                <a href="{{ route("admin.budget_capitols.budget_state.create", $budgetCapitol) }}">Přidat stav rozpočtu</a>
                            @else
                                <a href="{{ route("admin.budget_capitols.budget_state.show", [$budgetCapitol, $budgetCapitol->budgetState]) }}">Zobrazit stav rozpočtu</a>
                            @endif
                        </td>
                        <td class="actions-col">
                            <x-admin.button-icon-edit :href="route('admin.budget_capitols.edit', $budgetCapitol)" />
                            <x-admin.button-icon-delete :href="route('admin.budget_capitols.destroy', $budgetCapitol)" />
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">
                            Žádná kapitola státního rozpočtu nebyla nalezena. <a href="{{ route('admin.budget_capitols.create') }}">Přidat novou kapitolu státního rozpočtu</a>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
</x-admin.layout>
