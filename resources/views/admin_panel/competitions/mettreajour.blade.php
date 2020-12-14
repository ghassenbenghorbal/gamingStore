
@extends('admin_panel.adminLayout') @section('content')
<script src="{{asset('js/lib/jquery.js')}}"></script>
<script src="{{asset('js/dist/jquery.validate.js')}}"></script>
<script src="{{asset('js/dist/additional-methods.js')}}"></script>


@foreach ($comps as $comp)

@if ((\Carbon\Carbon::parse($comp->comp_date)->lt(\Carbon\Carbon::now())) and($comp->nom_gagnant==""))
<form method="POST"}}>
    {{csrf_field()}}
    <input type="image" src="{{asset('storage/images/'.$comp->comp_image)}}" style="width:100px;height:100px;border-radius:10%;position: relative;top:40px" alt="oooo">
    &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp
    <label >{{$comp->comp_nom}}</label>&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp
    <!--<input type="text" placeholder="nom competition" name="comp_nom">-->
    
    <label  >{{$comp->comp_lieu}}</label>&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp
    <label  >{{$comp->comp_date}}</label>&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp
    <input type="text" placeholder="nom du ganant" name="nom_gagnant">
    <input type="hidden" name="id" value="{{$comp->id}}">
    &nbsp&nbsp&nbsp
    <input type="submit" value="enregistrer">
</form>
@endif
@endforeach
@endsection


