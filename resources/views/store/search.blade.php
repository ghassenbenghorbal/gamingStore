@extends('store.storeLayout')
@section('content')
<div class="section container-fluid">
    <!-- container -->


{{-- Filter --}}
<div class="row">
    <div class="col-sm-2 container sidebar">
        <form class="sidebar-form">
            <div class="form-group">
                <label class="form-label">Price range</label>
                <div class="row">
                    <div class="col-sm-5">
                        <input class="form-control common_selector min_price" style="width:110% !important;" placeholder="From" type="number" min="0" value="0" id="min_price">
                    </div>
                    <div class="col-sm-1" style="padding-top: 5px;padding-right:0px;padding-left:11px">
                        <span><b>-</b></span>
                    </div>
                    <div class="col-sm-5">
                        <input class="form-control common_selector max_price" style="width:110% !important;" placeholder="To" type="number" min="0" value="{{App\Product::max('price')}}" id="max_price">
                    </div>
                </div>
            </div>
            <hr style="border-top: 1px solid #ccc;">
            @if(!isset($_GET['c']))
            <div class="form-group">
                <label for="">Platform</label>
                @php
                  $categories = App\Category::all();
                @endphp
                @foreach ($categories as $category)
                  <div class="form-check">
                    <input class="form-check-input common_selector category" type="checkbox" value="{{ $category->name }}">
                    <label class="form-check-label" for="defaultCheck1">{{ $category->name }}</label>
                  </div>
                @endforeach
                </div>
            <hr style="border-top: 1px solid #ccc;">
            @endif

            <div class="form-group">
                <label for="">Genre</label>
                @php
                    $genres = [];
                @endphp
                @foreach($products as $product)
                  @php
                      $genres[] = $product->genre;
                  @endphp
                @endforeach
                @php
                    $genres = array_unique($genres);
                @endphp
                @foreach ($genres as $genre)

                  <div class="form-check">
                    <input class="form-check-input common_selector genre" type="checkbox" value="{{ $genre }}">
                    <label class="form-check-label" for="defaultCheck1">{{ $genre }}</label>
                  </div>

                @endforeach
            </div>
            <hr style="border-top: 1px solid #ccc;">
            <div class="form-group">
                <label for="">More Options</label>
                @php
                    $tags = [];
                @endphp
                @foreach($products as $product)
                  @php
                      $tags[] = $product->tag;
                  @endphp
                @endforeach
                @php
                    $tags = array_unique($tags);
                @endphp
                @foreach ($tags as $tag)

                  <div class="form-check">
                    <input class="form-check-input common_selector tag" type="checkbox" value="{{ $tag }}">
                    <label class="form-check-label" for="defaultCheck1">{{ $tag }}</label>
                  </div>

                @endforeach
            </div>

        </form>
    </div>

{{-- Filter --}}

        <div class="col-lg-9">


    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- STORE -->
            <div id="store" class="col-md-12">
                <!-- store products -->
                <div class="row filter_data">
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
</div>
    </div>

    @endsection
