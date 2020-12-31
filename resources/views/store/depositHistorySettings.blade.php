@extends('store.userSettings')
@section('depositHistory')

<div class="tab-pane active" id="deposit_history" role="tabpanel">

    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered mydatatable" id="historyTable">
                <thead>
                    <th>Code</th>
                    <th>Amount</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Date</th>
                </thead>
                <tbody>
                    @foreach ($depositHistory as $item)
                    <tr>
                        <td><b class="badge badge-primary">{{$item->code}}</b></td>
                        <td><b style="color:#00c106;">{{$item->amount}} TND</b></td>
                        <td><b>@if ($item->type == 0)
                            Bank Transfer
                        @else
                            D17
                        @endif</b></td>
                        <td class="text-center"><span class="@php
                            switch ($item->status) {
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
                            switch ($item->status) {
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
                        <td><b>{{$item->created_at}}</b></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


</div>
<script>
    var table = $('#historyTable').DataTable({
        lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, 'All']]
    });
    table
        .column( '4:visible' )
        .order( 'desc' )
        .draw();
</script>
@endsection
