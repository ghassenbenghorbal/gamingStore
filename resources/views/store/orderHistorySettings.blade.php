@extends('store.userSettings')
@section('orderHistory')

<div class="tab-pane active" id="order_history" role="tabpane3">

    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered mydatatable" id="historyTable">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Key</th>
                </thead>
                <tbody>
                    @foreach($sale as $s)
                        @php
                            $commands = $s->commands
                        @endphp
                        @foreach($commands as $command)
                            @php
                                $p = App\Product::find($command->product_id);
                            @endphp
                            <tr>
                            <td style="padding-top:13px;"><b>{{$command->order_id}}</b></td>
                            <td style="width: 34%"><img src="{{asset('storage/' . $p->image)}}" height="30px" width="30px">&nbsp;<b>{{$p->name}}</b></td>
                            <td style="padding-top: 13px;"><span><b>{{$command->quantity}}</b></span></td>
                            <td style="padding-top: 13px;width: 10%;"><span><b>{{$command->subtotal}} TND</b></span></td>
                            <td class="text-center" style="padding-top: 13px;"><span class="@php
                                switch ($command->order_status) {
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
                            switch ($command->order_status) {
                            case 0:
                                echo "In Progress";
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
                            <td style="padding-top: 13px;"><b>{{$s->created_at}}</b></td>
                            <td class="text-center"><a class="btn btn-dark btn-sm" style="color: white;background-color:rgb(22 193 99)" href="{{route('user.key', $command->id)}}"><b>Get Key</b></a></td>
                            </tr>
                    @endforeach
                @endforeach
                    </tbody>
            </table>
        </div>
    </div>

</div>
<script>
    var table = $('#historyTable').DataTable({
        lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, 'All']],
    });
    table
        .column( '0:visible' )
        .order( 'desc' )
        .draw();

</script>
@endsection
