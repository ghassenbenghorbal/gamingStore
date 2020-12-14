@extends('admin_panel.adminLayout') @section('content')
<script src="{{asset('js/lib/jquery.js')}}"></script>
<script src="{{asset('js/dist/jquery.validate.js')}}"></script>
<script src="{{asset('js/dist/additional-methods.js')}}"></script>
<style>
    caption{caption-side: top;color:black}
</style>
<table  >
    <caption ><h1>liste des participants</h1>
<tr><th>nom</th><th>ville</th>
@foreach ($par as $partic)
<tr><td>{{$partic["full_name"]}}</td><td>{{$partic["ville"]}}</td></tr>
    

    
@endforeach
</table>
@endsection