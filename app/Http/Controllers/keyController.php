<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\orderRequest;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;
use App\sale;
use App\User;
use App\Address;
use App\Deposit;
use App\Income;
use App\Key;
use Session;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PasswordResetVerifyRequest;
use Illuminate\Support\Facades\Validator;

class keyController extends Controller
{
    public function displayKey(Request $r, $id){
        if(session()->has('user')){
            $res = Product::find($id);
            $res1 = Product::all();
            $cat = Category::all();
            $keys = $res->keys()->where('user_id',session()->get('user')->id)->get();
            return view('store.key')
            ->with('product', $res)
            ->with('products', $res1)
            ->with('cat', $cat)
            ->with('keys', $keys);
                    
        }
    }

}
