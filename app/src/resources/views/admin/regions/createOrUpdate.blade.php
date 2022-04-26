<x-admin.layout>
    <x-slot:title>
        @if($region->exists)
            Upravit kraj ID {{ $region->id  }}
        @else
            Přidat nový kraj
        @endif
    </x-slot:title>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="@if($region->exists) {{ route('admin.regions.update', $region)  }} @else {{ route('admin.regions.store') }} @endif" method="POST">
        @csrf
        @if($region->exists)
            @method('PATCH')
        @endif
        <div class="mb-3">
            <label for="name-input" class="form-label">Název</label>
            <input type="text" name="name" value="{{ old('name', $region->name) }}" id="name-input" class="form-control" maxlength="100" required>
        </div>
        <button type="submit" class="btn btn-primary">@if($region->exists) Upravit @else Přidat @endif</button>
    </form>
</x-admin.layout>
