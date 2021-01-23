<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Province;
use App\Models\City;
use App\Models\Office;
use App\Models\User;
use App\Models\Phone;
use App\Models\Courier;

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
            'managers' => User::with(['roles'])->whereHas('roles', function($query){
                return $query->where('name', 'manager');
            })->get(),
            'provinces' => Province::all(),
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

    /**
     * Display cars by courier id.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPhone($id)
    {
        $office = Office::with('phones')->findOrFail($id);

        return view('office.admin.phone', [
            'office' => $office,
        ]);
    }

    /**
     * Display cars by courier id.
     *
     * @return \Illuminate\Http\Response
     */
    public function storePhone($id, Request $request)
    {
        $office = Office::findOrFail($id);

        $validated = Validator::make($request->all(), [
            'phone' => 'required|string',
        ])->validate();

        $phone = new Phone;
        $phone->phone = $validated['phone'];

        $phone->phoneable()->associate($office)->save();

        return redirect()->route('admin.office.phone', $office->id);
    }

    /**
     * Display cars by courier id.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCourier($id)
    {
        $office = Office::with('couriers.user')->findOrFail($id);

        return view('office.admin.courier', [
            'office' => $office,
            'couriers' => Courier::with('user')->get(),
        ]);
    }

    /**
     * Display cars by courier id.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeCourier($id, Request $request)
    {
        $office = Office::findOrFail($id);

        $validated = Validator::make($request->all(), [
            'courier_id' => 'required|integer',
        ])->validate();

        $courier = Courier::findOrFail($validated['courier_id']);

        $office->couriers()->save($courier);

        return redirect()->route('admin.office.courier', $office->id);
    }

}
