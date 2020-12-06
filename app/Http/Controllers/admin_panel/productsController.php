<?php

namespace App\Http\Controllers\admin_panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductVerifyRequest;
use App\Http\Requests\ProductEditVerifyRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;


class productsController extends Controller
{
   public function index()
    {
        $result = Product::all();

    	return view('admin_panel.products.index')
    		->with('prdlist', $result);
        
    }
    
     public function create()
    {
        $result = Category::all();
        return view('admin_panel.products.create')
            ->with('catlist', $result);
        
    }
    
    
    
    public function store(ProductVerifyRequest $request)
    { 
        try {
            
            $prd = new Product();
            $prd->image = $request->Image->store('uploads', 'public');
            $prd->name = $request->Name;
            $prd->description = $request->Description;
            $prd->category_id = $request->Category;
            $prd->price = $request->Price;
            if($request->Discounted_Price != null)
                $prd->discount = $request->Discounted_Price;
            $prd->tag = $request->Tags;
            $prd->save();
        return redirect()->route('admin.products');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
        
    }
    
    
    public function edit($id)
    {
        $cat = Category::all();
        
          

        $prd = Product::find($id);
        
        
        
        return view('admin_panel.products.edit')
            ->with('product', $prd)
            ->with('catlist', $cat)
            ->with('select_attribute', '');

            
    }

    public function update(ProductEditVerifyRequest $request, $id)
    {
        $prdToUpdate = Product::find($request->id);
        $prdToUpdate->name = $request->Name;
        $prdToUpdate->description = $request->Description;
        $prdToUpdate->price = $request->Price;
        if($request->Discounted_Price != null)
            $prdToUpdate->discount= $request->Discounted_Price;
        $prdToUpdate->category_id = $request->Category;
  
        $prdToUpdate->tag= $request->Tags;
        
        //NEW FILE UPLOADED
        if(!$request->image)
        {   
            $image_path = "storage/".$prdToUpdate->image;  // Value is not URL but directory file path
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            $prdToUpdate->image = $request->Image->store('uploads', 'public');
        
            $prdToUpdate->save();
            return redirect()->route('admin.products');
            
        }
        else
        {
            
            $prdToUpdate->save();
            return redirect()->route('admin.products');
        }
        
        
        
        
        
    }
    
    public function delete($id)
    {
       
        $prd = Product::find($id);

        return view('admin_panel.products.delete')
            ->with('product', $prd);
    }

    public function destroy(Request $request)
    {
        
       
        $prdToDelete = Product::find($request->id);
        
        //deleting image folder
        try{
            // $src='uploads/products/'.$prdToDelete->id.'/';
            // $dir = opendir($src);
            // while(false !== ( $file = readdir($dir)) ) {
            // if (( $file != '.' ) && ( $file != '..' )) {
            //     $full = $src . '/' . $file;
            //     if ( is_dir($full) ) {
            //         rrmdir($full);
            //     }
            //     else {
            //         unlink($full);
            //     }
            //     }
            // }
            // closedir($dir);
            // rmdir($src);
            $image_path = "storage/".$prdToDelete->image;  // Value is not URL but directory file path
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
        }
        catch(\Exception $e){

        }
        //deleting image folder done
        
       
        
        $prdToDelete->delete();
        
        return redirect()->route('admin.products'); 
    }

    
   
    
    
}
