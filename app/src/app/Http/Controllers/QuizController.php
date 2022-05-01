<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        return view('quiz.index');
    }

    public function quizResults(Quiz $quiz)
    {
        return $quiz;
    }

    public function results()
    {

    }
}
