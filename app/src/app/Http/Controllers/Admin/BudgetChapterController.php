<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BudgetChapterRequest;
use App\Models\BudgetChapter;

class BudgetChapterController extends Controller
{
    /**
     * Display all budget chapters
     *
     */
    public function index()
    {
        return view('admin.budget_chapters.index', [
            "budgetChapters" => BudgetChapter::with('budgetState')->get()
        ]);
    }

    /**
     * Show the form for creating a new budget chapter
     *
     */
    public function create()
    {
        return view('admin.budget_chapters.create-or-update', ["budgetChapter" => new BudgetChapter]);
    }

    /**
     * Store new budget chapter
     *
     * @param BudgetChapterRequest $request
     */
    public function store(BudgetChapterRequest $request)
    {
        $validated = $request->validated();

        $budgetChapter = new BudgetChapter;

        $budgetChapter->number = $validated['budget_chapter_number'];
        $budgetChapter->name = $validated['budget_chapter_name'];

        $budgetChapter->save();

        return redirect()->route('admin.budget_chapters.index')->with('success', 'Kapitola rozpočtu číslo "'. $budgetChapter->number .'" byla přidána');
    }

    /**
     * Show the form for editing budget chapter
     *
     * @param BudgetChapter $budgetChapter
     */
    public function edit(BudgetChapter $budgetChapter)
    {
        return view('admin.budget_chapters.create-or-update', ["budgetChapter" => $budgetChapter]);
    }

    /**
     * Update budget chapter
     *
     * @param BudgetChapterRequest $request
     * @param BudgetChapter $budgetChapter
     */
    public function update(BudgetChapterRequest $request, BudgetChapter $budgetChapter)
    {
        $validated = $request->validated();

        $budgetChapter->number = $validated['budget_chapter_number'];
        $budgetChapter->name = $validated['budget_chapter_name'];

        $budgetChapter->save();

        return redirect()->route('admin.budget_chapters.index')->with('success', 'Kapitola rozpočtu číslo "'. $budgetChapter->number .'" byla upravena');
    }

    /**
     * Remove budget chapter
     *
     * @param BudgetChapter $budgetChapter
     */
    public function destroy(BudgetChapter $budgetChapter)
    {
        $budgetChapter->delete();

        return redirect()->route('admin.budget_chapters.index')->with('success', 'Kapitola rozpočtu číslo "' . $budgetChapter->number . '" byla smazána');
    }
}
