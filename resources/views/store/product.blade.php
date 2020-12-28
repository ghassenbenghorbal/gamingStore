@extends('store.storeLayout')
@section('content')
<script src="{{asset('js/lib/jquery.js')}}"></script>
<script src="{{asset('js/dist/jquery.validate.js')}}"></script>
 <script data-require="jquery@3.1.1" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<link type="text/css" rel="stylesheet" href="{{asset('css/style_for_quantity.css')}}" />

<style>
label.error {
  color: #a94442;
  background-color: #f2dede;
  border-color: #ebccd1;
  padding:1px 20px 1px 20px;
}


</style>

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- Product main img -->
            <div class="col-md-4 ">
                <div id="product-main-img">
                    <div>
                        <img src="{{asset('storage/' . $product->image)}}" alt="" width="330px" height="380px">
                    </div>
                </div>
            </div>
            <!-- /Product main img -->


            <!-- Product details -->
            <div class="col-md-5">
                <div class="product-details">
                    <h2 class="product-name">{{$product->name}}</h2>
                    <div>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="product-price"> {{$product->discount != null ? $product->discount : $product->price}} TND
                             @if($product->discount != null)
                            <del class="product-old-price"> {{$product->price}} TND</del>
                            @endif
                        </h3>
                        @php
                            $stock = $product->keys->where('command_id', null)->count();
                            if($stock <= 0)
                                echo "<span class='product-unavailable'>Unavailable</span>";
                            else if($stock < 5)
                                echo "<span class='product-available text-warning'>Only $stock left !</span>";
                            else
                                echo "<span class='product-available text-success'>In Stock</span>"
                        @endphp
                    </div>
                    <p>{!!$product->description!!}</p>
                    <form method="post" id="order_form">
                    {{csrf_field()}}
                    <div class="product-options" >
                        <input type="hidden" id="discount_price_holder" name="discount_price_holder" value={{$product->discount}}>
                        <label>

                        <div id="field1">Quantity
                        <button type="button" id="sub" class="sub">-</button>
                        <input type="number" id="quantity" name="quantity" value="1" min="1" max="{{$stock}}"  />
                        <button type="button" id="add" class="add">+</button>
                    </div>

                        </label>



                    </div>
                        <div id="for_error"></div>

                    <div class="add-to-cart">
                        @if($stock > 0)
                            <button type="submit" name="myButton" id="myButton" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                        @else
                            <button class="btn btn-danger" disabled><i class="fa fa-shopping-cart"></i> add to cart</button>
                        @endif
                    </div>
                    </form>
                    <ul class="product-links">
                        <li>Category:</li>
                        <li><a href="{{route('user.search')}}?c={{$product->category->id}}">{{$product->category->name}}</a></li>
                    </ul>
                </div>
            </div>
            <!-- /Product details -->

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<div style="height:200px"></div>

<!--JQUERY Validation-->
<script>

    //////////////////////////////////////


    $('.add').click(function () {

        $(this).prev().val(+$(this).prev().val() + 1);

    });
    $('.sub').click(function () {
            if ($(this).next().val() > 1) {
            $(this).next().val(+$(this).next().val() - 1);
            }
    });



	</script>
<!--/JQUERY Validation-->
<!-- /SECTION -->
@endsection
