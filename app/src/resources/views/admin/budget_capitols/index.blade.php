<x-admin.layout>
    <x-slot:title>Kapitoly státního rozpočtu</x-slot:title>
    <x-slot:description>Zde jsou definované kapitoly státního rozpočtu, ke kterým se může přiřadit počáteční stav státního rozpočtu</x-slot:description>

    <a href="{{ route('admin.budget_capitols.create') }}" class="btn btn-success">Přidat</a>

        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Číslo</td>
                    <td>Název</td>
                    <td>Stav rozpočtu</td>
                    <td>Akce</td>
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
                            <a href="{{ route("admin.budget_capitols.edit", $budgetCapitol) }}" class="btn">
                                <i class="bi-pencil-square text-info"></i>
                            </a>
                            <form action="{{ route('admin.budget_capitols.destroy', $budgetCapitol) }}" method="POST" class="edit-button">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn"><i class="bi-trash text-danger"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">
                            Žádná kapitola státního rozpočtu nebyla nalezena. <a href="{{ route('admin.budget_capitols.create') }}">Přidat novou kapitolu státního rozpočtu</a>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
</x-admin.layout>
