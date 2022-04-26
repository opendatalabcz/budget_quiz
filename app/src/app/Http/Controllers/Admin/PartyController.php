<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Party;
use Illuminate\Http\Request;

class PartyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('admin.parties.index', [
            "parties" => Party::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.parties.createOrUpdate', ["party" => new Party]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'short_name' => 'required|max:50',
            'name' => 'required|max:150'
        ]);

        $party = new Party;

        $party->short_name = $validated['short_name'];
        $party->name = $validated['name'];

        $party->save();

        return redirect()->route('admin.parties.index')->with('success', 'Strana "'. $party->short_name .'" byla přidána');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Party  $party
     */
    public function edit(Party $party)
    {
        return view('admin.parties.createOrUpdate', ["party" => $party]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Party  $party
     */
    public function update(Request $request, Party $party)
    {
        $validated = $request->validate([
            'short_name' => 'required|max:50',
            'name' => 'required|max:150'
        ]);

        $party->short_name = $validated['short_name'];
        $party->name = $validated['name'];

        $party->save();

        return redirect()->route('admin.parties.index')->with('success', 'Strana "'. $party->short_name .'" byla upravena');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Party  $party
     */
    public function destroy(Party $party)
    {
        $party->delete();

        return redirect()->route('admin.parties.index')->with('success', 'Strana "' . $party->short_name . '" byla smazána');
    }
}
