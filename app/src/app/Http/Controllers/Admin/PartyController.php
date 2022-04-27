<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PartyRequest;
use App\Models\Party;

class PartyController extends Controller
{
    /**
     * Display all parties
     *
     */
    public function index()
    {
        return view('admin.parties.index', [
            "parties" => Party::all()
        ]);
    }

    /**
     * Show the form for creating a new party
     *
     */
    public function create()
    {
        return view('admin.parties.create-or-update', ["party" => new Party]);
    }

    /**
     * Store new party
     *
     * @param PartyRequest $request
     */
    public function store(PartyRequest $request)
    {
        $validated = $request->validated();

        $party = new Party;

        $party->short_name = $validated['party_short_name'];
        $party->name = $validated['party_name'];

        $party->save();

        return redirect()->route('admin.parties.index')->with('success', 'Strana ID "'. $party->id .'" byla přidána');
    }

    /**
     * Show the form for editing party
     *
     * @param Party $party
     */
    public function edit(Party $party)
    {
        return view('admin.parties.create-or-update', ["party" => $party]);
    }

    /**
     * Update a party
     *
     * @param PartyRequest $request
     * @param Party $party
     */
    public function update(PartyRequest $request, Party $party)
    {
        $validated = $request->validated();
        $party->short_name = $validated['party_short_name'];
        $party->name = $validated['party_name'];

        $party->save();

        return redirect()->route('admin.parties.index')->with('success', 'Strana ID "'. $party->id .'" byla upravena');

    }

    /**
     * Remove a party
     *
     * @param Party $party
     */
    public function destroy(Party $party)
    {
        $party->delete();

        return redirect()->route('admin.parties.index')->with('success', 'Strana ID "' . $party->id . '" byla smazána');
    }
}
