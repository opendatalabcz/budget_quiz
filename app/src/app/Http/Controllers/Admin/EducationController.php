<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EducationRequest;
use App\Models\Education;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('admin.educations.index', [
            'educations' => Education::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.educations.create-or-update', [
           'education' => new Education
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EducationRequest $request
     */
    public function store(EducationRequest $request)
    {
        $validated = $request->validated();

        $education = new Education;

        $education->name = $validated['education_name'];

        $education->save();

        return redirect()->route('admin.educations.index')
            ->with('success', 'Vzdělání ID '. $education->id .' bylo přidáno');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Education $education
     */
    public function edit(Education $education)
    {
        return view('admin.educations.create-or-update', [
            'education' => $education
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EducationRequest $request
     * @param Education $education
     */
    public function update(EducationRequest $request, Education $education)
    {
        $validated = $request->validated();

        $education->name = $validated['education_name'];

        $education->save();

        return redirect()->route('admin.educations.index')
            ->with('success', 'Vzdělání ID '. $education->id .' bylo upraveno');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Education $education
     */
    public function destroy(Education $education)
    {
        $education->delete();

        return redirect()->route('admin.educations.index')
            ->with('success', 'Vzdělání ID '. $education->id .' bylo smazáno');
    }
}
