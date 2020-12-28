@extends('admin_panel.adminLayout') @section('content')


<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Orders</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered mydatatable" id="orderTable">
                            <thead>
                                <tr>
                                    <th>
                                        Id
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Address
                                    </th>
                                    <th>
                                        Product
                                    </th>
                                    <th>
                                        Quantity
                                    </th>
                                    <th>
                                        Plateform
                                    </th>
                                    <th>
                                        Placed at
                                    </th>
                                    <th>
                                        Status
                                    </th>

                                    {{-- <th>
                                        Update
                                    </th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sale as $s)

                                @foreach($s->commands as $c)
                                <tr>
                                <td>{{$c->id}}</td>
                                    @php
                                        $u = App\User::find($s->user_id);
                                        $p = App\Product::find($c->product_id);
                                        $add = App\Address::find($u->address_id);
                                    @endphp
                                        <td>{{$u->full_name}}</td>
                                        <td>{{$add->area}}, {{$add->city}}, {{$add->zip}}</td>
                                <td>

                                <img src="{{asset('storage/' . $p->image)}}" style="border-radius:10%;" alt=""> <b>{{$p->name}}</b>

                                </td>
                                   <td>
                                        {{$c->quantity}}
                                    </td>
                                    <td>
                                    <div style="height:25px;width:25px;margin:5px;display:inline-block;">{{$p->category->name}}</div>
                                    </td>

                                    <td>
                                        {{$c->created_at}}
                                    </td>
                                    <td>
                                        <span class="@php
                                        switch ($c->order_status) {
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
                                    switch ($c->order_status) {
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
                                </span>
                                    </td>
                                    @endforeach
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#orderTable').DataTable({
        lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, 'All']]
    });

</script>

@endsection
