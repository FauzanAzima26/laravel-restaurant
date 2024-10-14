<?php

namespace App\Http\Controllers\Backend;

use App\Charts\totalTransaction;
use App\Http\Controllers\Controller;

class dashboarController extends Controller
{
    public function index(totalTransaction $chart)
    {
        return view('backend.dashboard.index', ['chart' => $chart->build()]);
    }
}