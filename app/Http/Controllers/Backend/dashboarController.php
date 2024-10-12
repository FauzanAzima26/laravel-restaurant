<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class dashboarController extends Controller
{
    public function index()
    {
        return view('backend.dashboard.index', [
            'dashboard' => Transaction::latest()->paginate(5)
        ]);
    }
}
