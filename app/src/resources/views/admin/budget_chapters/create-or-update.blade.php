<x-admin.layout>
    <x-slot:title>
        @if($budgetChapter->exists)
            Upravit kapitolu státního rozpočtu ID {{ $budgetChapter->id }}
        @else
            Přidat novou kapitolu státního rozpočtu
        @endif
    </x-slot:title>

    <form action="@if($budgetChapter->exists) {{ route('admin.budget_chapters.update', $budgetChapter)  }} @else {{ route('admin.budget_chapters.store') }} @endif" method="POST">
        @csrf
        @if($budgetChapter->exists)
            @method('PATCH')
        @endif
        <div class="mb-3">
            <label for="budget-chapter-number-input" class="form-label">Číslo</label>
            <input type="number" name="budget_chapter_number"
                   value="{{ old('budget_chapter_number', $budgetChapter->number) }}"
                   id="budget-chapter-number-input"
                   @class(['form-control', 'is-invalid' => $errors->has('budget_chapter_number')])
                   required>
            @error('budget_chapter_number')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="budget-chapter-name-input" class="form-label">Název</label>
            <input type="text" name="budget_chapter_name"
                   value="{{ old('budget_chapter_name', $budgetChapter->name) }}"
                   id="budget-chapter-name-input"
                   @class(['form-control', 'is-invalid' => $errors->has('budget_chapter_name')])
                   maxlength="100" required>
            @error('budget_chapter_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">@if($budgetChapter->exists) Upravit @else Přidat @endif</button>
    </form>
</x-admin.layout>
