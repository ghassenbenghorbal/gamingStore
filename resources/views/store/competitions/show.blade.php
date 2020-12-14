
<style>
     h2{text-align: center;}
#img{diplay:block;position: absolute;left:240px;top:100px;width: 350px;height:400px; }
#li{position: absolute;left: 650px;top:190px;}
div{position: absolute;top:560px;}
a{text-decoration: none;display:block;margin-left:500px;margin-top: 60px;background: chocolate;color: white;width: 140px;font-size: 40px;text-align: center}
#lieu:before {
     content:  url("/affiche/lieu.png");
     display:  inline-block;
     vertical-align:  middle;
      
     /* If you want some space between image and text: */
      margin-right:   1em;
}
#date:before {
     content:  url("/affiche/cal.png");
     display:  inline-block;
     vertical-align:  middle;
      

     margin-right:   1em;
}


</style>
<h2>{{$comp->comp_nom}}</h2>
<img id=img  src="{{asset('storage/images/'.$comp->comp_image)}}" alt="fif inexistant oll la" >
<ul id=li>
<li id=lieu>{{$comp->comp_lieu}}</li>
<li id=date>{{ date('d M Y', strtotime($comp->comp_date)) }}</li>
</ul>
<div>
<p >{{$comp->description}}</p>
@if(in_array($user,$comp->participants))
<a href="/desinscription/{{$comp->id}}">desinscrir</a>
@elseif( (count($comp->participants)<$comp->nbr_participant))
<a href="/inscription/{{$comp->id}}">inscrir</a>
@else
<a href="">complet</a>
@endif
</div>

