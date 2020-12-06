@extends('store.storeLayout')
@section('content')
<script src="{{asset('js/lib/jquery.js')}}"></script>
<script src="{{asset('js/dist/jquery.validate.js')}}"></script>

<link type="text/css" rel="stylesheet" href="{{asset('css/style_for_quantity.css')}}" />
<style>
label.error {
  color: #a94442;
  background-color: #f2dede;
  border-color: #ebccd1;
  padding:1px 20px 1px 20px;
}

    .rTable {
        
    display: block;
    width:100%;
    
}
.rTableHeading, .rTableBody, .rTableFoot, .rTableRow{
    clear: both;
}
.rTableHead, .rTableFoot{
    background-color: #DDD;
    font-weight: bold;
}
.rTableCell, .rTableHead {
    
    float: left;
    overflow: hidden;
    padding: 3px 1.8%;
    width:20%;
    
}
.rTable:after {
    visibility: hidden;
    display: block;
    font-size: 0;
    content: " ";
    clear: both;
    height: 0;
}

</style>             

<!-- SECTION -->
<div class="section">
    <!-- container -->
        <div class="container">
        <!-- row -->
        

            <!-- Order Details -->
            <div class="col-md-5 order-details" style="width: 100%;">
                <div class="section-title text-center">
                    <h3 class="title">Your Order</h3>
                </div>
                <div id="order_summary" class="order-summary">
                   
                   
                   
                    @if($all != null)
                    <table class="table table-hover">
                        <thead style="background-color:rgb(214, 214, 214);">
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Platform</th>
                            <th scope="col">PRODUCT</th>
                            <th scope="col">PRICE</th>
                            <th scope="col">QUANTITY</th>
                            <th scope="col">Subtotal</th>
                        </tr>
                        </thead>
                        <tbody>
					@foreach($all as $c)
                    @php
                        $p = App\Product::find($c[0]); // getting product by id   
                    @endphp
                        <tr id="deleteItem_{{$c[3]}}">
                         
                            <td> <button id="delete_item" class="delete_item btn btn-danger btn-xs rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete" value={{$c[3]}} name="delete_item"><i class="fa fa-xs fa-trash"></i></button></td>
                            <td><b>{{$p->category->name}}</b></td>
                            <td><a class="add-to-cart-btn" href="{{route('user.view',['id'=>$p->id])}}"><img src="{{asset('storage/' . $p->image)}}" width="30px" height="30px"> <b>{{$p->name}}</b></a></td>
                            <td><div style="height:30px;display:inline-block;"><b>{{$p->discount != null ? $p->discount : $p->price}} TND</b></div></td>
                            <td>
                                <button type="button" id="sub" value={{$p->id}} data-rel={{$c[3]}} data-rel2={{$p->discount != null ? $p->discount : $p->price}} class="sub">-</button>   
                                <input type="number"  id="quantity" style="width:30%" name={{$p->id}} value={{$c[1]}} min="1" max="100" readonly/>
                                <button type="button" id="add" value={{$p->id}} data-rel={{$c[3]}} data-rel2={{$p->discount != null ? $p->discount : $p->price}}  class="add">+</button>
                            </td>
                            <td><div id="individualPrice_{{$c[3]}}">
                                
                                <b>@php
                                if($p->discount != null)
                                    $tot =$p->discount* $c[1];
                                else
                                    $tot = $p->price * $c[1];
                                echo $tot;
                                @endphp

                                TND</b>
                                </div>
                            </td>
                                
						</tr>
					@endforeach 
                    </tbody>
                    </table>
                    <hr>
                    <div class="order-col text-right">
                        <strong class="">Total price : </strong>
                        <strong class="order-total" id="totalCost">{{Session::get('price')}} TND</strong>
                    </div>
                    @else
                    <div class="col-md-12 text-center">
                        <h4 >Your cart is empty! Go ahead and add some cool stuff to it!</h4>
                    @if(!session('user'))
                        <small>Or <a style="color:blue;" href="{{route('user.login')}}">log in</a> to check if there's something in it already!</small>
                    @endif
                    </div>
                    @endif
                    
                @if(session('user'))
                    @if($all != null)
                   <form method="post" name="cart">
                        {{csrf_field()}}
                        <input type="submit" id="confirm_order"  name="order" class="primary-btn order-submit" value="Confirm order">
                    </form>
                    @else
                        <div class="col-md-13 text-center mt-3">
                            <a class="text-center" href="{{route('user.home')}}"><input type="button"  class="primary-btn" value="Shop Now"></a>
                        </div>
                    @endif
                
                @else
                <div class="row">
                <form method="post" id="signupForm">
                    {{csrf_field()}}
                    </form>
                    
                </div>      
                <br>
                @if($all != null)
                <div class="order-col">
                    <a class="text-center" href="{{route('user.login')}}"><input type="button"  class="primary-btn" value="PROCEED TO CHCKOUT"></a>
                </div>  
                @endif                
                @endif
                

                
        </div>

            <!-- /Order Details -->
        
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<script>
    
   //TO DO: ajax 
    
    $('.add').click(function () {

    var url="{{route('user.editCart')}}";
    var product_id= $(this).val(); 
    $(this).prev().val(+$(this).prev().val() + 1);
    var x=$(this).prev().val(); 
    var token=$("input[name=_token]").val();
    var order_serial=this.getAttribute('data-rel');
    var product_price=this.getAttribute('data-rel2');


    $.ajax({
            type:'post',
            url:url,
            dataType: "JSON",
            async: false,
            data:{pid: product_id, newQ:x, oSerial:order_serial, _token: token},
            success:function(msg)
            {
                document.getElementById("individualPrice_"+order_serial).innerHTML= "<b>"+x*product_price+" TND</b>";
                document.getElementById("totalCost").innerHTML = msg[2]+" TND";
            }
            });
        
    });
    $('.sub').click(function () {
        
        var url="{{route('user.editCart')}}";
        var product_id= $(this).val();
        var order_serial=this.getAttribute('data-rel');
        var product_price=this.getAttribute('data-rel2');
        if ($(this).next().val() > 1) 
        {
            $(this).next().val(+$(this).next().val() - 1);
            var x=$(this).next().val();
            var token=$("input[name=_token]").val();
            
            
            $.ajax({
            type:'post',
            url:url,
            dataType: "JSON",
            async: false,
            data:{pid: product_id, newQ:x, oSerial:order_serial, _token: token},
            success:function(msg)
            {
                document.getElementById("individualPrice_"+order_serial).innerHTML=x*product_price+" TND";
                document.getElementById("totalCost").innerHTML = msg[2]+" TND";

            }
            });
            
        
        }
    });
    
    $('.delete_item').click(function () {
        var url="{{route('user.deleteCartItem')}}";
        var serial= $(this).val();   //serial is the forth element of sale coloumn
        var token=$("input[name=_token]").val();
        var id_holder="deleteItem_"+serial;
        $.ajax({
                type:'post',
                url:url,
                dataType: "JSON",
                async: false,
                data:{serial:serial, _token: token},
                success:function(msg)
                {
                    if(msg=="Empty")
                        {
                            document.getElementById("order_summary").innerHTML = '<div class="col-md-12 text-center"><h4 >Your cart is empty! Go ahead and add some cool stuff to it!</h4></div>';
                            document.getElementById("confirm_order").style.visibility = "hidden";
                            document.getElementById("confirm_order").style.disabled = "true";
                            document.getElementById("order_summary").innerHTML += '<div class="col-md-13 text-center mt-3"><a class="text-center" href="{{route('user.home')}}"><input type="button"  class="primary-btn" value="Shop Now"></a></div>';
                        }
                   
                    //$("#deleteItem_".$p->id").load(location.href+" #refresh_div","");
                    document.getElementById(id_holder).innerHTML  = "";
                    document.getElementById("totalCost").innerHTML = msg[2];
                }
                });


    });
	
    
    
</script>

@endsection
