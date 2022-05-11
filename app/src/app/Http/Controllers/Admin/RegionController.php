<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RegionRequest;
use App\Models\Region;

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
        return view('admin.regions.create-or-update', ["region" => new Region]);
    }

    /**
     * Store new region
     *
     * @param RegionRequest $request
     */
    public function store(RegionRequest $request)
    {
        $validated = $request->validated();

        $region = new Region;

        $region->name = $validated['region_name'];

        $region->save();

        return redirect()->route('admin.regions.index')->with('success', 'Kraj ID "'. $region->id .'" byl přidán');
    }

    /**
     * Show form for editing a region
     *
     * @param Region $region
     */
    public function edit(Region $region)
    {
        return view('admin.regions.create-or-update', ["region" => $region]);
    }

    /**
     * Update a region
     *
     * @param RegionRequest $request
     * @param Region $region
     */
    public function update(RegionRequest $request, Region $region)
    {
        $validated = $request->validated();

        $region->name = $validated['region_name'];

        $region->save();

        return redirect()->route('admin.regions.index')->with('success', 'Kraj ID "'. $region->id .'" byl upraven');
    }

    /**
     * Remove region
     *
     * @param Region $region
     */
    public function destroy(Region $region)
    {
        $region->delete();

        return redirect()->route('admin.regions.index')->with('success', 'Kraj ID "' . $region->id . '" byl smazán');
    }
}
