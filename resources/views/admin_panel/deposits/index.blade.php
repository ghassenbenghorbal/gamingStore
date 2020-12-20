@extends('admin_panel.adminLayout')
<script src="https://kit.fontawesome.com/cfee24ab20.js" crossorigin="anonymous"></script>

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Received Deposits <a class="btn btn-lg btn-success" style="float:right;color:white" href="{{route('admin.deposits.create')}}">+ Add Deposit</a></h4>
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
                                        Amount
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Type
                                    </th>
                                    <th>
                                        Delete
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
                                       <span class="badge badge-primary text-center pt-1" style="width:200px;height:25px; font-size:13px;">{{$dep->code}}</span>
                                    </td>
                                    <td>
                                        <b>{{$dep->amount}} TND</b>
                                    </td>
                                    <td>
                                        <span class="@php
                                            if($dep->deposit_id == null)
                                                echo "badge badge-warning";
                                            else
                                                echo "badge badge-success";
                                        @endphp">
                                        @php
                                            if($dep->deposit_id == null)
                                                echo "Pending";
                                            else
                                                echo "Redeemed";
                                        @endphp
                                        </span>
                                    </td>
                                    <td>
                                        {{$dep->type == 0 ? "Bank Transfer" : "D17"}}
                                    </td>
                                    <td>@if ($dep->deposit_id == null)
                                        <a class="btn btn-danger btn-sm" href="" data-toggle="modal" data-target="#exampleModal"><i class="far fa-trash-alt"></i></a>
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Delete Deposit</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this deposit ?<br><small>This action is irreversable!</small>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                  <a type="button" class="btn btn-danger" href="{{route('admin.deposits.delete', ['id' => $dep->id])}}">Yes, Delete</a>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        @else
                                            <span>-</span>
                                        @endif
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
