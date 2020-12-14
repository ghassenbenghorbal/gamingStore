@extends('admin_panel.adminLayout') @section('content')
<script src="{{asset('js/lib/jquery.js')}}"></script>
<script src="{{asset('js/dist/jquery.validate.js')}}"></script>
<script src="{{asset('js/dist/additional-methods.js')}}"></script>
<form  method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <label >nom competition<span style="color:red">*</span></label>
<input type="text" placeholder="nom competition" name="comp_nom">
<br>
<label>image competition<span style="color:red">*</span></label>
<input type="file"  name="comp_image" >
<br>
<label >lieu competition<span style="color:red">*</span></label>
<input type="text" placeholder="lieu competition" name="comp_lieu">
<br>
<label >date competition<span style="color:red">*</span></label>
<input type="datetime-local" placeholder="date competition" name="comp_date">
<br>
<label  for="Product">jeu<span style="color: red">*</span></label>
<select  id="Product" name="product_id">
    @php foreach($prods as $prod) {
    echo "<option value=".$prod->id." >".$prod->name." </option>"; $select_attribute=''; } @endphp
</select>
<br>
<label >nombre participant<span style="color:red">*</span></label>
<input type="number"  name="nbr_participant">
<br>
<label >description competition<span style="color:red">*</span></label>
<input type="text" placeholder="description competition" name="description">
<br>
<input type="submit" value="envoyer">
</form>

@endsection
