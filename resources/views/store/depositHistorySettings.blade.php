@extends('store.userSettings')
@section('depositHistory')

<div class="tab-pane active" id="deposit_history" role="tabpanel">

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
    
@endsection