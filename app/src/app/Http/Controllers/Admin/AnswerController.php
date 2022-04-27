<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AnswerRequest;
use App\Models\Answer;
use App\Models\Question;

class AnswerController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param Question $question
     */
    public function create(Question $question)
    {
        return view('admin.answers.create-or-update', [
            'question' => $question,
            'answer'   => new Answer
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AnswerRequest $request
     * @param Question $question
     */
    public function store(AnswerRequest $request, Question $question)
    {
        $validated = $request->validated();

        $answer = new Answer;

        $answer->title = $validated['answer_title'];
        $answer->description = $validated['answer_description'];

        $question->answers()->save($answer);

        return redirect()->route('admin.questions.show', $question)->with('success', 'Odpověď byla přidána úspěšně');
    }

    /**
     * Display the specified resource.
     *
     * @param Question $question
     * @param Answer $answer
     */
    public function show(Question $question, Answer $answer)
    {
        return view('admin.answers.show', [
            'question' => $question,
            'answer' => $answer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Question $question
     * @param Answer $answer
     */
    public function edit(Question $question, Answer $answer)
    {
        return view('admin.answers.create-or-update', [
            'question' => $question,
            'answer' => $answer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AnswerRequest $request
     * @param Question $question
     * @param Answer $answer
     */
    public function update(AnswerRequest $request, Question $question, Answer $answer)
    {
        $validated = $request->validated();

        $answer->title = $validated['answer_title'];
        $answer->description = $validated['answer_description'];

        $question->answers()->save($answer);

        return redirect()->route('admin.questions.answers.show', [$question, $answer])->with('success', 'Odpověď byla upravena úspěšně');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Question $question
     * @param Answer $answer
     */
    public function destroy(Question $question, Answer $answer)
    {
        $answer->delete();

        return redirect()->route('admin.questions.show', $question)->with('success', 'Odpověď byla smazána');
    }
}
