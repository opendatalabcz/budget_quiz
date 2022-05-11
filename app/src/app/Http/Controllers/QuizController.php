<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\BudgetState;
use App\Models\Party;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display page with the quiz
     */
    public function index()
    {
        return view('quiz.index');
    }

    /**
     * Get results for given quiz
     * @param Quiz $quiz
     */
    public function quizResults(Quiz $quiz)
    {
        if ($quiz->is_finished === false) {
            abort(404); // only finished quizzes are allowed
        }

        // get the answers count in finished quizzes
        $answersByTopCount = Answer::withCount(['quizzes' => function(Builder $builder) {
            $builder->where('is_finished', true);
        }])->orderBy('quizzes_count', 'desc')->get();

        $questionIds = []; // determine whether we already got answer for this question
        $topAnswers = $answersByTopCount->filter(function ($answer, $key) use (&$questionIds) {
            if (in_array($answer->question_id, $questionIds)) {
                return false;
            } else {
                $questionIds[] = $answer->question_id;
                return true;
            }
        });

        $questionToAnswer = [];

        foreach ($topAnswers as $top_answer) {
            $questionToAnswer[$top_answer->question_id] = $top_answer;
        }

        $questionToUserAnswer = [];

        foreach ($quiz->answers as $answer) {
            $questionToUserAnswer[$answer->question_id] = $answer;
        }

        // count initial budget state for all 3 years
        $budgetResults = BudgetState::all()->reduce(function($carry, $budgetState) {
            return [
                $carry[0] + $budgetState->income_first_year - $budgetState->expense_first_year,
                $carry[1] + $budgetState->income_second_year - $budgetState->expense_second_year,
                $carry[2] + $budgetState->income_third_year - $budgetState->expense_third_year
            ];
        }, [0, 0, 0]);


        // count all the budget state changes for all 3 years
        $budgetResults = $quiz->answers->reduce(function($carry,  $answer) {
            if ($answer->budgetStateChange) { // this answer has a budget state change assigned
                return [
                    $carry[0] + $answer->budgetStateChange->income_first_year - $answer->budgetStateChange->expense_first_year,
                    $carry[1] + $answer->budgetStateChange->income_second_year - $answer->budgetStateChange->expense_second_year,
                    $carry[2] + $answer->budgetStateChange->income_third_year - $answer->budgetStateChange->expense_third_year
                ];
            } else {
                return $carry;
            }
        }, $budgetResults);

        return view('quiz.quizResult', [
            'quiz' => $quiz,
            'questions' => Question::all()->sortBy('number', SORT_NUMERIC),
            'questionUserAnswer' => $questionToUserAnswer,
            'questionMajorityAnswer' => $questionToAnswer,
            'budgetResults' => $budgetResults
        ]);
    }

    /**
     * Show results from all finished quizzes
     */
    public function results()
    {
        $parties = Party::all();
        $partyToAnswersCount = [];

        // get answer counts for each party and for each question
        foreach ($parties as $party) {
            $answers = Answer::withCount(['quizzes' => function(Builder $builder) use ($party) {
                $builder->where('is_finished', true)
                    ->where('party_id', $party->id);
            }])->get();

            foreach ($answers as $answer) {
                $partyToAnswersCount[$party->id][$answer->id] = $answer->quizzes_count;
            }
        }

        return view('quiz.results', [
            'parties' => $parties,
            'questions' => Question::all()->sortBy('number', SORT_NUMERIC),
            'partyToAnswerCounts' => $partyToAnswersCount
        ]);
    }
}
