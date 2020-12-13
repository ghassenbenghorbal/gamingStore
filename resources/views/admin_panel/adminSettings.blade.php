@extends('admin_panel.adminLayout')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Settings</h4>
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
                    @endif
                    <div class="col-sm-5">
                        <form method='POST'>
                            {{csrf_field()}}
                            <div class="form-group">
                              <label for="exampleInut">Username</label>
                              <input type="text" name='username' class="form-control" id="exampleInput" value="{{$admin->username}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInut">Name</label>
                                <input type="text" name='name' class="form-control" id="exampleInput" value="{{$admin->name}}">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">New Password</label>
                              <input type="password" name='password' class="form-control" id="exampleInputPassword1" value="" readonly onfocus="this.removeAttribute('readonly');">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Confirm New Password</label>
                              <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1" value="" readonly onfocus="this.removeAttribute('readonly');">
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
