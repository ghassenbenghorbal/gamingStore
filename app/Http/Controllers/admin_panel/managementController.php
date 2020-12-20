<?php

namespace App\Http\Controllers\admin_panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;
use App\sale;
use App\User;
use App\Address;
class managementController extends Controller
{
    public function manage()
    {
    	$res1= sale::all();
        if(!$res1)
        {
			return view('admin_panel.dashboard.orderManagement')->with('all',[])
	         ->with('products',[])
	         ->with('sale',[]);
        }
        return view('admin_panel.orders.index')
        ->with('sale',$res1);

    }

}
