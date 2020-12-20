<?php

namespace App\Http\Controllers\admin_panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;
use App\Key;

class keysController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $keys = Key::all();

    	return view('admin_panel.keys.index')
            ->with('keyList', $keys)
            ->with('productList', $products);

    }

    public function create(){

        $products = Product::all();
        return view('admin_panel.keys.create')
                ->with('products',$products);
    }

    public function store(Request $request)
    {
        $rules = [
            'product_name' => 'required',
            'codes' => 'required',
            'buying_price'=>'required'
        ];
        $validator = $request->validate($rules);
        try {
            $codes = $request->codes;
            $codes = preg_split('/\R/', $codes);            ;
            foreach($codes as $code){
                $key = new Key;
                $key->code = $code;
                $key->product_id = $request->product_name;
                $key->buying_price = $request->buying_price;
                $key->save();
            }
            return redirect()->route('admin.keys');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }

    }
    public function destroy($id){

        $key = Key::find($id);
        $key->delete();

        return redirect()->route('admin.keys');

    }
}
