<?php
namespace App\Http\Controllers\user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\mail\Mailer;
use App\Http\Requests\orderRequest;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;
use App\sale;
use App\Key;
use App\User;
use App\Address;
use App\Deposit;
use App\Income;
use App\Command;
use Session;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PasswordResetVerifyRequest;
use Illuminate\Support\Facades\Validator;




class userController extends Controller
{
    public function index()
    {
    	$res = Product::all();
        $cat = Category::all();
    	return view('store.index')
            ->with('products', $res)
            ->with("cat", $cat)
            ->with('index', 1);
    }
    public function view($id)
    {

        $res = Product::find($id);
        $res1 = Product::all();
        $cat=Category::find($res->category_id);
    	$cat = Category::all();
        return view('store.product')
            ->with('product', $res)
            ->with('products', $res1)
            ->with('cat', $cat);
    }

    public function search(Request $r){
        $category ;
        $name ;
        if($r->query("c")){
            $category = $r->query("c");
        }
        if($r->query("n")){
            $name = $r->query("n");
        }
        $res = Product::all();
        $cat = Category::all();

        if(isset($category) && isset($name)){
            $name = strtolower($name);
            $sRes = DB::select( DB::raw("SELECT * FROM `products` WHERE lower(name) like '%$name%' and category_id = $category" ) );
            //dd("SELECT * FROM `products` WHERE lower(name) like '%$name%' and category_id = $category" );
            //$a = 0;
        }
        else if(isset($name)){
            $name = strtolower($name);
            $sRes = DB::select( DB::raw("SELECT * FROM `products` WHERE lower(name) like '%$name%'" ) );
          //dd("SELECT * FROM `products` WHERE lower(name) like '%$name%'" );
           // $a = 1;
        }
        else if(isset($category)){
            $sRes = DB::table('products')
            ->where("category_id" , $category)
            ->get();
            //$a = 2;
        }
        else{
            $sRes = DB::table('products')
            ->get();
           // $a= 3;
        }

        if(!isset($category)) {
            $category = -1;
        }
        //dd($sRes);
    	return view('store.search')
            ->with('products', $sRes)
            ->with("cat", $cat)
            ->with("a", $category);
    }

    public function addToCart($id,orderRequest $r)
    {

        if((int)$r->quantity < 1 ||
            Key::where([['product_id', $id], ['command_id', null]])->count() < (int)$r->quantity){
            return redirect(route('user.view',['id'=>$id]));
        }else{
            if(!(Session::has('cart')))
            {
                Session::put('orderCounter',1);
                $c=$id.":".$r->quantity."::".Session::get('orderCounter');
                Session::put('cart',$c);
            }
            else
            {
                Session::put('orderCounter',Session::get('orderCounter')+1);
                $cd=$id.":".$r->quantity."::".Session::get('orderCounter');
                $total=Session::get('cart').",".$cd;
                Session::put('cart',$total);
            }
            return redirect()->route('user.cart');
        }
    }

