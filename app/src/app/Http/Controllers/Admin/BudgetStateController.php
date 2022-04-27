<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BudgetStateRequest;
use App\Models\BudgetCapitol;
use App\Models\BudgetState;

class BudgetStateController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     */
    public function create(BudgetCapitol $budgetCapitol)
    {
        if (!empty($budgetCapitol->budgetState)) {
            return redirect()->route('admin.budget_capitols.index')->with('error', 'Kapitola rozpočtu ID ' . $budgetCapitol->id . ' již má přiřazen stav rozpočtu');
        }

        return view('admin.budget_states.create-or-update', [
            'budgetCapitol' => $budgetCapitol,
            'budgetState' => new BudgetState
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BudgetStateRequest $request
     */
    public function store(BudgetStateRequest $request, BudgetCapitol $budgetCapitol)
    {
        if (!empty($budgetCapitol->budgetState)) {
            return redirect()->route('admin.budget_capitols.index')->with('error', 'Kapitola rozpočtu ID ' . $budgetCapitol->id . ' již má přiřazen stav rozpočtu');
        }

        $validated = $request->validated();
        $budgetState = new BudgetState;

        $budgetState->income_first_year = $validated['budget_state_income_first_year'];
        $budgetState->income_second_year = $validated['budget_state_income_second_year'];
        $budgetState->income_third_year = $validated['budget_state_income_third_year'];
        $budgetState->expense_first_year = $validated['budget_state_expense_first_year'];
        $budgetState->expense_second_year = $validated['budget_state_expense_second_year'];
        $budgetState->expense_third_year = $validated['budget_state_expense_third_year'];

        $budgetCapitol->budgetState()->save($budgetState);

        return redirect()->route('admin.budget_capitols.index')->with('success', 'Stav rozpočtu byl vytvořen úspěšně');
    }

    /**
     * Display the specified resource.
     *
     * @param BudgetCapitol $budgetCapitol
     * @param BudgetState $budgetState
     */
    public function show(BudgetCapitol $budgetCapitol, BudgetState $budgetState)
    {
        return view('admin.budget_states.show', [
           'budgetCapitol' => $budgetCapitol,
           'budgetState' => $budgetState
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param BudgetCapitol $budgetCapitol
     * @param BudgetState $budgetState
     */
    public function edit(BudgetCapitol $budgetCapitol, BudgetState $budgetState)
    {
        return view('admin.budget_states.create-or-update', [
            'budgetCapitol' => $budgetCapitol,
            'budgetState' => $budgetState
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BudgetStateRequest $request
     * @param BudgetState $budgetState
     */
    public function update(BudgetStateRequest $request, BudgetCapitol $budgetCapitol, BudgetState $budgetState)
    {
        $validated = $request->validated();

        $budgetState->income_first_year = $validated['budget_state_income_first_year'];
        $budgetState->income_second_year = $validated['budget_state_income_second_year'];
        $budgetState->income_third_year = $validated['budget_state_income_third_year'];
        $budgetState->expense_first_year = $validated['budget_state_expense_first_year'];
        $budgetState->expense_second_year = $validated['budget_state_expense_second_year'];
        $budgetState->expense_third_year = $validated['budget_state_expense_third_year'];

        $budgetCapitol->budgetState()->save($budgetState);

        return redirect()->route('admin.budget_capitols.budget_state.show', [$budgetCapitol, $budgetState])->with('success', 'Stav rozpočtu byl aktualizován úspěšně');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param BudgetCapitol $budgetCapitol
     * @param BudgetState $budgetState
     */
    public function destroy(BudgetCapitol $budgetCapitol, BudgetState $budgetState)
    {
        $budgetState->delete();

        return redirect()->route('admin.budget_capitols.index')->with('success', 'Stav rozpočtu byl smazán');
    }
}
