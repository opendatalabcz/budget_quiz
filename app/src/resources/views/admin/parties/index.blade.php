<x-admin.layout>
    <x-slot:title>Strany</x-slot:title>
    <x-slot:description>Zde definované politické strany se zobrazují v dotazníku před spuštěním kvízu</x-slot:description>

    <a href="{{ route('admin.parties.create') }}" class="btn btn-success">Přidat</a>

    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <td>ID</td>
                <td>Zkratka</td>
                <td>Název</td>
                <td>Akce</td>
            </tr>
            </thead>
            <tbody>
            @forelse ($parties as $party)
                <tr>
                    <td>{{ $party->id }}</td>
                    <td>{{ $party->short_name }}</td>
                    <td>{{ $party->name }}</td>
                    <td class="actions-col">
                        <a href="{{ route("admin.parties.edit", $party) }}" class="btn">
                            <i class="bi-pencil-square text-info"></i>
                        </a>
                        <form action="{{ route('admin.parties.destroy', $party) }}" method="POST" class="edit-button">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn"><i class="bi-trash text-danger"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">
                        Žádná politická strana nebyla nalezena. <a href="{{ route('admin.parties.create') }}">Přidat novou politickou stranu</a>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</x-admin.layout>
