<?php

namespace App\Http\Controllers\admin_panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\sale;
use App\User;
use App\Key;
use Carbon\Carbon;
use DB;
use App\Charts\UserChart;

class dashboardController extends Controller
{
    public function index(){
        $users = User::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', Carbon::now()->year)
                    ->groupBy(\DB::raw("Month(created_at)"))
                    ->pluck('count');

        $userChart = new UserChart;
        $userChart->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']);
        $userChart->dataset('New User Register Chart', 'line', $users)->options([
            'borderColor' => '#51C1C0',
            'backgroundColor' => '#9ec3ff'
        ]);

        $earnings = Key::select(\DB::raw("SUM(selling_price)-SUM(buying_price) as monthEarning"))
        ->where('command_id', '!=', null)
        ->whereYear('updated_at', Carbon::now()->year)
        ->groupBy(\DB::raw("Month(updated_at)"))
        ->pluck('monthEarning');

        $earningsChart = new UserChart;
        $earningsChart->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']);
        $earningsChart->dataset('Earnings Chart', 'line', $earnings)->options([
            'borderColor' => '#51C1C0',
            'backgroundColor' => '#9ec3ff'
        ]);

        return view('admin_panel.dashboard.index', compact('userChart', 'earningsChart'))
        ->with('sales', sale::all())
        ->with('sold_products', $this->TotalProductSold())
        ->with('monthEarnings', $this->earningMonthly())
        ->with('yearEarnings', $this->earningThisYear());
    }

    function TotalProductSold(){
        return Key::where('command_id', '!=', null)->count();
    }
    function earningMonthly(){
        $data = Key::select(\DB::raw("SUM(selling_price)-SUM(buying_price) as monthEarning"))
            ->where('command_id', '!=', null)
            ->whereMonth('updated_at', Carbon::now()->month)
            ->first();
        return $data->monthEarning;
    }
    function earningThisYear(){
        $data = Key::select(\DB::raw("SUM(selling_price)-SUM(buying_price) as yearEarning"))
            ->where('command_id', '!=', null)
            ->whereYear('updated_at', Carbon::now()->year)
            ->first();
        return $data->yearEarning;
    }
}
