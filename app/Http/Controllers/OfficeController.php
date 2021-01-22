<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Office::all());
    }

    /**
     * Display office byid.
     *
     * @return \Illuminate\Http\Response
     */
    public function getOfficeById($id)
    {
        $office = Office::with(['manager','couriers.user', 'phones'])->findOrFail($id);
        return response()->json($office);
    }    

    /**
     * Display city by office id.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCityByOfficeId($id)
    {
        $office = Office::with('cities')->findOrFail($id);
        return response()->json($office->cities);
    }

    /**
     * Display a list of cities by office id.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCarsByOfficeId($id)
    {
        $office = Office::with('cars')->findOrFail($id);
        return response()->json($office->cars);
    }

    /**
     * Display a list of cities by office id.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCouriersByOfficeId($id)
    {
        $office = Office::with('couriers')->findOrFail($id);
        return response()->json($office->couriers);
    }

}
