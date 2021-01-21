<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Province;
use App\Models\Region;
use App\Http\Requests\Region\StorePostRequest;


class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('region.admin.index', [
            'region' => Region::simplePaginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('region.admin.create', [
            'provinces' => Province::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $region = Region::create($request->validated());

        return redirect()->route('admin.region.edit', $region->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function edit(Region $region)
    {
        return view('region.admin.edit', [
            'provinces' => Province::all(),
            'region' => $region,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, Region $region)
    {
        $region->update($request->validated());

        return redirect()->route('admin.region.edit', $region->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function destroy(Region $region)
    {
        $region->delete();

        return redirect()->back();
    }
}
