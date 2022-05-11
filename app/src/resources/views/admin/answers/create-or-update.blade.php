<x-admin.layout>
    <x-slot:title>
        @if($answer->exists)
            Upravit odpověď ID {{ $answer->id }}
        @else
            Přidat odpověď
        @endif
    </x-slot:title>

    <x-slot:description>
        Pro otázku ID {{ $question->id }} (č. {{ $question->number }} – {{ $question->title }})
    </x-slot:description>

    <form action="@if($answer->exists) {{ route('admin.questions.answers.update', [$question, $answer])  }} @else {{ route('admin.questions.answers.store', $question) }} @endif" method="POST">
        @csrf
        @if($answer->exists)
            @method('PATCH')
        @endif

        <div class="mb-3">
            <label for="answer-title-input" class="form-label">Titulek</label>
            <input type="text" name="answer_title"
                   value="{{ old('answer_title', $answer->title) }}"
                   id="answer-title-input"
                   @class(['form-control', 'is-invalid' => $errors->has('answer_title')])
                   maxlength="100" required>
            @error('answer_title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="answer-description-input" class="form-label">Popis</label>
            <textarea name="answer_description"
                      id="answer-description-input"
                      @class(['form-control', 'is-invalid' => $errors->has('answer_description')])
                      required>{{ old('answer_description', $answer->description) }}</textarea>
            @error('answer_description')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">@if($answer->exists) Upravit @else Přidat @endif</button>
    </form>
</x-admin.layout>
