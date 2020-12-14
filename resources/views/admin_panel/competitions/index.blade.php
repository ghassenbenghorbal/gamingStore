@extends('admin_panel.adminLayout')
@section('content')
<script src="{{asset('js/lib/jquery.js')}}"></script>
<script src="{{asset('js/dist/jquery.validate.js')}}"></script>
<script src="{{asset('js/dist/additional-methods.js')}}"></script>



<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4>Competitions Table <a class="btn btn-lg btn-success" style="float:right;color:white" href="{{route('admin.competitions')}}">New Competition</a></h4>
                </div>
                <div class="table-responsive">

<table class="table table-striped">
    <thead>
        <tr>
            <th>

            </th>
            <th>
                Name
            </th>
            <th>
                Delete
            </th>
            <th>
                Place
            </th>
            <th>Date</th>
            <th>Total Participants</th>
            <th>Participants</th>

            <th>
                Description
            </th>

            <th>
                Game
            </th>
            <th>
                Winner


        </tr>
    </thead>
    <tbody>
    @foreach($comps as $comp)
        <tr>
            <td>
                <img src="{{asset('storage/images/'.$comp->comp_image)}}" style="width:50px;height:50px;border-radius:10%;" alt="oooo">
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
                <a href="{{route('compPartic', ['id'=>$comp->id])}}">Show Participants</a></td>
            <td>
                {{$comp->description}}
            </td>
            <td>
                {{$comp->product->name}}
            </td>
            <td>{{$comp->nom_gagnant}}</td>


        </tr>
    @endforeach
    </tbody>
</table>
                </div>
</div>
</div>
</div>
</div>
@endsection
