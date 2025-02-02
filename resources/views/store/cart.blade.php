@extends('store.storeLayout')
@section('content')

<script src="{{asset('js/lib/jquery.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/dist/jquery.validate.js')}}"></script>

<link type="text/css" rel="stylesheet" href="{{asset('css/style_for_quantity.css')}}" />
<style>
label.error {
  color: #a94442;
  background-color: #f2dede;
  border-color: #ebccd1;
  padding:1px 20px 1px 20px;
}
.modal-center {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
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
.proccessing-message{
    display: inline-block;
    font-size: 16px;
    font-weight: bold;
}
.loader {
  display: inline-table;
  border: 4px solid lightgrey; /* Light grey */
  border-top: 4px solid #28a745; /* Blue */
  border-radius: 50%;
  width: 20px;
  height: 20px;
  animation: spin 1s linear infinite;
}
@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
/*Huge thanks to @tobiasahlin at http://tobiasahlin.com/spinkit/ */
.spinner {
  display: inline-block;
  width: 30px;
  text-align: center;
}

.spinner > div {
  width: 6px;
  height: 6px;
  background-color: #333;

  border-radius: 100%;
  display: inline-block;
  -webkit-animation: sk-bouncedelay 1.4s infinite ease-in-out both;
  animation: sk-bouncedelay 1.4s infinite ease-in-out both;
}

.spinner .bounce1 {
  -webkit-animation-delay: -0.32s;
  animation-delay: -0.32s;
}

.spinner .bounce2 {
  -webkit-animation-delay: -0.16s;
  animation-delay: -0.16s;
}

@-webkit-keyframes sk-bouncedelay {
  0%, 80%, 100% { -webkit-transform: scale(0) }
  40% { -webkit-transform: scale(1.0) }
}

@keyframes sk-bouncedelay {
  0%, 80%, 100% {
    -webkit-transform: scale(0);
    transform: scale(0);
  } 40% {
    -webkit-transform: scale(1.0);
    transform: scale(1.0);
  }
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
                        <form method="post" name="cart" style="display: inline-block;">
                            {{csrf_field()}}
                            <input type="submit" id="confirm_order"  name="order" class="primary-btn order-submit" value="Confirm order"  data-toggle="modal" data-target="#processingModal" data-keyboard="false">
                        </form>
                        <div class="modal fade modal-center" id="processingModal" tabindex="-1" role="dialog" aria-labelledby="processingModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-body">
                                    <div class="loader"></div>
                                    <span class="proccessing-message">Proccessing order please wait</span>
                                        <div class="spinner">
                                            <div class="bounce1"></div>
                                            <div class="bounce2"></div>
                                            <div class="bounce3"></div>
                                        </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        @if(session('message'))
                        <button id="modalToggle" hidden="hidden" data-toggle="modal" data-target="#exampleModal"></button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">{{session('message')}}</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <b>You don't have enough balance to complete this order</b><br><small>Add money to your balance and try again!</small>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                  <a type="button" class="btn btn-success" href="{{ route('user.settings', 'deposit')}}">Deposit</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        <script>
                            window.addEventListener('load', (event) => {
                                document.getElementById('modalToggle').click();
                            });
                        </script>
                        @endif
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
                    <a class="text-center" href="{{route('user.login')}}?checkout=1"><input type="button"  class="primary-btn" value="PROCEED TO CHCKOUT"></a>
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
                document.getElementById("individualPrice_"+order_serial).innerHTML="<b>"+x*product_price+" TND</b>";
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
                    document.getElementById("totalCost").innerHTML = msg[2] + " TND";
                }
                });


    });



</script>

@endsection
