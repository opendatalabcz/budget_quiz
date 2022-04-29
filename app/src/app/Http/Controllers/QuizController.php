<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuizRequest;
use App\Models\Education;
use App\Models\Party;
use App\Models\Quiz;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class QuizController extends Controller
{
    public function index()
    {
        return view('quiz.index', [
            'educations' => Education::all(),
            'parties' => Party::all(),
            'regions' => Region::all()
        ]);
    }

    public function store(QuizRequest $request)
    {
        $validated = $request->validated();

        $hash = Hash::make(time() . Session::getId());

        $quiz = new Quiz;

        $quiz->hash = $hash;
        $quiz->age = $validated['quiz_age'];

        $quiz->region()->associate($validated['quiz_region']);
        $quiz->party()->associate($validated['quiz_party']);
        $quiz->education()->associate($validated['quiz_education']);

        $quiz->save();

        return redirect()->route('quiz.show', $quiz);
    }

    public function show(Quiz $quiz)
    {
        return $quiz;
    }

    public function results()
    {

    }
}
