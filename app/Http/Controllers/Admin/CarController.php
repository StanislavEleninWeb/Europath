<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Office;
use App\Models\Courier;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('car.admin.index', [
            'cars' => Car::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('car.admin.create', [
            'offices' => Office::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'office_id' => 'required|integer',
            'courier_id' => 'nullable|integer',
            'brand' => 'required|string|min:2|max:50',
            'model' => 'required|string|min:2|max:50',
            'registration' => 'required|string|min:8|max:10|unique:cars',
            'fuel' => 'required|string|min:2',
            'fuel_consumption' => 'required|numeric',
        ])->validate();

        $car = Car::create($validated);

        DB::select('CALL insertCourierCarRelation(?,?)', [
            $validated['courier_id'],
            $car->id,
        ]);

        // if(isset($validated['courier_id']))
        //     $car->courier()->attach($validated['courier_id']);

        return redirect()->route('admin.car.edit', $car->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        return view('car.admin.edit', [
            'offices' => Office::all(),
            'couriers' => Courier::with('user')->where('office_id', $car->office_id)->get(),
            'car' => $car,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $validated = Validator::make($request->all(),[
            'office_id' => 'required|integer',
            'courier_id' => 'nullable|integer',
            'brand' => 'required|string|min:2|max:50',
            'model' => 'required|string|min:2|max:50',
            'registration' => 'required|string|min:8|max:10',
            'fuel' => 'required|string|min:2',
            'fuel_consumption' => 'required|numeric',
        ])->validate();

        $car->update($validated);

        // Check for current active car-courier relation
        $couriers = $car->courier()->get();

        if(count($couriers)){
            foreach($couriers as $courier){
                $courier->pivot->deleted_at = \Carbon\Carbon::now();
                $courier->pivot->save();
            }
            // $car->courier()->sync($courier->pluck('id'), ['deleted_at' => \Carbon\Carbon::now()]);
        }

        if(isset($validated['courier_id']))
            $car->courier()->attach($validated['courier_id']);

        return redirect()->route('admin.car.edit', $car->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();

        return redirect()->back();
    }
}
