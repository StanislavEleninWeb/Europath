<?php

namespace App\Http\Controllers;

use App\Models\Courier;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Courier::all());
    }

    /**
     * Display courier by id.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCourierById($id)
    {
        $courier = Courier::with('phones')->findOrFail($id);
        return response()->json($courier);
    }

    /**
     * Display cars by courier id.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCarsByCourierId($id)
    {
        $courier = Courier::with('cars')->findOrFail($id);
        return response()->json($courier->cars);
    }

}
