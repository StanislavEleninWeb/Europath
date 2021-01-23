<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\CourierCar;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {

        $result = DB::select('CALL insertCourierCarRelation(1,1);');

        dd($result);

        $report = collect(DB::select('SELECT * FROM courier_car_report'));
        return view('report.admin.index', [
            'report' => $report,
        ]);
    }

}
