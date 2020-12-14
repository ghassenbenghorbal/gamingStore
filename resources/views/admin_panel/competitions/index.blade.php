@extends('admin_panel.adminLayout') @section('content')
<script src="{{asset('js/lib/jquery.js')}}"></script>
<script src="{{asset('js/dist/jquery.validate.js')}}"></script>
<script src="{{asset('js/dist/additional-methods.js')}}"></script>
<style>
    #div{width:300px;height:350px;border:5px solid black;float: left; margin-top:20px;margin-left: 20px;}
    img{width:150px;height: 200px;}
    h3{text-align: center;}
    #bo{display: block;text-align: center;background: chocolate;text-decoration: none;}
    </style>





<table class="table table-striped">
    <br>
    <br>
   
    <h4>Competitions Table <a class="btn btn-lg btn-success" style="float:right;color:white" href="{{route('admin.competitions')}}">+ ajout competition</a></h4>
        <br><br>

    <thead>
        <tr>
            <th>
                image
            </th>
            <th>
                nom
            </th>
            <th>
                supprimer
            </th>
            <th>
                lieu
            </th>
            <th>date</th>
            <th>nbr prarticipants</th>
            <th>participants</th>

            <th>
                Description
            </th>
            
            <th>
                jeux
            </th>
            <th>
                nom gagnant
            
            <th>
                Update
            </th>
            
        </tr>
    </thead>
    <tbody>
    @foreach($comps as $comp)
        <tr>
            <td>
                <img src="{{asset('storage/images/'.$comp->comp_image)}}" style="width:100px;height:100px;border-radius:10%;" alt="oooo">
            </td>
            <td>
               <a href="{{route('editcom', ['id' => $comp->id])}}" class="btn btn-warning">{{$comp->comp_nom}}</a>
            </td>
            <td><a href="{{route('destroy', ['id' => $comp->id])}}"class="btn btn-danger">Delete</a></td>
            <td>{{$comp->comp_lieu}}</td>
            <td>{{ date('d M Y', strtotime($comp->comp_date)) }}</td>
            <td>
                {{$comp->nbr_participant}}
            </td>
            <td>
                <a id=bo href="/showpartic/{{$comp->id}}">voir participant</a></td>
            <td>
                {{$comp->description}}
            </td>
            <td>
                {{$comp->product->name}}
            </td>
            <td>{{$comp->nom_gagnant}}</td>
            
            <td><a href="{{route('destroy', ['id' => $comp->id])}}" class="btn btn-warning">Edit</a> </td>
             
        </tr>
    @endforeach
    </tbody>
</table>
@endsection