
<style>
    #div{width:300px;height:350px;border:5px solid black;float: left; margin-top:20px;margin-left: 20px;}
    img{width:150px;height: 200px;}
    h3{text-align: center;}
    #bo{display: block;text-align: center;background: chocolate;text-decoration: none;}
    </style>

<form method="POST">
    {{csrf_field()}}
    <input type="text" name="n">
    <select  id="Category" name="c">
        @php foreach($prods as $prod) {
        echo "<option value=".$prod->id." >".$prod->name." </option>"; $select_attribute=''; } @endphp
    </select>
    <input type="submit" value="rechercher">
</form>

<br>
<br>
@foreach ($comps as $comp)
@if ((\Carbon\Carbon::parse($comp->comp_date)->gt(\Carbon\Carbon::now())))


<div id=div>
<figure id=com >
<figcaption ><h3>{{$comp->comp_nom }}</h3></figcaption><img src="{{asset('storage/images/'.$comp->comp_image)}}"  alt="fif inexistant oll la"></figure>
<a id=bo href="{{route('showComp', ['id'=>$comp->id])}}">voir detail</a>
</div>
@endif
@endforeach
