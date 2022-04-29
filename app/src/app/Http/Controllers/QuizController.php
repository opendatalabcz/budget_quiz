<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuizRequest;
use App\Models\Education;
use App\Models\Party;
use App\Models\Region;
use Illuminate\Http\Request;

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
    }

    public function results()
    {

    }
}
