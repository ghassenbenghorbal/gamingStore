@extends('store.userSettings')
@section('orderHistory')
    
<div class="tab-pane active" id="order_history" role="tabpane3">

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

@endsection