    public function cart(Request $r)
    {   //Session::forget('cart');
        $res = Product::all();
        $cat = Category::all();
        if(!Session::has('cart'))
        {
            return view('store.cart')->with('all',null)
            ->with('products', $res)
            ->with("cat", $cat);
        }
        $cart=[];
        $product=[];
        $cost=0;
        $cost_after_quantity=0;
        $totalCart = explode(',',Session::get('cart'));
        //dd(Session::get('cart'));
        foreach($totalCart as $c)
        {
            $cart[]=explode(':',$c);
            $a=explode(':',$c);
            $res = Product::find($a[0]);
            $product[]=$res;
            if($res->discount != null)
                $cost_after_quantity=$a[1]*$res->discount;
            else
                $cost_after_quantity=$a[1]*$res->price;
            $cost += $cost_after_quantity;

        }
        Session::put('price',$cost);
    	return view('store.cart')
            ->with('products', $res)
            ->with("cat", $cat)
            ->with('all',$cart)
            ->with('prod',$product)
            ->with('total',Session::get('price'));
    }

//    for quntity control in cart
        public function editCart(Request $r)
    {
        $newres = Product::all();
        $newcat = Category::all();
        $newcart=[];
        $newproduct=[];
        $newcost=0;
        $newtotalCart = explode(',',Session::get('cart'));
        //dd(Session::get('cart'));
        foreach($newtotalCart as $c)
        {
            $newcart[]=explode(':',$c);
        }
        foreach($newcart as $t)
        {
                if($t[0]==$r->pid && $t[3]==$r->oSerial)
                {

                    $t[1]=$r->newQ;
                }
                if(!(Session::has('tempCart')))
                {

                    $str=$t[0].":".$t[1].":".$t[2].":".$t[3];
                    Session::put('tempCart',$str);
                }
                else
                {
                    $str2=$t[0].":".$t[1].":".$t[2].":".$t[3];
                    $mytotal=Session::get('tempCart').",".$str2;
                    Session::put('tempCart',$mytotal);
                }

        }
            Session::forget('cart');
            Session::put('cart',Session::get('tempCart'));
            Session::forget('tempCart');

            //for price update
            $res = Product::all();
            $cat = Category::all();
            $cart=[];
            $product=[];
            $cost=0;
            $cost_after_quantity=0;
            Session::forget('price');
            $totalCart = explode(',',Session::get('cart'));
            //dd(Session::get('cart'));
            foreach($totalCart as $c)
            {
                $cart[]=explode(':',$c);
                $a=explode(':',$c);
                $res = Product::find($a[0]);
                $product[]=$res;
                if($res->discount != null)
                    $cost_after_quantity=$a[1]*$res->discount;
                else
                    $cost_after_quantity=$a[1]*$res->price;
                $cost+= $cost_after_quantity;
                Session::put('price',$cost);

            }
            //dd(Session::get('price'));
            //end
            //dd($myarr);
            $szn[0]=Session::get('cart');
            $szn[1]=Session::get('price');
            $szn[2]=$cost;


            return json_encode($szn);
            exit;


    }
//    for quntity control in cart ENDS

    public function deleteCartItem(Request $r)
    {


        $counter=0;
        $newtotalCart = explode(',',Session::get('cart'));
        //dd(Session::get('cart'));
        foreach($newtotalCart as $c)
        {
            $newcart[]=explode(':',$c);
        }
        foreach($newcart as $t)
        {
                if($t[3]==$r->serial)
                {
                    $another_counter=$counter;
                }
                $counter++;
        }
        array_splice($newtotalCart, $another_counter, 1);

        //testing Starts
        //dd(Session::get('tempCart'));
         foreach($newtotalCart as $c2)
        {

            $newcart2[]=explode(':',$c2);
        }

        if($newtotalCart==null)
        {
            Session::forget('cart');
            Session::forget('price');
            Session::forget('orderCounter');
            return json_encode("Empty");
            exit;

        }

        else
        {
            foreach($newcart2 as $t2)
        {

                if(!(Session::has('tempCart')))
                {

                    $str2=$t2[0].":".$t2[1].":".$t2[2].":".$t2[3];
                    Session::put('tempCart',$str2);


                }
                else
                {
                    $str2=$t2[0].":".$t2[1].":".$t2[2].":".$t2[3];
                    $mytotal2=Session::get('tempCart').",".$str2;
                    Session::put('tempCart',$mytotal2);
                }

        }

            Session::forget('cart');
            Session::put('cart',Session::get('tempCart'));
            Session::forget('tempCart');

            //for price update
            $res = Product::all();
            $cat = Category::all();
            $cart=[];
            $product=[];
            $cost=0;
            $cost_after_quantity=0;
            Session::forget('price');
            $totalCart = explode(',',Session::get('cart'));
            //dd(Session::get('cart'));
            foreach($totalCart as $c)
            {
                $cart[]=explode(':',$c);
                $a=explode(':',$c);
                $res = Product::find($a[0]);
                $product[]=$res;
                if($res->discount != null)
                    $cost_after_quantity=$a[1]*$res->discount;
                else
                    $cost_after_quantity=$a[1]*$res->price;
                $cost+= $cost_after_quantity;
                Session::put('price',$cost);

            }
            $szn[0]=Session::get('cart');
            $szn[1]=Session::get('price');
            $szn[2]=$cost;
            $szn[3]=$r->serial;
            return json_encode($szn);
            exit;
        }





        //testing ends
    }


