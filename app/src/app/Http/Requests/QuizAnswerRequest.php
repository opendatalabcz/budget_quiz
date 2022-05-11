<?php

namespace App\Http\Requests;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Foundation\Http\FormRequest;

class QuizAnswerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * User is always authorized for this request
     * @return true
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'hash' => [
                'required',
                'exists:\App\Models\Quiz,hash'
            ],
            'question_id' => [
                'required',
                'exists:\App\Models\Question,id'
            ],
            'answer_id' => [
                'required',
                'exists:\App\Models\Answer,id'
            ]
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'hash.required' => 'Hash musí být zadán',
            'hash.exists' => 'Kvíz se zadaným hashem nebyl nalezen',
            'question_id.required' => 'Otázka musí být zadána',
            'question_id.exists' => 'Otázka nebyla nalezena',
            'answer_id.required' => 'Odpověď musí být zadána',
            'answer_id.exists' => 'Odpověď nebyla nalezena',
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $validated = $validator->validated();

            $quiz = Quiz::firstWhere('hash', $validated['hash']);

            if ($quiz->answers->contains($validated['answer_id'])) {
                $validator->errors()->add('answer_id', 'Tato odpověď je již zaznamenána');
            }

            $answeredQuestions = $quiz->answers->map(function ($answer, $key) {
               return $answer->question;
            });

            if ($answeredQuestions->contains($validated['question_id'])) {
                $validator->errors()->add('question_id', 'Tato otázka již byla zodpovězena');
            }

            $question = Question::where('id', $validated['question_id'])->firstOr(function() use ($validator) {
                $validator->errors()->add('question_id', 'Taková otázka neexistuje');
            });

            if (!$question->answers->contains($validated['answer_id'])) {
                $validator->errors()->add('question_id', 'Tato otázka nemá takovou odpověď');
            }
        });
    }
}
