<?php

namespace App\Charts;

use marineusde\LarapexCharts\Charts\LineChart AS OriginalLineChart;
use marineusde\LarapexCharts\Options\XAxisOption;


class totalTrasactionChart
{
    public function build(): OriginalLineChart
    {
        return (new OriginalLineChart)
            ->setTitle('Sales during 2021.')
            ->setSubtitle('Physical sales vs Digital sales.')
            ->addData('Physical sales', [40, 93, 35, 42, 18, 82])
            ->addData('Digital sales', [70, 29, 77, 28, 55, 45])
            ->setXAxisOption(new XAxisOption(['January', 'February', 'March', 'April', 'May', 'June']));
    }
}
