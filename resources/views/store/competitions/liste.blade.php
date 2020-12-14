
<style>
    th{padding-left: 15px;}
    th{padding-left: 15px;}
    </style>
<table class="table table-striped">
    <h3>  liste  Competitions  </h3>
        <br><br>
<thead>
    <tr>
        <th>
            Image
        </th>
        <th>
            nom
        </th>
      
        <th>
            lieu
        </th>
        <th>date</th>
        

        <th>
            Description
        </th>
        
        <th>
            jeux
        </th>
        
        <th>
            descinscription
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
           {{$comp->description}}
        </td>
       
        <td>{{$comp->comp_lieu}}</td>
        <td>{{ date('d M Y', strtotime($comp->comp_date)) }}</td>
    
        <td>
            {{$comp->description}}
        </td>
        <td>
            {{$comp->product->name}}
        </td>
        @if ((\Carbon\Carbon::parse($comp->comp_date)->gt(\Carbon\Carbon::now())))
        <td><a href="/desinscription/{{$comp->id}}" class="btn btn-warning">descinscrir</a> </td>
         @endif    
    </tr>
@endforeach
</tbody>
</table>