    public function confirm(Request $r)
    {
        if(Session::has('user'))
        {
            $user = session('user');
            if(session('price') <= $user->balance){
                $all = explode(',', session('cart'));
                $total = 0;
                foreach ($all as $lignCommande) { // double checking if price <= balance in case sm1 manually changed the session price
                    $prod = Product::where('id', $lignCommande[0])->first();
                    $lignCommande = explode(':', $lignCommande);
                    if($prod->keys->where('command_id', null)->count() < (int)$lignCommande[1]) // quantity > stock
                        return redirect(route("user.cart"));
                    if($prod->discount != null){
                        $total += (int)$lignCommande[2] * $prod->discount;
                    }
                    else{
                        $total += (int)$lignCommande[2] * $prod->price;
                    }
                }
                if($total > $user->balance){
                    $r->session()->flash('message', 'Nice try kid');
                    return redirect()->route('user.cart');
                }
                $sales= new sale();
                $sales->user_id=session('user')->id;
                $sales->price=session('price');
                $sales->save();
                $id = $sales->id;


                foreach ($all as $lignCommande) {
                    $lignCommande = explode(':', $lignCommande);
                    $commande = new Command();
                    $commande->sale_id = $id;
                    $commande->product_id = $lignCommande[0];
                    $commande->quantity = $lignCommande[1];
                    $commande->order_status = 1;
                    $latestOrder = Command::orderBy('created_at','DESC')->first();
                    if($latestOrder != null)
                        $commande->order_id = '#'.str_pad($latestOrder->id + 1, 5, "0", STR_PAD_LEFT);
                    else
                        $commande->order_id = '#'.str_pad(1, 5, "0", STR_PAD_LEFT);
                    $prod = Product::where('id', $lignCommande[0])->first();
                    if($prod->discount != null){
                        $commande->subtotal = (int)$lignCommande[1] * $prod->discount;
                    }
                    else{
                        $commande->subtotal = (int)$lignCommande[1] * $prod->price;
                    }
                    $commande->save();
                    for ($i=0; $i < $commande->quantity; $i++) { // assigning keys to user
                        $available_key = $prod->keys->where('command_id', null)->first();
                        if($available_key != null){
                            $available_key->command_id = $commande->id;
                            if($prod->discount == null)
                                $available_key->selling_price = $prod->price;
                            else
                                $available_key->selling_price = $prod->discount;
                            $available_key->save();
                        }else{
                            break;
                        }
                    }

                }
                $user->balance -= $sales->price;
                $user->save();
                // dd(1);
                Session::forget('cart');
                Session::forget('price');
                Session::forget('orderCounter');
                //dd( $r->session());

                $to_fullName = $user->full_name;
                $to_email = $user->email;

                Mailer::sendOrderConfirmationMail($to_fullName, $to_email, $sales);




                return redirect()->route('user.settings','orderHistory');
            }else{ // balance not enough
                $r->session()->flash('message', 'Not enough balance');
                return redirect()->route('user.cart');
            }
        }
        else{
            return redirect()->route('user.cart');
        }
    }
    public function history(Request $r)
    {
        if(session()->has('user')){
            $res = sale::where('user_id', session('user')->id)->first();
            return view('store.history')
            ->with('sales',$res);
        }
        else
            return view('store.login');
    }

