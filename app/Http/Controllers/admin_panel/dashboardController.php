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
        $users = DB::table('users')
                    ->select(\DB::raw("Month(created_at) as month"), \DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', Carbon::now()->year)
                    ->groupBy(\DB::raw("month"))
                    ->pluck('count', 'month')->all();
        $months = [1=>'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Aug', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec'];
        $labels = [];
        if(count(array_keys($users)) > 0){ // data not empty
            foreach (array_keys($users) as $month) {
                $labels[] = $months[$month];
                $last = $month;
            }
            while(count($labels) < 5){
                $last++;
                if($last > 12)
                    $last = 1;
                $labels[] = $months[$last];
            }
        }
        else
            $labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $userChart = new UserChart;
        $userChart->labels($labels);
        $userChart->dataset(Carbon::now()->year.' New Users Chart ', 'bar', array_values($users))->options([
            'backgroundColor' => 'rgb(136, 98, 224, 0.31)',
            'borderColor' => "rgba(136, 98, 224, 0.7)",
            "pointBorderColor" => "rgba(136, 98, 224, 0.7)",
            "pointBackgroundColor" => "rgba(136, 98, 224, 0.7)",
            "pointHoverBackgroundColor" => "#fff",
            "pointHoverBorderColor" => "rgba(220,220,220,1)",
        ]);
        //====================================================================================================================================//
        $earnings = DB::table('keys')
                            ->select(\DB::raw("Month(updated_at) as month"), \DB::raw("SUM(selling_price)-SUM(buying_price) as monthEarning"))
                            ->where('command_id', '!=', null)
                            ->whereYear('updated_at', Carbon::now()->year)
                            ->groupBy("month")
                            ->pluck('monthEarning', 'month')->all();
        $labels = [];
        if(count(array_keys($earnings)) > 0){ // data not empty
            foreach (array_keys($earnings) as $month) {
                $labels[] = $months[$month];
                $last = $month;
            }
            while(count($labels) < 5){
                $last++;
                if($last > 12)
                    $last = 1;
                $labels[] = $months[$last];
            }
        }
        else
            $labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $earningsChart = new UserChart;
        $earningsChart->labels($labels);
        $earningsChart->dataset('Earnings Chart (TND)', 'line', array_values($earnings))->options([
            'backgroundColor' => "rgba(38, 185, 154, 0.31)",
            'borderColor' => "rgba(38, 185, 154, 0.7)",
            "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
            "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
            "pointHoverBackgroundColor" => "#fff",
            "pointHoverBorderColor" => "rgba(220,220,220,1)",
        ]);

        //===================================================================================================================================/
        $mostSoldProducts = DB::table('keys')
                            ->select("name", \DB::raw("count(product_id) as nProd"))
                            ->join('products', 'keys.product_id', '=', 'products.id')
                            ->where('command_id', '!=', null)
                            ->whereYear('keys.updated_at', Carbon::now()->year)
                            ->groupBy("name")
                            ->pluck('nProd', 'name')->all();
        $salesChart = new UserChart;
        $salesChart->labels(array_keys($mostSoldProducts));
        $salesChart->displayAxes(false);
        $salesChart->dataset('Most Sold Products', 'pie', array_values($mostSoldProducts))->options([
            'backgroundColor' => ["rgba(38, 185, 154, 0.31)", "rgb(136, 98, 224, 0.31)", "rgb(3, 19, 252, 0.31)", "rgb(255, 243, 5, 0.31)", "rgb(255, 34, 18, 0.31)", "rgb(255, 18, 212, 0.31)", "rgb(255, 160, 18, 0.31)", "rgb(219, 255, 18, 0.31)"],
            'borderColor' => ["rgba(38, 185, 154, 0.7)", "rgb(136, 98, 224, 0.7)", "rgb(3, 19, 252, 0.7)", "rgb(255, 243, 5, 0.7)", "rgb(255, 34, 18, 0.7)", "rgb(255, 18, 212, 0.7)", "rgb(255, 160, 18, 0.7)", "rgb(219, 255, 18, 0.7)"],
            "pointBorderColor" => ["rgba(38, 185, 154, 0.7)", "rgb(136, 98, 224, 0.7)", "rgb(3, 19, 252, 0.7)", "rgb(255, 243, 5, 0.7)", "rgb(255, 34, 18, 0.7)", "rgb(255, 18, 212, 0.7)", "rgb(255, 160, 18, 0.7)", "rgb(219, 255, 18, 0.7)"],
            "pointBackgroundColor" => ["rgba(38, 185, 154, 0.7)", "rgb(136, 98, 224, 0.7)", "rgb(3, 19, 252, 0.7)", "rgb(255, 243, 5, 0.7)", "rgb(255, 34, 18, 0.7)", "rgb(255, 18, 212, 0.7)", "rgb(255, 160, 18, 0.7)", "rgb(219, 255, 18, 0.7)"],
            "pointHoverBackgroundColor" => "#fff",
            "pointHoverBorderColor" => "rgba(220,220,220,1)",
        ]);
        //===================================================================================================================================/
        $months2 = [1=>'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'];
        return view('admin_panel.dashboard.index', compact('userChart', 'earningsChart', 'salesChart'))
        ->with('sales', sale::all())
        ->with('sold_products', $this->TotalProductSold())
        ->with('monthEarnings', $this->earningMonthly())
        ->with('yearEarnings', $this->earningThisYear())
        ->with('months', $months2);
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
