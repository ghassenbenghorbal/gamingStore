<?php

namespace App\Http\Controllers\admin_panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\sale;
use App\User;
use App\Charts\UserChart;

class dashboardController extends Controller
{
    public function index(){
        $users = User::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(\DB::raw("Month(created_at)"))
                    ->pluck('count');

        $chart = new UserChart;
        $chart->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']);
        $chart->dataset('New User Register Chart', 'line', $users)->options([
            'borderColor' => '#51C1C0',
            'backgroundColor' => '#9ec3ff'
        ]);

        return view('admin_panel.dashboard.index', compact('chart'))
        ->with('sales', sale::all());
    }
}
