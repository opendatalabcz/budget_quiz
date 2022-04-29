<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BudgetStateChangeRequest;
use App\Models\Answer;
use App\Models\BudgetChapter;
use App\Models\BudgetStateChange;
use App\Models\Question;

class BudgetStateChangeController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param Question $question
     * @param Answer $answer
     */
    public function create(Question $question, Answer $answer)
    {
        // check chapter present

        if (!empty($answer->budgetStateChange)) {
            return redirect()->route('admin.questions.show', $question)
                ->with('error', 'Odpověď ID ' . $answer->id . ' již má přiřazenou změnu stavu rozpočtu');
        }

        return view('admin.budget_state_changes.create-or-update', [
            'question' => $question,
            'answer' => $answer,
            'budgetChapters' => BudgetChapter::all(),
            'budgetStateChange' => new BudgetStateChange
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BudgetStateChangeRequest $request
     * @param Question $question
     * @param Answer $answer
     */
    public function store(BudgetStateChangeRequest $request, Question $question, Answer $answer)
    {
        if (!empty($answer->budgetStateChange)) {
            return redirect()->route('admin.questions.show', $question)
                ->with('error', 'Odpověď ID ' . $answer->id . ' již má přiřazenou změnu stavu rozpočtu');
        }

        $validated = $request->validated();
        $budgetStateChange = new BudgetStateChange();

        $budgetStateChange->is_increase = $request->boolean('budget_state_change_is_increase');
        $budgetStateChange->is_expense = $request->boolean('budget_state_change_is_expense');
        $budgetStateChange->first_year = $validated['budget_state_change_first_year'];
        $budgetStateChange->second_year = $validated['budget_state_change_second_year'];
        $budgetStateChange->third_year = $validated['budget_state_change_third_year'];

        $budgetStateChange->budgetChapter()->associate($validated['budget_state_change_chapter_id']);
        $answer->budgetStateChange()->save($budgetStateChange);

        return redirect()->route('admin.questions.answers.show', [$question, $answer])
            ->with('success', 'Změna stavu rozpočtu byla vytvořena úspěšně');
    }

    /**
     * Display the specified resource.
     *
     * @param Question $question
     * @param Answer $answer
     * @param BudgetStateChange $budgetStateChange
     */
    public function show(Question $question, Answer $answer, BudgetStateChange $budgetStateChange)
    {
        return view('admin.budget_state_changes.show', [
           'question' => $question,
           'answer' => $answer,
           'budgetStateChange' => $budgetStateChange
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Question $question
     * @param Answer $answer
     * @param BudgetStateChange $budgetStateChange
     */
    public function edit(Question $question, Answer $answer, BudgetStateChange $budgetStateChange)
    {
        return view('admin.budget_state_changes.create-or-update', [
            'question' => $question,
            'answer' => $answer,
            'budgetChapters' => BudgetChapter::all(),
            'budgetStateChange' => $budgetStateChange
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BudgetStateChangeRequest $request
     * @param Question $question
     * @param Answer $answer
     * @param BudgetStateChange $budgetStateChange
     */
    public function update(BudgetStateChangeRequest $request, Question $question, Answer $answer, BudgetStateChange $budgetStateChange)
    {
        $validated = $request->validated();

        $budgetStateChange->is_increase = $request->boolean('budget_state_change_is_increase');
        $budgetStateChange->is_expense = $request->boolean('budget_state_change_is_expense');
        $budgetStateChange->first_year = $validated['budget_state_change_first_year'];
        $budgetStateChange->second_year = $validated['budget_state_change_second_year'];
        $budgetStateChange->third_year = $validated['budget_state_change_third_year'];

        $budgetStateChange->budgetChapter()->associate($validated['budget_state_change_chapter_id']);
        $answer->budgetStateChange()->save($budgetStateChange);

        return redirect()->route('admin.questions.answers.budget_state_change.show', [$question, $answer, $budgetStateChange])
            ->with('success', 'Změna stavu rozpočtu byla aktualizována úspěšně');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Question $question
     * @param Answer $answer
     * @param BudgetStateChange $budgetStateChange
     */
    public function destroy(Question $question, Answer $answer, BudgetStateChange $budgetStateChange)
    {
        $budgetStateChange->delete();

        return redirect()->route('admin.questions.answers.show', [$question, $answer])->with('success', 'Změna stavu rozpočtu byla smazána');
    }
}
