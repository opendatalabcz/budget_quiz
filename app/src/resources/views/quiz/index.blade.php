<x-layout>
    <h1>Kvíz</h1>
    <form action="{{ route('quiz.store') }}" method="POST" class="questionnaire">
        @csrf

        <div class="mb-3">
            <label for="quiz-age-input" class="form-label">Vyplňte Váš věk</label>
            <input type="number" name="quiz_age"
                   id="quiz-age-input"
                   value="{{ old('quiz_age') }}"
                   @class(['form-control', 'is-invalid' => $errors->has('quiz_age')])
                   min="0" max="150" required>
            @error('quiz_age')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="quiz-region-input" class="form-label">Zvolte kraj, ve kterém bydlíte</label>
            <select name="quiz_region" id="quiz-region-input"
                    @class(['form-select', 'is-invalid' => $errors->has('quiz_region')])
                    required>
                @foreach($regions as $region)
                    <option value="{{ $region->id }}" @selected(old('quiz_region') == $region->id)>{{ $region->name }}</option>
                @endforeach
            </select>
            @error('quiz_region')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="quiz-education-input" class="form-label">Zvolte Vámi dosažené nejvyšší vzdělání</label>
            <select name="quiz_education" id="quiz-education-input"
                    @class(['form-select', 'is-invalid' => $errors->has('quiz_education')])
                    required>
                @foreach($educations as $education)
                    <option value="{{ $education->id }}" @selected(old('quiz_education') == $education->id)>{{ $education->name }}</option>
                @endforeach
            </select>
            @error('quiz_education')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="quiz-party-input" class="form-label">Kterou stranu by jste volil(a)?</label>
            <select name="quiz_party" id="quiz-party-input"
                    @class(['form-select', 'is-invalid' => $errors->has('quiz_party')])
                    required>
                @foreach($parties as $party)
                    <option value="{{ $party->id }}" @selected(old('quiz_party') == $party->id)>
                        @if(empty($party->name))
                            {{ $party->short_name }}
                        @else
                            {{ $party->short_name }} – {{ $party->name }}
                        @endif
                    </option>
                @endforeach
            </select>
            @error('quiz_party')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Přejít ke kvízu</button>
        </div>
    </form>
</x-layout>
