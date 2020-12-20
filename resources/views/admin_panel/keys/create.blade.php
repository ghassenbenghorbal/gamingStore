@extends('admin_panel.adminLayout') @section('content')
<script src="{{asset('js/lib/jquery.js')}}"></script>
<script src="{{asset('js/dist/jquery.validate.js')}}"></script>
<script src="{{asset('js/dist/additional-methods.js')}}"></script>

<style>label.error {
  color: #a94442;
  background-color: #f2dede;
  border-color: #ebccd1;
  padding:1px 20px 1px 20px;
}

</style>
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a style="color:green;" href="{{route('admin.keys')}}">
                                < Back to List</a>
                                    <br>
                                    <br>
                                    <h4 >Add Keys</h4>
                                    <br>
                                    @if($errors->any())

                                    <ul>
                                        @foreach($errors->all() as $err)
                                        <div class="alert alert-danger" role="alert">
                                            <tr>
                                                <td>
                                                    {{$err}}
                                                </td>
                                            </tr>
                                        </div>
                                        @break
                                        @endforeach
                                        </ul>
                                    @endif
                                    <form class="forms-sample" method="post"  id="product_form" enctype="multipart/form-data">
                                        {{csrf_field()}}


                                        <br>
                                        <div id="for_extension_error"></div>
                                        <div class="form-group">
                                            <label  >Product Name<span style="color: red">*</span></label>
                                            <select type="text" class="form-control" id="Name" name="product_name">
                                                <option value=""></option>
                                                @foreach ($products as $product)
                                                    <option value="{{$product->id}}">{{ $product->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label  >Buying Price<span style="color: red">*</span></label>
                                            <input type="text" class="form-control" name="buying_price" id="buying_price" value="">
                                        </div>
                                        <div class="form-group">
                                            <label >Code(s)<span style="color: red">*</span></label>
                                            <textarea class="form-control" id="Code" name="codes" value="" rows="10"></textarea>
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
@endsection
