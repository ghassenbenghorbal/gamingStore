<?php

namespace App\Http\Controllers\admin_panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Deposit;
use App\Income;

class depositsController extends Controller
{
    public function index()
    {
    	return view('admin_panel.deposits.index')
    		->with('deposits', Income::all());

    }
    public function create(){
        return view('admin_panel.deposits.create');
    }
    public function store(Request $request){
        $rules = [
            'payment_method' => 'required',
            'code' => 'required',
            'amount'=>'required'
        ];
        $validator = $request->validate($rules);
        $inc = new Income();
        if($request->type == "1"){ // D17
            $inc->type = 1;
        }else{ // bank
            $inc->type = 0;
        }
        $inc->code = $request->code;
        $inc->amount = $request->amount;
        $dep = Deposit::where('code', $request->code)->first();
        if($dep != null){ // user deposited code already
            if($dep->status != 1){ // deposit not approved yet
                $dep->status = 1; // approved
                $dep->amount = $inc->amount;
                if($dep->type != $inc->type)
                    $dep->type = $inc->type;
                $dep->save();
                // balance update
                $user = User::where('id', $dep->user_id)->first();
                $user->balance += $inc->amount;
                $user->save();
                $inc->deposit_id = $dep->id;
                $inc->save();
            }else{ // TODO: flush error message Code Already used
                $request->session()->flash('message', 'Code Already Redeemed');
                return redirect(route('admin.deposits.create'));
            }
        }else{ // admin added deposit before user
            $inc->save();
        }
        return redirect(route('admin.deposits'));

    }
    public function delete(Request $request){
        $inc = Income::find($request->id);
        $inc->delete();
        $request->session()->flash('message', 'Deposit deleted successfully');
        return redirect(route('admin.deposits'));

    }
}
