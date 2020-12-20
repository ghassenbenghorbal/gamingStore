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
                            <a style="color:green;" href="{{route('admin.deposits')}}">
                                < Back to List</a>
                                    <br>
                                    <br>
                                    <h4 >Add Received Deposit</h4>
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
                                            <label  >Deposit Type<span style="color: red">*</span></label>
                                            <select class="form-control" name="payment_method" id="exampleFormControlSelect1">
                                                <option value="0">Bank Transfer</option>
                                                <option value="1">D17</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label  >Transaction Code<span style="color: red">*</span></label>
                                            <input type="text" name="code" class="form-control" id="exampleFormControlInput1" placeholder="Transaction code">
                                        </div>
                                        <div class="form-group">
                                            <label  >Amount<span style="color: red">*</span></label>
                                            <input type="text" name="amount" class="form-control" id="exampleFormControlInput1" placeholder="Amount in dinars">
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
