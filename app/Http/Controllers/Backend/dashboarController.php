<?php

namespace App\Http\Controllers\Backend;

use App\Models\Transaction;
use App\Charts\totalTransaction;
use App\Http\Controllers\Controller;

class dashboarController extends Controller
{
    public function index(totalTransaction $chart)
    {
        return view('backend.dashboard.index', [
            'chart' => $chart->build(),
            'transactions' => Transaction::latest()->take(5)->get(),
        ]);
    }
}