<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use App\Models\Question;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('admin.questions.index', [
            'questions' => Question::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.questions.create-or-update', [
            "question" => new Question
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param QuestionRequest $request
     */
    public function store(QuestionRequest $request)
    {
        $validated = $request->validated();

        $question = new Question;

        $question->number = $validated['question_number'];
        $question->title = $validated['question_title'];
        $question->description = $validated['question_description'];

        $question->save();

        return redirect()->route('admin.questions.index')->with('success', 'Otázka ID '. $question->id .' byla přidána');
    }

    /**
     * Display the specified resource.
     *
     * @param Question $question
     */
    public function show(Question $question)
    {
        return view('admin.questions.show', [
            'question' => $question
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Question $question
     */
    public function edit(Question $question)
    {
        return view('admin.questions.create-or-update', [
            "question" => $question
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param QuestionRequest $request
     * @param Question $question
     */
    public function update(QuestionRequest $request, Question $question)
    {
        $validated = $request->validated();

        $question->number = $validated['question_number'];
        $question->title = $validated['question_title'];
        $question->description = $validated['question_description'];

        $question->save();

        return redirect()->route('admin.questions.show', $question)->with('success', 'Otázka byla upravena');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Question $question
     */
    public function destroy(Question $question)
    {
        $question->delete();

        return redirect()->route('admin.questions.index')->with('success', 'Otázka ID ' . $question->id . ' byla smazána');
    }
}
