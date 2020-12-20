@extends('admin_panel.adminLayout') @section('content')
<script src="{{asset('js/lib/jquery.js')}}"></script>
<script src="{{asset('js/dist/jquery.validate.js')}}"></script>
<script src="{{asset('js/dist/additional-methods.js')}}"></script>

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
                            <a style="color:green;" href="{{route('admin.products')}}">
                                < Back to List</a>
                                    <br>
                                    <br>
                                    <h4 >Create product</h4>
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
                                        </div>
                                            @endforeach
                                        </ul>
                                    @endif
                                    <form class="forms-sample" method="post"  id="product_form" enctype="multipart/form-data">
                                        {{csrf_field()}}


                                        <br>
                                        <div id="for_extension_error"></div>
                                        <div class="form-group">
                                            <label  >Product Name<span style="color: red">*</span></label>
                                            <input type="text" class="form-control" id="Name" name="Name"  value="">
                                        </div>
                                        <div class="form-group">
                                            <label  for="Description">Product Description<span style="color: red">*</span></label>
                                            <textarea type="textarea" class="form-control" id="Description" name="Description"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label  for="Category">Category<span style="color: red">*</span></label>
                                            <select class="form-control form-control-md" id="Category" name="Category">
                                                @php foreach($catlist->all() as $cat) {
                                                echo "<option value=".$cat->id." >".$cat->name." </option>"; $select_attribute=''; } @endphp
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label  >Product Price<span style="color: red">*</span></label>
                                            <input type="text" class="form-control" name="Price" id="Price" value="">
                                        </div>
                                        <div class="form-group">
                                            <label> Price After Discount<small> (Optional)</small></label>
                                            <input type="text" class="form-control" id="Discounted_Price"  name="Discounted_Price" value="">
                                        </div>


                                        <div class="form-group">
                                            <label >Product Tags<span style="color: red">*</span></label>
                                            <input type="text" class="form-control" id="Tags" name="Tags" value="">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" name="Image" type="file">
                                        </div>
                                        <input type="submit" name="saveButton" class="btn btn-success mr-2" id="saveButton" value="Create"  />
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


</script>


<!--JQUERY Validation-->
<script>

	$(document).ready(function() {



		$("#product_form").validate({

			rules: {

                Name: "required",
                inp_files: "required",

                Description: "required",
                Category: "required",
                Price: {
					required: true,
					number: true
				},
                Discounted_Price: {
					required: false,
					number: true
				},
                Tags: "required"






			},
			messages: {

				Name: "Name is required",
                inp_files:  "Image required",
                Description: "Description is required",
                Category: "Select a category",

				Price: {
					required: "Enter a price",
					number: "Invalid Price"
				},
                Discounted_Price: {
					number: "Invalid Price"
				},
                Tags: "No Tags is Selected",


			}



		});




	});




	</script>
<!--/JQUERY Validation-->
@endsection
