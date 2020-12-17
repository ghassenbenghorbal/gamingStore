@extends('store.storeLayout')
@section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<style>
    .just-padding {
  padding: 15px;
}

.list-group.list-group-root {
  padding: 0;
  overflow: hidden;
}

.list-group.list-group-root .list-group {
  margin-bottom: 0;
}

.list-group.list-group-root .list-group-item {
  border-radius: 0;
  border-width: 1px 0 0 0;
}

.list-group.list-group-root > .list-group-item:first-child {
  border-top-width: 0;
}

.list-group.list-group-root > .list-group > .list-group-item {
  padding-left: 40px;
}

.list-group.list-group-root > .list-group > .list-group > .list-group-item {
  padding-left: 45px;
}
</style>
<div class="section">
    <!-- container -->
    <div class="container">
                <!-- List group -->
                <div class="row">

                    <div class="col-sm-2">
                    <div class="list-group list-group-root well" id="myList"  role="tablist">
                        <div class="list-group-item">Account</div>
                        <div class="list-group" role="tablist">
                            <a class="list-group-item list-group-item-action" data-toggle="list" id="prof" href="#profile" role="tab">Profile</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" id="pass" href="#password" role="tab">Password</a>

                        </div>
                        <a class="list-group-item list-group-item-action"  data-toggle="list" id="ordh" href="#order_history" role="tab">Order history</a>
                        <a class="list-group-item list-group-item-action"  data-toggle="list" id="dep" href="#deposit" role="tab">Deposit</a>
                        <a class="list-group-item list-group-item-action"  data-toggle="list" id="deph" href="#deposit_history" role="tab">Deposit history</a>
                    </div>
                    </div>
                    <!-- Tab panes -->
                    <div class="col-md-10">
                    <div class="tab-content">

                        <!-- Account tab pane -->
                                <!-- Profile tab pane -->
                        <div class="tab-pane" id="profile" role="tabpanel">
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


                                <!-- Password tab pane -->
                                <div class="tab-pane" id="password" role="tabpane2">

                                    <div class="col-sm-4">
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
                                                    <div class="form-group">
                                                        <label >Password</label>
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


                        <!-- Order history tab pane -->
                        <div class="tab-pane" id="order_history" role="tabpane3">

                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-striped table-bordered mydatatable" id="historyTable">
                                        <thead>
                                            <th style="width: 10px">ID</th>
                                            <th>Name</th>
                                            <th>Quanity</th>
                                            <th>Status</th>
                                            <th>Key</th>
                                        </thead>
                                        <tbody>
                                            @foreach($sale as $s)
                                                @foreach($all as $c)
                                                @if($c[0]==$s->id)
                                                @foreach($products as $p)
                                                @if(session('user')->id == $s->user_id)
                                                    @if($c[1]==$p->id)
                                                    <tr>
                                                    <td style="width: 10px">{{$s->id}}</td>
                                                    <td><img src="{{asset('storage/' . $p->image)}}" height="30px" width="30px">&nbsp;{{$p->name}}</td>
                                                    <td>{{$c[2]}}</td>
                                                    <td>{{$s->order_status}}</td>
                                                    <td><a href="#">View Key</a></td>
                                                    </tr>

                                                    @break
                                                    @endif
                                                    @endif
                                                @endforeach
                                            @endif
                                            @endforeach
                                            @endforeach
                                            </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane" id="deposit" role="tabpanel">
                            <h4 style="display:inline">Current Balance : </h4> <b style="font-size: 105%;color:{{session('user')->balance > 0 ? 'rgb(81, 241, 81)' : 'red'}};">{{number_format((float)session()->get('user')->balance, 2, '.', '')}} TND</b>
                            <hr>
                            {{-- Deposit Form --}}
                            <div class="row">
                                    <div class="col-md-4">
                                    <form method="POST">
                                        {{csrf_field()}}
                                        @if(Session::has('message'))
                                        <div class="alert alert-danger" role="alert">
                                                {{Session::get('message')}}
                                        </div>
                                        @endif
                                        @if($errors->any())

                                        <ul>
                                        @foreach($errors->all() as $err)

                                        <div class="alert alert-danger" role="alert">
                                            <li>{{$err}}</li>
                                        </div>

                                        @endforeach
                                        </ul>
                                    @endif
                                        <div class="form-group">
                                        <select class="form-control" name="payment_method" id="exampleFormControlSelect1">
                                            <option value="0">Bank Transfer</option>
                                            <option value="1">D17</option>
                                        </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="code" class="form-control" id="exampleFormControlInput1" placeholder="Transaction code">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="amount" class="form-control" id="exampleFormControlInput1" placeholder="Amount in dinars">
                                        </div>
                                        <button type="submit" name="form3" class="btn btn-success">Deposit</button>
                                    </form>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title text-info">D17</h5>
                                                <p class="card-text"><b>Phone Number :</b> <span class="badge badge-secondary">25 000 000</span><br>
                                                    <div class="alert alert-info" role="alert">
                                                    <b>Note : </b>Send money to the phone number above using D17 app
                                                    . You'll receive transaction code via SMS
                                                    , put it in the form to add money to your balance.

                                                </div>
                                                </p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                        <h5 class="card-title text-success">Banque Zitouna</h5>
                                        <p class="card-text"><b>RIB :</b> <span class="badge badge-secondary">25 000 0000000000000 00</span><br>
                                            <b>Account : <span class="text-danger">G</span>Keys</b><br>
                                            <div class="alert alert-info" role="alert"><b>Note :</b> Send money to this bank account and put transaction code in the form to add money to your balance.</div>
                                        </p>
                                        </div>
                                    </div>
                                    </div>
                            </div>
                            {{-- End Deposit Form --}}
                        </div>
                        <div class="tab-pane" id="deposit_history" role="tabpanel">

                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-striped table-bordered mydatatable" id="historyTable2">
                                        <thead>
                                            <th>Code</th>
                                            <th>Amount</th>
                                            <th>Type</th>
                                            <th>Date</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($depositHistory as $item)
                                            <tr>
                                                <td>{{$item->code}}</td>
                                                <td>{{$item->amount}}</td>
                                                <td>@if ($item->type == 0)
                                                    Bank Transfer
                                                @else
                                                    D17
                                                @endif</td>
                                                <td>{{$item->created_at}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </div>
                    </div>
                    </div>

                </div>
        </div>
    </div>
    {{-- Tab pane script (vertical list) --}}
    @isset($_GET['tab'])
        <script>
            var elems = document.querySelectorAll("#myList a");
        [].forEach.call(elems, function(el) {
            el.classList.remove("active")
        });
        var elems = document.querySelectorAll("#myList a");
        [].forEach.call(elems, function(el) {
            el.classList.remove("active")
        });
            $("#{{$_GET['tab']}}").click().on('click', function (e) {
        e.preventDefault()
        var elems = document.querySelectorAll("#myList a");
        [].forEach.call(elems, function(el) {
            el.classList.remove("active")
        });
        // console.log(elems)

    })

        </script>
    @endisset
    <script>
        $('#myList a').on('click', function (e) {
        e.preventDefault()
        var elems = document.querySelectorAll("#myList a");
        [].forEach.call(elems, function(el) {
            el.classList.remove("active")
        });
        // console.log(elems)
       $(this).tab('show')


    })
    </script>
{{-- Datatable script --}}
<script>
       $('#historyTable,#historyTable2').DataTable({
           lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, 'All']]
       });

</script>
@endsection
