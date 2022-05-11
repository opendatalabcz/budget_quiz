<x-admin.layout>
    <x-slot:title>Kraje</x-slot:title>
    <x-slot:description>Zde definované kraje se zobrazují ve výběru krajů v dotazníku před spuštěním kvízu</x-slot:description>

    <x-admin.button-add :href="route('admin.regions.create')" />

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Název</th>
                        <th>Akce</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($regions as $region)
                    <tr>
                        <td>{{ $region->id }}</td>
                        <td>{{ $region->name }}</td>
                        <td class="actions-col">
                            <x-admin.button-icon-edit :href="route('admin.regions.edit', $region)" />
                            <x-admin.button-icon-delete :href="route('admin.regions.destroy', $region)" />
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">
                            Žádný kraj nebyl nalezen. <a href="{{ route('admin.regions.create') }}">Přidat nový kraj</a>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
</x-admin.layout>
