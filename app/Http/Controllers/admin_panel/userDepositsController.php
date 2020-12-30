<?php

namespace App\Http\Controllers\admin_panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Deposit;

class userDepositsController extends Controller
{
    public function index()
    {
    	return view('admin_panel.userdeposits.index')
    		->with('deposits', Deposit::all());

    }
}
