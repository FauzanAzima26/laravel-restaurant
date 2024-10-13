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
    public function index()
    {
        $chart = (new LineChart)
        ->setTitle('Total Transaction')
        ->setDataset([
            [
                'name'  =>  'Pending',
                'data'  =>  Transaction::query()->where('status', 'pending')->selectRaw('COUNT(*) as total')->inRandomOrder()->limit(6)->get()->pluck('total')->toArray()
            ],
            [
                'name'  =>  'Success',
                'data'  =>  Transaction::query()->where('status', 'success')->selectRaw('COUNT(*) as total')->inRandomOrder()->limit(6)->get()->pluck('total')->toArray()
            ],
            [
                'name'  =>  'Failed',
                'data'  =>  Transaction::query()->where('status', 'failed')->selectRaw('COUNT(*) as total')->inRandomOrder()->limit(6)->get()->pluck('total')->toArray()
            ]
            ])
            
            ->setLabels(['Jan', 'Feb', 'Mar'])
            ->setColors(['#ffbf00', '#008000', '#ff0000']);

        return view('backend.dashboard.index', [
            'dashboard' => Transaction::latest()->paginate(5),
            'chart' => $chart
        ]);
    }
}
