@extends('store.storeLayout')
@section('content')
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- STORE -->
            <div id="store" class="col-md-12">
                <!-- store products -->
                <div class="row">
                    @foreach($products as $product)
                    <!-- product -->
                    <div class="col-md-3">
                        <div class="product">
                            <a class="add-to-cart-btn" href="{{route('user.view',['id'=>$product->id])}}">
                            <div class="product-img">
                                <img src="{{asset('storage/' . $product->image)}}" width="95px" height="290px" alt="">
                                <div class="product-label">
                                    <span class="new">{{$product->tag}}</span>
                                </div>
                            </div>
                            </a>
                            <div class="product-body">
                                <h3 class="product-name"><a href="product/{{$product->id}}">{{$product->name}}</a></h3>
                                <h4 class="product-price"> {{$product->discount != null ? $product->discount: $product->price}} TND
                                     @if ( $product->discount != null)
                                    <del class="product-old-price"> {{$product->price}} TND</del>
                                @endif
                                </h4>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>

                            </div>
                            <div class="add-to-cart">
                                <a class="add-to-cart-btn" href="{{route('user.view',['id'=>$product->id])}}"><i class="fa fa-shopping-cart"></i>Purchase</a>
                            </div>
                        </div>
                    </div>
                    <!-- /product -->
                    @endforeach
                </div>
                <!-- /STORE -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>

    @endsection
