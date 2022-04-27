<x-admin.layout>
    <x-slot:title>Otázky</x-slot:title>
    <x-slot:description>Zde jsou definované kvízové otázky</x-slot:description>

    <x-admin.button-add :href="route('admin.questions.create')" />

        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Číslo</td>
                    <td>Titulek</td>
                    <td>Akce</td>
                </tr>
                </thead>
                <tbody>
                @forelse ($questions as $question)
                    <tr>
                        <td>{{ $question->id }}</td>
                        <td>{{ $question->number }}</td>
                        <td>{{ $question->title }}</td>
                        <td class="actions-col">
                            <x-admin.button-icon-show :href="route('admin.questions.show', $question)" />
                            <x-admin.button-icon-edit :href="route('admin.questions.edit', $question)" />
                            <x-admin.button-icon-delete :href="route('admin.questions.destroy', $question)" />
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">
                            Žádná otázka nebyla nalezena. <a href="{{ route('admin.questions.create') }}">Přidat novou otázku</a>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
</x-admin.layout>
