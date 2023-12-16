<?php

namespace App\Charts;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class DailySaleCurrentMonth
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\AreaChart
    {
        $fromDate = Carbon::now()->startOfMonth()->toDateString();
        $toDate = Carbon::now()->startOfMonth()->addDays(Carbon::now()->day - 1)->toDateString();

        $currentMonth = DB::table(Order::retrieveTableName())
            ->whereBetween('created_at', [$fromDate, $toDate])
            ->get('total');

        $totalCurrentMonth = $currentMonth->pluck('total')->all();

        $currentMonthDays = [];
        $currentDate = Carbon::now()->startOfMonth()->copy();
        while ($currentDate <= Carbon::now()->endOfMonth() && $currentDate <= Carbon::now()) {
            $currentMonthDays[] = $currentDate->format('Y-m-d');
            $currentDate->addDay();
        }

        // Don't worry, it's not an error, idk why it's like this, but it's not
        return $this->chart->areaChart()
            ->setTitle('Sales during this month')
            ->addData('Sale', $totalCurrentMonth )
            ->setXAxis($currentMonthDays);
    }
}
