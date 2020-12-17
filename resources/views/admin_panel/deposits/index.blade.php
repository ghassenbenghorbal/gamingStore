@extends('admin_panel.adminLayout')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Received Deposits <a class="btn btn-lg btn-success" style="float:right;color:white" href="{{route('admin.products.create')}}">+ Add Deposit</a></h4>
                    <br><br>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        Id
                                    </th>
                                    <th>
                                        Code
                                    </th>
                                    <th>
                                        Delete
                                    </th>
                                    <th>
                                        Amount
                                    </th>
                                    <th>
                                        Type
                                    </th>
                                    <th>
                                        Created At
                                    </th>
                                    <th>
                                        Updated At
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($deposits as $dep)
                                <tr>
                                    <td>
                                        {{$dep->id}}
                                    </td>
                                    <td>
                                       <a href="{{route('admin.products.edit', ['id' => $dep->id])}}" class="btn btn-warning">{{$dep->code}}</a>
                                    </td>
                                    <td><a href="{{route('admin.products.delete', ['id' => $dep->id])}}"class="btn btn-danger">Delete</a></td>
                                    <td>
                                        <b>{{$dep->amount}} TND</b>
                                    </td>
                                    <td>
                                        {{$dep->type == 0 ? "Bank Transfer" : "D17"}}
                                    </td>
                                    <td>
                                        {{$dep->created_at}}
                                    </td>
                                    <td>
                                        {{$dep->updated_at}}
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
@endsection
