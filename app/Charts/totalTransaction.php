<?php

namespace App\Charts;

use App\Models\Transaction;
use Illuminate\Support\Carbon;
use marineusde\LarapexCharts\Options\XAxisOption;
use marineusde\LarapexCharts\Charts\LineChart as OriginalLineChart;

class totalTransaction
{
    public function build(): OriginalLineChart
    {
        $tahun = date('Y');
        $bulan = date('m');
        for ($i = 1; $i <= $bulan; $i++) {
            $pending = Transaction::whereYear('created_at', $tahun)
                ->whereMonth('created_at', $i)
                ->where('status', 'pending')
                ->sum('amount');
            $success = Transaction::whereYear('created_at', $tahun)
                ->whereMonth('created_at', $i)
                ->where('status', 'success')
                ->sum('amount');
            $failed = Transaction::whereYear('created_at', $tahun)
                ->whereMonth('created_at', $i)
                ->where('status', 'failed')
                ->sum('amount');
            $total = Transaction::whereYear('created_at', $tahun)
                ->whereMonth('created_at', $i)
                ->where('status', '!=', 'failed')
                ->sum('amount');

            $total_all = $total > $failed ? $total - $failed : 0;

            $dataBulan[] = Carbon::create()->month($i)->format('F');
            $dataPending[] = $pending;
            $dataSuccess[] = $success;
            $dataFailed[] = $failed;
            $dataTotal[] = $total_all;
        }

        return (new OriginalLineChart)
            ->setTitle('Total Transaksi Bulanan')
            ->addData('pending', $dataPending)
            ->addData('success', $dataSuccess)
            ->addData('failed', $dataFailed)
            ->addData('total', $dataTotal)
            ->setColors(['#F7DC6F', '#28a745','#dc3545', '#007bff' ])
            ->setXAxisOption(new XAxisOption($dataBulan));
    }
}
