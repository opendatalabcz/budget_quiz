<x-admin.layout>
    <x-slot:title>Vzdělání</x-slot:title>
    <x-slot:description>Zde definované vzdělání se zobrazují ve výběru vzdělání v dotazníku před spuštěním kvízu</x-slot:description>

    <x-admin.button-add :href="route('admin.educations.create')" />

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
                @forelse ($educations as $education)
                    <tr>
                        <td>{{ $education->id }}</td>
                        <td>{{ $education->name }}</td>
                        <td class="actions-col">
                            <x-admin.button-icon-edit :href="route('admin.educations.edit', $education)" />
                            <x-admin.button-icon-delete :href="route('admin.educations.destroy', $education)" />
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">
                            Žádné vzdělání nebylo nalezeno. <a href="{{ route('admin.educations.create') }}">Přidat nové vzdělání</a>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
</x-admin.layout>
