@extends('store.storeLayout')
@section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

<div class="section">
    <!-- container -->
    <div class="container">
                <!-- List group -->
                <div class="row">

                    <div class="col-sm-2">
                    <div class="list-group" id="myList" role="tablist">
                        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account" role="tab">Account</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#order_history" role="tab">Order history</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#deposit" role="tab">Deposit</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#deposit_history" role="tab">Deposit history</a>
                    </div>
                    </div>
                    <!-- Tab panes -->
                    <div class="col-sm-10">
                    <div class="tab-content">

                        <!-- Account tab pane -->
                        <div class="tab-pane active" id="account" role="tabpanel">
                            
                            <div class="col-sm-5">
                                <form>
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Email address</label>
                                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputPassword1">Password</label>
                                      <input type="password" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <div class="form-group form-check">
                                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                  </form>
                            </div>


                        </div>

                        <!-- Order history tab pane -->
                        <div class="tab-pane" id="order_history" role="tabpanel">
                            
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
                                                    <td><img src="{{asset('storage/' . $p->image)}}" height="50px" width="50px">&nbsp;{{$p->name}}</td>
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
                            Deposit
                        </div>
                        <div class="tab-pane" id="deposit_history" role="tabpanel">
                            Deposit history
                        </div>
                    </div>  
                    </div>

                </div>
        </div>
    </div>
    {{-- Tab pane script (vertical list) --}}
<script>
    $('#myList a').on('click', function (e) {
        e.preventDefault()
        $(this).tab('show')
    })
</script>
{{-- Datatable script --}}
<script>
       $('#historyTable').DataTable();

</script>
@endsection