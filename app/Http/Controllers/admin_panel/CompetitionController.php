<?php

namespace App\Http\Controllers\admin_panel;
use stdClass;
use App\Product;
use App\Competition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Collection;

class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {$comps=Competition::all();
        $prods=Product::all();
        //in_array($user,$comp->participants->all()
        //dd($comps[0]->participants->all());
        /*if(isset($request->session()->get('user')->id)){
            $id=$request->session()->get('user')->id;
            //dd($id);
            //dump($id);
            //dump($comps[0]->participants->all());
            $comps=[];
           
            foreach($comps1 as $com){
                $tab1=[];
                foreach($com->participants as $part){
                    array_push($tab1,$part->id);
                }
                $obj = new stdClass;
                //$obj->comp_lieu=$com->comp_lieu;
                $obj->id=$com->id;

                $obj->description=$com->description;
                $obj->participants=$tab1;


                $comps[]=$obj;
            }
            dump($comps);
          // dump(in_array($id,$comps[0]->participants->all()));
        }else{
            $id=null;
        }*/
        return View('store.competitions.index')->with('comps',$comps)->with('prods',$prods);//->with('user',$id); 
    
        
    }
    public function indexA(request $request)
    {$comps=Competition::all();
        
      
        return View('admin_panel.competitions.index')->with('comps',$comps);//->with('user',$id); 
    
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $prods=Product::all();
        return View('admin_panel.competitions.create')
        ->with('prods',$prods);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //dd($request->file('comp_image'));
     $filename=$request->comp_image->getClientOriginalName();
     
     $request->comp_image->storeAs('images',$filename,'public');
     $request->comp_image=$filename; 
     $c=new Competition();
     $c->comp_nom=$request->input('comp_nom');
     $c->comp_lieu=$request->input('comp_lieu');
     $c->comp_date=$request->input('comp_date');
     $c->nbr_participant=$request->input('nbr_participant');
     $c->description=$request->input('description');
     $c->product_id=$request->input('product_id');
     $c->comp_image=$filename;
     
     dump($request->all());
     
        $c->save();
    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function show($id,request $request)
    {
        $comp=Competition::find($id);
        //if(isset($request->session()->get('user')->id)){
           $id=$request->session()->get('user')->id;
            //dd($id);
            //dump($id);
            //dump($comps[0]->participants->all());
          
           
               $tab1=[];
                foreach($comp->participants as $part){
                    array_push($tab1,$part->id);
                }
                $com = new stdClass;
                $com->comp_nom=$comp->comp_nom;
                $com->comp_lieu=$comp->comp_lieu;
                $com->comp_date=$comp->comp_date;
                $com->id=$comp->id;
                $com->nbr_participant=$comp->nbr_participant;
                $com->description=$comp->description;
                $com->comp_image=$comp->comp_image;
                $com->participants=$tab1;


                
        //}
        return View('store.competitions.show')

        ->with('comp',$com)->with("user",$id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {$c=Competition::find($id);
        $p=Product::all();
        return View('admin_panel.competitions.edit')->with('comp',$c)->with('prods',$p);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $c=Competition::find($request->id);
        $c->comp_nom=$request->input('comp_nom');
        $c->comp_lieu=$request->input('comp_lieu');
        $c->comp_date=$request->input('comp_date');
        $c->nbr_participant=$request->input('nbr_participant');
        $c->description=$request->input('description');
        $c->product_id=$request->input('product_id');
        $c->nom_gagnant=$request->input('nom_gagnant');

        if($request->comp_image)
        {
            $image_path = "storage/images/".$c->comp_image; 
            //dump($image_path);
            
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            $filename=$request->comp_image->getClientOriginalName();
             $request->comp_image->storeAs('images',$filename, 'public');
             $c->comp_image =$filename;
        }
        $c->save();
        return redirect('/competitis');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    
    {
        Competition::destroy($id);
        return redirect('/competitis');
    }
    public function amettreajour(){
        $c=Competition::all();
       return View('admin_panel.competitions.mettreajour')->with('comps',$c);
     }
    public function misajour(request $request){
//echo("ojj");
      $com=Competition::find($request->input("id"));
      $com->nom_gagnant=$request->input("nom_gagnant");
      $com->save();
      return redirect('/competitis');
    }

}
