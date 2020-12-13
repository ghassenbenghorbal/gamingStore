@extends('admin_panel.adminLayout') @section('content')
<style>label.error {
  color: #a94442;
  background-color: #f2dede;
  border-color: #ebccd1;
  padding:1px 20px 1px 20px;
}</style>
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{route('admin.products')}}">
                                < Back to List</a>
                                    <br>
                                    <br>
                                    <h4 class="card-title">Edit product</h4>
                                    <br>
                                    @if($errors->any())


                                    <ul>
                                        <div class="alert alert-danger" role="alert">
                                        @foreach($errors->all() as $err)
                                        <tr>
                                            <td>
                                                {{$err}}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </div>
                                    </ul>
                                    @endif
                                    <img id="imageHolder" src="{{asset('storage/' . $product->image)}}" alt="add image" height="300" width="300"/>
                                    <br>
                                    <br>
                                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label >Product Name</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" name="Name" value="{{$product->name}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Product Description</label>
                                            <textarea type="textarea" class="form-control" name="Description" style="height:100px;">{{$product->description}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Category</label>
                                            <select class="form-control form-control-md" id="exampleFormControlSelect1" name="Category">
                                                @php foreach($catlist->all() as $cat) { if($product->category->id==$cat->id) { $select_attribute='selected'; } echo "
                                                <option value=".$cat->id." " .$select_attribute.">".$cat->name." </option>"; $select_attribute=''; } @endphp
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label >Product Price</label>
                                            <input type="text" class="form-control" name="Price" value="{{$product->price}}">
                                        </div>
                                        <div class="form-group">
                                            <label >Price After Discount</label>
                                            <input type="text" class="form-control"  name="Discounted_Price" value="{{$product->discount}}">
                                        </div>
                                        <div class="form-group">
                                            <label >Product Tags</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" name="Tags" value="{{$product->tag}}">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" name="Image" type="file">
                                        </div>
                                        <input type="submit" name="saveButton" class="btn btn-success mr-2" id="updateButton" value="UPDATE" />
                                    </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>

  function fileChange(e) {

     document.getElementById('inp_img').value = '';

     for (var i = 0; i < e.target.files.length; i++) {

        var file = e.target.files[i];

        if (file.type == "image/jpeg" || file.type == "image/png") {

           var reader = new FileReader();
           reader.onload = function(readerEvent) {

              var image = new Image();
              image.onload = function(imageEvent) {

                 var max_size = 600;
                 var w = image.width;
                 var h = image.height;

                 if (w > h) {  if (w > max_size) { h*=max_size/w; w=max_size; }
                 } else     {  if (h > max_size) { w*=max_size/h; h=max_size; } }

                 var canvas = document.createElement('canvas');
                 canvas.width = w;
                 canvas.height = h;
                 canvas.getContext('2d').drawImage(image, 0, 0, w, h);
                 if (file.type == "image/jpeg") {
                    var dataURL = canvas.toDataURL("image/jpeg", 1.0);
                 } else {
                    var dataURL = canvas.toDataURL("image/png");
                 }
                 document.getElementById('inp_img').value += dataURL + '|';
              }
              image.src = readerEvent.target.result;
           }
           reader.readAsDataURL(file);

            readURL(this);

        } else {
           document.getElementById('inp_files').value = '';
           alert('Please only select images in JPG or PNG format.');
           return false;
        }
     }

  }

  document.getElementById('inp_files').addEventListener('change', fileChange, false);

</script>
<script>
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imageHolder').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }


});
</script>


@endsection
