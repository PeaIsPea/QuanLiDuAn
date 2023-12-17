<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Charts\DailySale;
use App\Charts\DailySaleCurrentMonth;
use App\Charts\DailySaleLastMonth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Order;
use App\Models\User;

class DashboardController extends Controller
{
    public function Index(DailySaleLastMonth $chart, DailySaleCurrentMonth $chart2)
    {
        $totalUser = count(User::all());
        $totalGame = count(Game::all());

        $newlyCreatedUsers = User::latest()->limit(10)->get();
        $newlyCreatedOrders = Order::latest()->limit(10)->get();

        return view(
            'admin.index',
            [
                'totalUser' => $totalUser, 
                'newlyCreatedUsers' => $newlyCreatedUsers,
                'newlyCreatedOrders' => $newlyCreatedOrders,
                'totalGame' => $totalGame,
                'saleChartLastMonth' => $chart->build(),
                'saleChartCurrentMonth' => $chart2->build(),
            ]
        );
    }
}
