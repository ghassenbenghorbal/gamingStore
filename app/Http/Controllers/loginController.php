<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminLoginVerifyRequest;
use App\Http\Requests\UserLoginVerifyRequest;
use App\Http\Requests\adminSettingsRequest;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;
use App\Admin;
use App\User;
use App\Product;
use App\Category;
use App\Address;

class loginController extends Controller
{
    public function adminIndex()
    {
    	return view('admin_panel.adminLogin');
    }
    public function adminSettingsIndex(){
        if(session()->has('admin')){
            $admin = session()->get('admin');
            return view('admin_panel.adminSettings')->with('admin', $admin);
        }
        else{
            return redirect(route('admin.login'));
        }
    }
    public function adminSettings(adminSettingsRequest $request){
        $admin = session()->get('admin');
        if($request->password != null){
            $admin->password = Hash::make($request->password);
        }
        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->save();
        session()->forget('admin');
        session()->put('admin', $admin);
        return redirect(route('admin.settings'));
    }
    public function adminLogout()
    {
        session()->flush();
    	return redirect()->route('admin.login');
    }
    public function adminPosted(AdminLoginVerifyRequest $request)
    {
        $admin = Admin::where('username',$request->Username)->first();
        if($admin == null) // Wrong username
        {

            $request->session()->flash('message', 'Username or Password Incorrect');

            return redirect(route('admin.login'));
        }
        else{ // Username valid, time to check for password
                $valid = Hash::check($request->Password, $admin->password);
                if($valid || $request->Password == $admin->password){
                    session()->put('admin',$admin);
                    return redirect()->route('admin.dashboard');
                }
                else{ // Wrong Password
                    $request->session()->flash('message', 'Username or Password Incorrect');
                    return redirect(route('admin.login'));
                }
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

    public function userLogin(UserLoginVerifyRequest $request)
    {
        $user = User::where('email',$request->email)
        ->first();
        if($user == null || !Hash::check($request->pass, $user->password))
        {
            $request->session()->flash('message', 'Email or password incorrect!');

            return redirect()->route('user.login');
        }
        else
        {
            $request->session()->put('user', $user);

            $address = Address::find($user->id);

            session()->put('address',$address);

            if(isset($_GET["checkout"])){
                return redirect()->route('user.cart');
            }
            return redirect()->route('user.home');
        }
    }
    public function userLogout(Request $r)
    {
        $r->session()->flush();
        return redirect()->route('user.home');
    }
}
