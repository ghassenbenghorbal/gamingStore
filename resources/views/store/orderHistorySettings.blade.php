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
                    <th>Date</th>
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
                            <td><img src="{{asset('storage/' . $p->image)}}" height="30px" width="30px">&nbsp;&nbsp;&nbsp;&nbsp;<b>{{$p->name}}</b></td>
                            <td style="padding-top: 13px;"><span><b>{{$c[2]}}</b></span></td>
                            <td class="text-center" style="padding-top: 13px;"><span class="@php
                                switch ($s->order_status) {
                                    case 0:
                                        echo "badge badge-warning";
                                        break;
                                    case 1:
                                        echo "badge badge-success";
                                        break;
                                    default:
                                        echo "badge badge-danger";
                                        # code...
                                        break;
                                }
                            @endphp">
                            @php
                            switch ($s->order_status) {
                            case 0:
                                echo "Pending";
                                break;
                            case 1:
                                echo "Approved";
                                break;
                            default:
                                echo "Ignored";
                                # code...
                                break;
                            }
                        @endphp
                        </span></td>
                            <td><b>{{$s->created_at}}</b></td>
                            <td class="text-center"><a class="btn btn-dark btn-sm" style="color: white;background-color:rgb(97, 161, 177)" href="#"><b>Get Key</b></a></td>
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