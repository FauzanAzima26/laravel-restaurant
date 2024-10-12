<?php

namespace App\Http\Controllers\Backend;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Charts\totalTrasactionChart;
use App\Http\Controllers\Controller;
use marineusde\LarapexCharts\Charts\LineChart;
use marineusde\LarapexCharts\Facades\LarapexChart;

class dashboarController extends Controller
{
    public function index(totalTrasactionChart $chart)
    {
        $chart = (new LineChart)->setTitle('Posts')
                   ->setDataset([150, 120])
                   ->setLabels(['Published', 'No Published']);

        return view('backend.dashboard.index', [
            'dashboard' => Transaction::latest()->paginate(5),
            'chart' => $chart
        ]);
    }
}