    public function settings($tab, Request $r){
        if(session()->has('user')){

            $user = session()->get('user');
            $res1= sale::where('user_id', session('user')->id)->get();
            if(!$res1)
            {
                return view('user.orderHistory')->with('all',[])
                    ->with('products',[])
                    ->with('sale',[]);
            }

            $res = Product::all();
            $cat = Category::all();

            $depositHistory = $this->getDepositHistory($user->id);

            switch(strtolower($tab)){
                case 'password':
                        return view('store.passwordSettings')
                        ->with('products', $res)
                        ->with("cat", $cat)
                        ->with('sale',$res1)
                        ->with('depositHistory',$depositHistory)
                        ->with('tab', $tab);
                        break;
                case 'profile':
                        return view('store.profileSettings')
                        ->with('products', $res)
                        ->with("cat", $cat)
                        ->with('sale',$res1)
                        ->with('depositHistory',$depositHistory)
                        ->with('tab', $tab);
                        break;
                case 'orderhistory':
                    return view('store.orderHistorySettings')
                    ->with('products', $res)
                    ->with("cat", $cat)
                    ->with('sale',$res1)
                    ->with('depositHistory',$depositHistory)
                    ->with('tab', $tab);
                    break;
                case 'deposit':
                    return view('store.depositSettings')
                    ->with('products', $res)
                    ->with("cat", $cat)
                    ->with('sale',$res1)
                    ->with('depositHistory',$depositHistory)
                    ->with('tab', $tab);
                    break;
                case 'deposithistory':
                    return view('store.depositHistorySettings')
                    ->with('products', $res)
                    ->with("cat", $cat)
                    ->with('sale',$res1)
                    ->with('depositHistory',$depositHistory)
                    ->with('tab', $tab);
                    break;
            }
        }
        else{
            return redirect(route('user.login'));
        }
    }

    public function changeProfile(Request $request){
        if ($request->has('form1')) {

            $rules = [

                'email' => 'nullable|email',
                'zip' => 'nullable|numeric',
                'phone' => 'nullable|numeric'
            ];

            $validated = $request->validate($rules);

            if(session()->has('user')){
                $user = session()->get('user');
                $address = Address::find($user->address_id)->first();
                if($request->full_name != "" && $user->full_name != $request->full_name)
                    $user->full_name = $request->full_name;
                if($request->phone != "" && $user->phone != $request->phone)
                    $user->phone = $request->phone;
                if($request->email != "" && $user->email != $request->email)
                    $user->email = $request->email;
                if($request->area != "" && $address->area != $request->area)
                    $address->area = $request->area;
                if($request->city != "" && $address->city != $request->city)
                    $address->city = $request->city;
                if($request->zip != "" && $address->zip != $request->zip)
                    $address->zip = $request->zip;

                $user->save();
                $address->save();
                session()->forget('user');
                session()->put('user', $user);
                session()->forget('address');
                session()->put('address', $address);
                return redirect(route('user.settings', 'profile'));
            }
            else
                return redirect(route('user.login'));
        }


    }

    public function changePassword(Request $request){
        if ($request->has('form2')) {
            $rules = [
                'password' => 'required|confirmed|min:6'
            ];
            $validation = $request->validate($rules);

            if(session()->has('user')){
                $user = session()->get('user');
                if(Hash::check($request->current_password, $user->password)){
                $user->password = Hash::make($request->password);
                $user->save();
                session()->forget('user');
                session()->put('user', $user);
                return redirect(route('user.settings', 'password'));
                }
                $request->session()->flash('message', 'Current password incorrect');
                return redirect(route('user.settings', 'password'));
            }
            else
                return redirect(route('user.login'));

        }

    }

