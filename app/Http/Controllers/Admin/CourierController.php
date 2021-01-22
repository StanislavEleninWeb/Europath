<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Courier;

class CourierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('courier.admin.index', [
            'couriers' => Courier::with(['user', 'office'])->simplePaginate(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $courier = Courier::with(['user', 'office', 'car' => function($query){
            return $query->wherePivot('deleted_at', NULL);
        }])->findOrFail($id);
        return view('courier.admin.show', [
            'courier' => $courier,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Courier $courier)
    {
        $courier->delete();

        return redirect()->back();
    }
}
