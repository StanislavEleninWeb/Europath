<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(City::all());
    }

    /**
     * Display province by region id.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProvinceByCityId($id)
    {
        $city = City::with('region')->findOrFail($id);
        return response()->json($city->region->province);
    }

    /**
     * Display a list of cities by region id.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegionByCityId($id)
    {
        $city = City::with('region')->findOrFail($id);
        return response()->json($city->region);
    }

    /**
     * Display a list of cities by region id.
     *
     * @return \Illuminate\Http\Response
     */
    public function getOfficeByCityId($id)
    {
        $city = City::with('offices')->findOrFail($id);
        return response()->json($city->offices);
    }

}
