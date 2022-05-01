<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuizAnswerRequest;
use App\Http\Requests\QuizRequest;
use App\Http\Resources\BudgetStateResource;
use App\Http\Resources\EducationResource;
use App\Http\Resources\PartyResource;
use App\Http\Resources\QuestionResource;
use App\Http\Resources\RegionResource;
use App\Models\BudgetState;
use App\Models\Education;
use App\Models\Party;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class QuizController extends Controller
{
    public function data()
    {
        return [
            'regions' => RegionResource::collection(Region::all()),
            'educations' => EducationResource::collection(Education::all()),
            'parties' => PartyResource::collection(Party::all()),
            'questions' => QuestionResource::collection(Question::all()->sortBy('number', SORT_NUMERIC)),
            'budget_states' => BudgetStateResource::collection(BudgetState::all())
        ];
    }

    public function store(QuizRequest $request)
    {
        $validated = $request->validated();

        $hash = Hash::make(time() . $request->ip() . random_int(-1000, 1000));

        $quiz = new Quiz;

        $quiz->hash = $hash;
        $quiz->age = $validated['quiz_age'];

        $quiz->region()->associate($validated['quiz_region']);
        $quiz->party()->associate($validated['quiz_party']);
        $quiz->education()->associate($validated['quiz_education']);

        $quiz->save();

        return [
            'hash' => $hash
        ];
    }

    public function answer(QuizAnswerRequest $request)
    {
        $validated = $request->validated();

        $quiz = Quiz::where('hash', $validated['hash'])->firstOrFail();
        $quiz->loadCount('answers');

        $return = [
            'is_finished' => false
        ];

        if ($quiz->answers_count + 1 === Question::all()->count()) {
            $quiz->is_finished = true;
            $quiz->hash = '';

            $return = [
                'is_finished' => true,
                'quiz_id' => $quiz->id,
            ];
        }

        $quiz->answers()->attach($validated['answer_id']);
        $quiz->save();

        return $return;
    }
}
