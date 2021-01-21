<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Province;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return view('home.index', [
            'header' => 'Welcome To Home',
            'provinces' => Province::all(),
        ]);
    }

}
