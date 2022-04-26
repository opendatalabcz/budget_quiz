<x-admin.layout>
    <x-slot:title>Kraje</x-slot:title>
    <x-slot:description>Zde definované kraje se zobrazují ve výběru krajů v dotazníku před spuštěním kvízu</x-slot:description>

    <a href="{{ route('admin.regions.create') }}" class="btn btn-success">Přidat</a>

        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Název</td>
                    <td>Akce</td>
                </tr>
                </thead>
                <tbody>
                @forelse ($regions as $region)
                    <tr>
                        <td>{{ $region->id }}</td>
                        <td>{{ $region->name }}</td>
                        <td class="actions-col">
                            <a href="{{ route("admin.regions.edit", $region) }}" class="btn">
                                <i class="bi-pencil-square text-info"></i>
                            </a>
                            <form action="{{ route('admin.regions.destroy', $region) }}" method="POST" class="edit-button">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn"><i class="bi-trash text-danger"></i></button>
                            </form>
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
