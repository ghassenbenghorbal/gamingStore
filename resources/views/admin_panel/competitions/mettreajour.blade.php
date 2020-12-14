
@extends('admin_panel.adminLayout') @section('content')
<script src="{{asset('js/lib/jquery.js')}}"></script>
<script src="{{asset('js/dist/jquery.validate.js')}}"></script>
<script src="{{asset('js/dist/additional-methods.js')}}"></script>
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h4>Update Winner</h4>
                </div>
@foreach ($comps as $comp)

@if ((\Carbon\Carbon::parse($comp->comp_date)->lt(\Carbon\Carbon::now())) and($comp->nom_gagnant==""))
<form method="POST">
    {{csrf_field()}}
    <input type="image" src="{{asset('storage/images/'.$comp->comp_image)}}" style="width:50px;height:50px;border-radius:10%;" alt="oooo">
    &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp
    <label >{{$comp->comp_nom}}</label>&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp
    <!--<input type="text" placeholder="nom competition" name="comp_nom">-->

    <label  >{{$comp->comp_lieu}}</label>&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp
    <label  >{{$comp->comp_date}}</label>&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp
    <input type="text" placeholder="Winner Name" name="nom_gagnant">
    <input type="hidden" name="id" value="{{$comp->id}}">
    &nbsp&nbsp&nbsp
    <input type="submit" value="Submit">
</form>
@endif
@endforeach
            </div></div></div></div>
@endsection


