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

/* carousel */

.carousel .carousel-control-prev-icon {
/* change fill="currentColor" to %23fff to make it white  */
  background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/></svg>');
}

.carousel .carousel-control-next-icon {
  /* change fill="currentColor" to %23fff to make it white  */
    background-image: url('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path fill-rule="evenodd" d="M4 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5A.5.5 0 0 0 4 8z"/></svg>');
}


.carousel-control-next-icon, .carousel-control-prev-icon {
    /* Use to adjust size of icons */
    width: 3rem;
    height: 3rem;
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
            <div class="col-md-5" style="width: 30%">
                <div class="product-details">
                    <h2 class="product-name">{{$product->name}}</h2>
                    <ul class="product-links">
                        <li><b>Category:</b></li>
                        <li><a href="{{route('user.search')}}?c={{$product->category->id}}"><b>{{$product->category->name}}</b></a></li>
                    </ul>
                    <br>
                </div>
                <br>
                <div>
                    <textarea class="form-control" name="" id="" rows="10" readonly>@foreach ($keys as $key){{$key->code."\n"}}@endforeach</textarea>
                </div>

            </div>
            <div class="col-md-6" style="width: 35%">                   
                <h4 class="text-center text-success">How to redeem a key</h4>
                    @switch($product->category->name)
                    @case("Steam")
                        
                        {{-- Steam redeem key carousel --}}

                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                        </ol>
                        
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
    
                            <div class="item active">
                            <img src="{{asset('storage/uploads/steam_redeem_key_1.png')}}" alt="Chania">
                            <div class="carousel-caption">
                                <h3></h3>
                                <p></p>
                            </div>
                            </div>
                        
                            <div class="item">
                            <img src="{{asset('storage/uploads/steam_redeem_key_2.png')}}" alt="Chicago">
                            <div class="carousel-caption">
                                <h3></h3>
                                <p></p>
                            </div>
                            </div>
                        
                            <div class="item">
                            <img src="{{asset('storage/uploads/steam_redeem_key_3.png')}}" alt="New York">
                            <div class="carousel-caption">
                                <h3></h3>
                                <p></p>
                            </div>
                            </div>
                            <div class="item">
                            <img src="{{asset('storage/uploads/steam_redeem_key_4.png')}}" alt="New York">
                            <div class="carousel-caption">
                                <h3></h3>
                                <p></p>
                            </div>
                            </div>
    
                        </div>
                        
                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        </div>

                        @break
                    @case("Battle.net")
                        
                    {{-- Battle.net redeem key carousel --}}

                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                        </ol>
                        
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
    
                            <div class="item active">
                            <img src="{{asset('storage/uploads/battle_net_redeem_key_1.png')}}" alt="Chania">
                            <div class="carousel-caption">
                                <h3></h3>
                                <p></p>
                            </div>
                            </div>
                        
                            <div class="item">
                            <img src="{{asset('storage/uploads/battle_net_redeem_key_2.png')}}" alt="Chicago">
                            <div class="carousel-caption">
                                <h3></h3>
                                <p></p>
                            </div>
                            </div>
    
                        </div>
                        
                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        </div>

                        @break
                    @case("Origin")
                            
                        {{-- Origin redeem key carousel --}}

                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                        </ol>
                        
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
    
                            <div class="item active">
                            <img src="{{asset('storage/uploads/origin_redeem_key_1.png')}}" alt="Chania">
                            <div class="carousel-caption">
                                <h3></h3>
                                <p></p>
                            </div>
                            </div>
                        
                            <div class="item">
                            <img src="{{asset('storage/uploads/origin_redeem_key_2.png')}}" alt="Chicago">
                            <div class="carousel-caption">
                                <h3></h3>
                                <p></p>
                            </div>
                            </div>
    
                        </div>
                        
                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        </div>

                        @break
                    @case("Uplay")

                            {{-- Uplay redeem key carousel --}}

                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>
                        
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
    
                            <div class="item active">
                            <img src="{{asset('storage/uploads/uplay_redeem_key_1.png')}}" alt="Chania">
                            <div class="carousel-caption">
                                <h3></h3>
                                <p></p>
                            </div>
                            </div>
                        
                            <div class="item">
                            <img src="{{asset('storage/uploads/uplay_redeem_key_2.png')}}" alt="Chicago">
                            <div class="carousel-caption">
                                <h3></h3>
                                <p></p>
                            </div>
                            </div>

                            <div class="item">
                                <img src="{{asset('storage/uploads/uplay_redeem_key_3.png')}}" alt="Chicago">
                                <div class="carousel-caption">
                                    <h3></h3>
                                    <p></p>
                                </div>
                                </div>
    
                        </div>
                        
                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        </div>

                        @break    

                    @case("Epic Games")
                    
                        {{-- Epic Games redeem key carousel --}}

                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                        </ol>
                        
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
    
                            <div class="item active">
                            <img src="{{asset('storage/uploads/epic_games_redeem_key_1.png')}}" alt="Chania">
                            <div class="carousel-caption">
                                <h3></h3>
                                <p></p>
                            </div>
                            </div>
                        
                            <div class="item">
                            <img src="{{asset('storage/uploads/epic_games_redeem_key_2.png')}}" alt="Chicago">
                            <div class="carousel-caption">
                                <h3></h3>
                                <p></p>
                            </div>
                            </div>
                        
                            <div class="item">
                            <img src="{{asset('storage/uploads/epic_games_redeem_key_3.png')}}" alt="New York">
                            <div class="carousel-caption">
                                <h3></h3>
                                <p></p>
                            </div>
                            </div>
                            <div class="item">
                            <img src="{{asset('storage/uploads/epic_games_redeem_key_4.png')}}" alt="New York">
                            <div class="carousel-caption">
                                <h3></h3>
                                <p></p>
                            </div>
                            </div>
    
                        </div>
                        
                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        </div>

                        @break         

                    @endswitch
            </div>
            <!-- /Product details -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>

<!--JQUERY Validation-->
<script>

</script>
@endsection