    public function deposit(Request $request){

        if ($request->has('form3')) {
            $rules = [
                'payment_method' => 'required',
                'code' => 'required',
                'amount'=>'required'
            ];
            $validator = $request->validate($rules);
            $dep = new Deposit();
            if($request->type == "1"){ // D17
                $dep->type = 1;
            }else{ // bank
                $dep->type = 0;
            }
            $dep->code = $request->code;
            $inc = Income::where('code', $request->code)->first();
            if($inc != null){ // code exists in database
                if($inc->deposit_id == null){ // Code not used
                    $dep->status = 1; // approved
                    if($dep->type != $inc->type)
                        $dep->type = $inc->type;
                    $user = session('user');
                    $dep->amount = $inc->amount;
                    $dep->user_id = session('user')->id;
                    $dep->save();
                    // balance update
                    $user->balance += $inc->amount;
                    $user->save();
                    session()->forget('user');
                    session()->put('user', $user);
                    $inc->deposit_id = $dep->id;
                    $inc->save();
                }else{ // TODO: flush error message Code Already used
                    $request->session()->flash('message', 'Code Already Used');
                    return redirect(route('user.settings', 'deposit'));
                }
            }else{
                $dep->status = 0;
                $dep->amount = $request->amount;
                $dep->user_id = session('user')->id;
                $dep->save();
            }
            return redirect(route('user.settings', 'depositHistory'));

        }

    }

    public function participer(request $request ,$id){
        //$user=Auth::user();
        $user=$request->session()->get('user');
        //echo($user);
        $user->competitions()->attach($id);
        return redirect('/competiti');

    }
    public function desincrir(request $request ,$id){
        //$user=Auth::user();
        $user=$request->session()->get('user');
        //echo($user);
        $user->competitions()->detach($id);
        return redirect('/competiti');

    }
    public function competitions(request $request){

        $id=$request->session()->get('user')->id;
        $user=User::find($id);
        //dump($user->competitions);

        return View('store.competitions.liste')->with("comps",$user->competitions);

    }
    public function searchcom(Request $r){

        $prod = $r->input("c");

        $name = $r->input("n");
        $prods=Product::all();



    if(isset($prod) && isset($name)){
        $name = strtolower($name);
        $sRes = DB::select( DB::raw("SELECT * FROM `competitions` WHERE lower(description) like '%$name%' and product_id = $prod" ) );
        //dd("SELECT * FROM `products` WHERE lower(name) like '%$name%' and prod_id = $prod" );
        //$a = 0;
    }
    else if(isset($name)){
        $name = strtolower($name);
        $sRes = DB::select( DB::raw("SELECT * FROM `competitions` WHERE lower(description) like '%$name%'" ) );
      //dd("SELECT * FROM `products` WHERE lower(name) like '%$name%'" );
       // $a = 1;
    }
    else if(isset($prod)){
        $sRes = DB::table('competitions')
        ->where("product_id" , $prod)
        ->get();
        //$a = 2;
    }
    else{
        $sRes = DB::table('competitions')
        ->get();
       // $a= 3;
    }


    //dd($sRes);
    return view('store.competitions.index')
        ->with('comps', $sRes)
        ->with('prods',$prods);
    }


    public function getDepositHistory($id){
        $depositHistory = Deposit::where('user_id',$id)->latest()->get();
        return $depositHistory;
    }
    
    public function getFilteredProducts(Request $request){
        try{

        $products = Product::all();
        if($request->filled('min_price') && $request->filled('max_price')){

            $products = $products->where('price', '>=', (int)$request->min_price)
                     ->where('price', '<=', (int)$request->max_price);
        }
        if($request->filled('genre')){
            $products = $products->whereIn('genre',$request->genre);
        }
        if($request->filled('tag')){
            $products = $products->whereIn('tag',$request->tag);
        }
        return response()->json([
            'products'=>$products,
            'request' =>$request->all()
            ]);
        }catch(Exception $e){
            return response()->json([
                'error' => $e->getMessage()
                ]);
        }

    }

}
