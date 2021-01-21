<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Region::all());
    }

    /**
     * Display province by region id.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProvinceByRegionId($id)
    {
        $region = Region::with('province')->findOrFail($id);
        return response()->json($region->province);
    }

    /**
     * Display a list of cities by region id.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCitiesByRegionId($id)
    {
        $region = Region::with('cities')->findOrFail($id);
        return response()->json($region->cities);
    }

}
