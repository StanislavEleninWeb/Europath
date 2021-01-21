<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Province;
use App\Models\City;
use App\Models\Office;
use App\Models\User;
use App\Http\Requests\Office\StorePostRequest;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('office.admin.index', [
            'offices' => Office::with('manager')->simplePaginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {       
        return view('office.admin.create', [
            'managers' => User::with(['roles'])->whereHas('roles', function($query){
                return $query->where('name', 'manager');
            })->get(),
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
        $validated = $request->validated();
        $office = Office::create($validated);
        $office->cities()->sync($validated['cities']);

        return redirect()->route('admin.office.edit', $office->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function edit(Office $office)
    {
        return view('office.admin.edit', [
            'cities' => City::all(),
            'managers' => User::with(['roles'])->whereHas('roles', function($query){
                return $query->where('name', 'manager');
            })->get(),
            'office' => $office,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, Office $office)
    {
        $validated = $request->validated();
        $office->update($validated);
        $office->cities()->sync($validated['cities']);

        return redirect()->route('admin.office.edit', $office->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function destroy(Office $office)
    {
        $office->cities()->sync([]);
        $office->delete();

        return redirect()->back();
    }
}
