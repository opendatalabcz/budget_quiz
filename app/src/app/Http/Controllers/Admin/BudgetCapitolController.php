<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BudgetCapitolRequest;
use App\Models\BudgetCapitol;

class BudgetCapitolController extends Controller
{
    /**
     * Display all budget capitols
     *
     */
    public function index()
    {
        return view('admin.budget_capitols.index', [
            "budgetCapitols" => BudgetCapitol::with('budgetState')->get()
        ]);
    }

    /**
     * Show the form for creating a new budget capitol
     *
     */
    public function create()
    {
        return view('admin.budget_capitols.create-or-update', ["budgetCapitol" => new BudgetCapitol]);
    }

    /**
     * Store new budget capitol
     *
     * @param BudgetCapitolRequest $request
     */
    public function store(BudgetCapitolRequest $request)
    {
        $validated = $request->validated();

        $budgetCapitol = new BudgetCapitol;

        $budgetCapitol->number = $validated['budget_capitol_number'];
        $budgetCapitol->name = $validated['budget_capitol_name'];

        $budgetCapitol->save();

        return redirect()->route('admin.budget_capitols.index')->with('success', 'Kapitola rozpočtu číslo "'. $budgetCapitol->number .'" byla přidána');
    }

    /**
     * Show the form for editing budget capitol
     *
     * @param BudgetCapitol $budgetCapitol
     */
    public function edit(BudgetCapitol $budgetCapitol)
    {
        return view('admin.budget_capitols.create-or-update', ["budgetCapitol" => $budgetCapitol]);
    }

    /**
     * Update budget capitol
     *
     * @param BudgetCapitolRequest $request
     * @param BudgetCapitol $budgetCapitol
     */
    public function update(BudgetCapitolRequest $request, BudgetCapitol $budgetCapitol)
    {
        $validated = $request->validated();

        $budgetCapitol->number = $validated['budget_capitol_number'];
        $budgetCapitol->name = $validated['budget_capitol_name'];

        $budgetCapitol->save();

        return redirect()->route('admin.budget_capitols.index')->with('success', 'Kapitola rozpočtu číslo "'. $budgetCapitol->number .'" byla upravena');
    }

    /**
     * Remove budget capitol
     *
     * @param BudgetCapitol $budgetCapitol
     */
    public function destroy(BudgetCapitol $budgetCapitol)
    {
        $budgetCapitol->delete();

        return redirect()->route('admin.budget_capitols.index')->with('success', 'Kapitola rozpočtu číslo "' . $budgetCapitol->number . '" byla smazána');
    }
}
