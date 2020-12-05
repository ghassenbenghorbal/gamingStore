<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminLoginVerifyRequest;
use App\Http\Requests\UserLoginVerifyRequest;

use Illuminate\Support\Facades\DB;
use App\Admin;
use App\User;
use App\Product;
use App\Category;


class loginController extends Controller
{
    public function adminIndex()
    {
    	return view('admin_panel.adminLogin');
    }
    public function adminLogout()
    {
        session()->flush();   
    	return redirect()->route('admin.login');
    }
    public function adminPosted(AdminLoginVerifyRequest $request)
    {  
        $admin = Admin::where('username',$request->Username)->where('password',$request->Password)->first();
        if($admin==null) // Wrong username or password
        {
            
            $request->session()->flash('message', 'Username or Password Incorrect');
            
            return redirect(route('admin.login'));
        }
        else{
                session()->put('admin',$admin);
                return redirect()->route('admin.dashboard');
        }
    }
    
    public function userIndex()
    {
        if(session()->has('user')){
            return redirect()->route("user.cart");
        }

        $res = Product::all();
        $cat = Category::all();

        return view('store.login')
        ->with('products', $res)
        ->with("cat", $cat);

    }

    public function userPosted(UserLoginVerifyRequest $request)
    {
        $user = User::where('email',$request->email)
        ->where('password',$request->pass)
        ->first();

        if($user==null)
        {
            $request->session()->flash('message', 'Invalid User');
    		
            return redirect()->route('user.login');
        }
        else
        {
            $request->session()->put('user', $user);
            return redirect()->route('user.home');
        }
    }
    public function userLogout(Request $r)
    {
        $r->session()->flush();
        return redirect()->route('user.home');
    }
}