@extends('store.userSettings')
@section('profile')

<div class="tab-pane active" id="profile" role="tabpanel">
    <div class="col-md-8">
        <form method="POST">
            {{csrf_field()}}

            @if($errors->any())

                <ul>
                @foreach($errors->all() as $err)

                    <div class="alert alert-danger" role="alert">
                        <li>{{$err}}</li>
                    </div>

                @endforeach
                </ul>
            @endif

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <label >Full name</label>
                    <input type="text" class="form-control" name="full_name" value="{{session()->get('user')->full_name}}">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" name="email" value="{{session()->get('user')->email}}">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Phone number</label>
                    <input type="text" class="form-control" name="phone" value="{{session()->get('user')->phone}}">
                    </div>
                    <button type="submit" class="btn btn-primary" name="form1">Submit</button>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label >Address</label>
                    <input type="text" class="form-control" name="area" value="{{session()->get('address')->area}}">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">City</label>
                    <input type="text" class="form-control" name="city" value="{{session()->get('address')->city}}">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">ZIP Code</label>
                    <input type="text" class="form-control" name="zip" value="{{session()->get('address')->zip}}">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

    
@endsection