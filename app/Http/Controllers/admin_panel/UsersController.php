<?php

namespace App\Http\Controllers\admin_panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class UsersController extends Controller
{
    public function index()
    {
    	return view('admin_panel.users.index');
    }
    public function destroy($id){

        $user = User::find($id);
        $user->delete();

        return redirect()->route('admin.users');

    }
    public function restore($id){
        User::withTrashed()
        ->where('id', $id)->restore();
        return redirect()->route('admin.users');

    }
}
