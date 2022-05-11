<x-admin.layout>
    <x-slot:title>
        @if($question->exists)
            Upravit kapitolu státního rozpočtu ID {{ $question->id }}
        @else
            Přidat novou kapitolu státního rozpočtu
        @endif
    </x-slot:title>

    <form action="@if($question->exists) {{ route('admin.questions.update', $question)  }} @else {{ route('admin.questions.store') }} @endif" method="POST">
        @csrf
        @if($question->exists)
            @method('PATCH')
        @endif
        <div class="mb-3">
            <label for="question-number-input" class="form-label">Číslo otázky</label>
            <input type="number" name="question_number"
                   value="{{ old('question_number', $question->number) }}"
                   id="question-number-input"
                   @class(['form-control', 'is-invalid' => $errors->has('question_number')])
                   required>
            @error('question_number')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="question-title-input" class="form-label">Titulek</label>
            <input type="text" name="question_title"
                   value="{{ old('question_title', $question->title) }}"
                   id="question-title-input"
                   @class(['form-control', 'is-invalid' => $errors->has('question_title')])
                   maxlength="100" required>
            @error('question_title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="question-description-input" class="form-label">Popis</label>
            <textarea name="question_description"
                      id="question-description-input"
                      @class(['form-control', 'is-invalid' => $errors->has('question_description')])
                      required>{{ old('question_description', $question->description) }}</textarea>
            @error('question_description')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">@if($question->exists) Upravit @else Přidat @endif</button>
    </form>
</x-admin.layout>
