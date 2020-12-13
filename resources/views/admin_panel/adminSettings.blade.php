@extends('admin_panel.adminLayout')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Settings</h4>
                    <div class="col-sm-5">
                        <form>
                            <div class="form-group">
                              <label for="exampleInut">Username</label>
                              <input type="text" class="form-control" id="exampleInput" value="{{$admin->username}}">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">New Password</label>
                              <input type="password" class="form-control" id="exampleInputPassword1" value="" readonly onfocus="this.removeAttribute('readonly');">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
@endsection
