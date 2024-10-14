<?php

namespace App\Charts;

use App\Models\Transaction;
use Illuminate\Support\Carbon;
use marineusde\LarapexCharts\Options\XAxisOption;
use marineusde\LarapexCharts\Charts\LineChart AS OriginalLineChart;

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
            $dataBulan[] = Carbon::create()->month($i)->format('F');
            $dataPending[] = $pending;
            $dataSuccess[] = $success;
            $dataFailed[] = $failed;
        }

        return (new OriginalLineChart)
            ->setTitle('Total Transaksi')
            ->addData('pending', $dataPending)
            ->addData('success', $dataSuccess)
            ->addData('failed', $dataFailed)
            ->setColors(['#F7DC6F', '#007bff', '#dc3545'])
            ->setXAxisOption(new XAxisOption($dataBulan));
    }
}
