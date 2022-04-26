<x-admin.layout>
    <x-slot:title>
        @if($party->exists)
            Upravit politickou stranu ID {{ $party->id  }}
        @else
            Přidat novou politickou stranu
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

    <form action="@if($party->exists) {{ route('admin.parties.update', $party)  }} @else {{ route('admin.parties.store') }} @endif" method="POST">
        @csrf
        @if($party->exists)
            @method('PATCH')
        @endif
        <div class="mb-3">
            <label for="short-name-input" class="form-label">Zkratka</label>
            <input type="text" name="short_name" value="{{ old('short_name', $party->short_name) }}" id="short-name-input" class="form-control" maxlength="50" required>
        </div>

        <div class="mb-3">
            <label for="name-input" class="form-label">Název</label>
            <input type="text" name="name" value="{{ old('name', $party->name) }}" id="name-input" class="form-control" maxlength="150" required>
        </div>

        <button type="submit" class="btn btn-primary">@if($party->exists) Upravit @else Přidat @endif</button>
    </form>
</x-admin.layout>
