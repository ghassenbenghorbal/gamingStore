@extends('admin_panel.adminLayout')
<script src="https://kit.fontawesome.com/cfee24ab20.js" crossorigin="anonymous"></script>
@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">User Deposits</h4>
                    <br><br>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered mydatatable" id="depositsTable">
                            <thead>
                                <tr>
                                    <th>
                                        Id
                                    </th>
                                    <th>
                                        User
                                    </th>
                                    <th>
                                        Code
                                    </th>

                                    <th>
                                        Amount
                                    </th>
                                    <th>
                                        Type
                                    </th>
                                    <th>
                                        Status
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                            @foreach($deposits as $dep)
                                <tr>
                                    <td>
                                        <b>{{$dep->id}}</b>
                                    </td>
                                    <td>
                                        <b>{{$dep->user->full_name}}</b>
                                    </td>
                                    <td>
                                       <span class="badge badge-primary text-center pt-1" style="width:200px;height:25px; font-size:13px;">{{$dep->code}}</span>
                                    </td>
                                    <td>
                                        <b>{{$dep->amount}} TND</b>
                                    </td>
                                    <td>
                                        <b>{{$dep->type == 0 ? "Bank Transfer" : "D17"}}</b>
                                    </td>
                                    <td>
                                        <span class="@php
                                            if($dep->status == 0)
                                                echo "badge badge-warning";
                                            else if ($dep->status == 1)
                                                echo "badge badge-success";
                                            else
                                                echo "badge badge-danger";
                                        @endphp">
                                        @php
                                            if($dep->status == 0)
                                                echo "Pending";
                                            else if ($dep->status == 1)
                                                echo "Approved";
                                            else
                                                echo "Ignored";
                                        @endphp
                                        </span>
                                    </td>


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
<script>
    $('#depositsTable').DataTable({
        lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, 'All']]
    });
</script>
@endsection
