<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Province::all());
    }

    /**
     * Display a listing of the regions by province id.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegionsByProvinceId($id)
    {
        $province = Province::with('regions')->findOrFail($id);
        return response()->json($province->regions);
    }

    /**
     * Display a listing of the cities by province id.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCitiesByProvinceId($id)
    {
        $province = Province::with('cities')->findOrFail($id);
        return response()->json($province->cities);
    }
}
