<x-admin.layout>
    <x-slot:title>Strany</x-slot:title>
    <x-slot:description>Zde definované politické strany se zobrazují v dotazníku před spuštěním kvízu</x-slot:description>

    <x-admin.button-add :href="route('admin.parties.create')" />

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
                        <x-admin.button-icon-edit :href="route('admin.parties.edit', $party)" />
                        <x-admin.button-icon-delete :href="route('admin.parties.destroy', $party)" />
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">
                        Žádná politická strana nebyla nalezena. <a href="{{ route('admin.parties.create') }}">Přidat novou politickou stranu</a>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</x-admin.layout>
