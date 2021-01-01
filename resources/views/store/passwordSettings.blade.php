@extends('store.userSettings')
@section('password')

<div class="tab-pane active" id="password" role="tabpane2">

    <div class="col-sm-4">
        <form method="POST">
                        {{csrf_field()}}

                        @if(Session::has('message'))
                            <div class="alert alert-danger" role="alert" style="font-weight: 500;">
                                {{Session::get('message')}}
                            </div>
                        @endif
                        @if(Session::has('success'))
                            <div class="alert alert-success" role="alert" style="font-weight: 500;">
                                {{Session::get('success')}}
                            </div>
                        @endif
                        @if($errors->any())

                            <ul>
                            @foreach($errors->all() as $err)

                            <div class="alert alert-danger" role="alert">
                                <li>{{$err}}</li>
                            </div>
                            @break
                            @endforeach
                            </ul>
                        @endif
                    <div class="form-group">
                        <label >Current Password</label>
                        <input type="password" class="form-control" name="current_password">
                    </div>
                    <div class="form-group">
                        <label >New Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label >Confirm password</label>
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>
                    <button type="submit" class="btn btn-primary" name="form2">Submit</button>
        </form>
    </div>
</div>

@endsection
