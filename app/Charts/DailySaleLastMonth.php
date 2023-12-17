<?php

namespace App\Charts;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class DailySaleLastMonth
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\AreaChart
    {
        $fromDateLastMonth = Carbon::now()->startOfMonth()->subMonth()->toDateString();
        $toDateLastMonth = Carbon::now()->endOfMonth()->subMonth()->subDay()->toDateString();

        $lastMonth = DB::table(Order::retrieveTableName())
            ->whereBetween('created_at', [$fromDateLastMonth, $toDateLastMonth])
            ->get('total');

        $totalLastMonth = $lastMonth->pluck('total')->all();
        $lastMonthDays = [];
        $currentDate = Carbon::now()->startOfMonth()->subMonth()->copy();
        while ($currentDate <= Carbon::now()->endOfMonth()->subMonth()->subDay()) {
            $lastMonthDays[] = $currentDate->format('Y-m-d');
            $currentDate->addDay();
        }


        // Don't worry, it's not an error, idk why it's like this, but it's not
        return $this->chart->areaChart()
            ->setTitle('Sales during last month')
            ->addData('Sale', $totalLastMonth)
            ->setXAxis($lastMonthDays);
    }
}
