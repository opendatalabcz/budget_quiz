<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * Display all regions
     *
     */
    public function index()
    {
        return view('admin.regions.index', [
            "regions" => Region::all()
        ]);
    }

    /**
     * Show form for creating a new region
     *
     */
    public function create()
    {
        return view('admin.regions.createOrUpdate', ["region" => new Region]);
    }

    /**
     * Store new region
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
           'name' => 'required|max:100'
        ]);

        $region = new Region;

        $region->name = $validated['name'];

        $region->save();

        return redirect()->route('admin.regions.index')->with('success', 'Kraj "'. $region->name .'" byl vytvořen');

    }

    /**
     * Show for editing a region
     *
     * @param Region $region
     */
    public function edit(Region $region)
    {
        return view('admin.regions.createOrUpdate', ["region" => $region]);
    }

    /**
     * Update a region
     *
     * @param Request $request
     * @param Region $region
     */
    public function update(Request $request, Region $region)
    {
        $validated = $request->validate([
            'name' => 'required|max:100'
        ]);

        $region->name = $validated['name'];

        $region->save();

        return redirect()->route('admin.regions.index')->with('success', 'Kraj "'. $region->name .'" byl upraven');
    }

    /**
     * Remove region
     *
     * @param Region $region
     */
    public function destroy(Region $region)
    {
        $region->delete();

        return redirect()->route('admin.regions.index')->with('success', 'Kraj "' . $region->name . '" byl smazán');
    }
}
