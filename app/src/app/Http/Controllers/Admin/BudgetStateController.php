<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BudgetStateRequest;
use App\Models\BudgetChapter;
use App\Models\BudgetState;

class BudgetStateController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     */
    public function create(BudgetChapter $budgetChapter)
    {
        if (!empty($budgetChapter->budgetState)) {
            return redirect()->route('admin.budget_chapters.index')->with('error', 'Kapitola rozpočtu ID ' . $budgetChapter->id . ' již má přiřazen stav rozpočtu');
        }

        return view('admin.budget_states.create-or-update', [
            'budgetChapter' => $budgetChapter,
            'budgetState' => new BudgetState
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BudgetStateRequest $request
     */
    public function store(BudgetStateRequest $request, BudgetChapter $budgetChapter)
    {
        if (!empty($budgetChapter->budgetState)) {
            return redirect()->route('admin.budget_chapters.index')->with('error', 'Kapitola rozpočtu ID ' . $budgetChapter->id . ' již má přiřazen stav rozpočtu');
        }

        $validated = $request->validated();
        $budgetState = new BudgetState;

        $budgetState->income_first_year = $validated['budget_state_income_first_year'];
        $budgetState->income_second_year = $validated['budget_state_income_second_year'];
        $budgetState->income_third_year = $validated['budget_state_income_third_year'];
        $budgetState->expense_first_year = $validated['budget_state_expense_first_year'];
        $budgetState->expense_second_year = $validated['budget_state_expense_second_year'];
        $budgetState->expense_third_year = $validated['budget_state_expense_third_year'];

        $budgetChapter->budgetState()->save($budgetState);

        return redirect()->route('admin.budget_chapters.index')->with('success', 'Stav rozpočtu byl vytvořen úspěšně');
    }

    /**
     * Display the specified resource.
     *
     * @param BudgetChapter $budgetChapter
     * @param BudgetState $budgetState
     */
    public function show(BudgetChapter $budgetChapter, BudgetState $budgetState)
    {
        return view('admin.budget_states.show', [
           'budgetChapter' => $budgetChapter,
           'budgetState' => $budgetState
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param BudgetChapter $budgetChapter
     * @param BudgetState $budgetState
     */
    public function edit(BudgetChapter $budgetChapter, BudgetState $budgetState)
    {
        return view('admin.budget_states.create-or-update', [
            'budgetChapter' => $budgetChapter,
            'budgetState' => $budgetState
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BudgetStateRequest $request
     * @param BudgetState $budgetState
     */
    public function update(BudgetStateRequest $request, BudgetChapter $budgetChapter, BudgetState $budgetState)
    {
        $validated = $request->validated();

        $budgetState->income_first_year = $validated['budget_state_income_first_year'];
        $budgetState->income_second_year = $validated['budget_state_income_second_year'];
        $budgetState->income_third_year = $validated['budget_state_income_third_year'];
        $budgetState->expense_first_year = $validated['budget_state_expense_first_year'];
        $budgetState->expense_second_year = $validated['budget_state_expense_second_year'];
        $budgetState->expense_third_year = $validated['budget_state_expense_third_year'];

        $budgetChapter->budgetState()->save($budgetState);

        return redirect()->route('admin.budget_chapters.budget_state.show', [$budgetChapter, $budgetState])->with('success', 'Stav rozpočtu byl aktualizován úspěšně');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param BudgetChapter $budgetChapter
     * @param BudgetState $budgetState
     */
    public function destroy(BudgetChapter $budgetChapter, BudgetState $budgetState)
    {
        $budgetState->delete();

        return redirect()->route('admin.budget_chapters.index')->with('success', 'Stav rozpočtu byl smazán');
    }
}
