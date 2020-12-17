<?php

namespace App\Http\Controllers\admin_panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Income;
class depositsController extends Controller
{
    public function index()
    {
    	return view('admin_panel.deposits.index')
    		->with('deposits', Income::all());

    }
}
