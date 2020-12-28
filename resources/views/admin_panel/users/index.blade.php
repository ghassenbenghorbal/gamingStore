@extends('admin_panel.adminLayout') @section('content')
@php
    $filterTrashed = isset($_GET['filter']) && $_GET['filter'] == "trashed";
@endphp
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Users Table</h4>
                    <br>
                    @if(!$filterTrashed)
                        <a href="{{route('admin.users')}}?filter=trashed" style="color: red;font-size:90%;"><i class="fas fa-trash"></i> Show Deleted Users</a>
                    @else
                        <a href="{{route('admin.users')}}" style="color: green;"><i class="fas fa-users"></i> Back to users</a>
                    @endif
                    <br><br>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered mydatatable" id="userTable">
                            <thead>
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Full Name
                                    </th>

                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Phone
                                    </th>
                                    <th>
                                        Balance
                                    </th>
                                    <th>
                                        Created at
                                    </th>
                                    <th>
                                        Updated at
                                    </th>
                                    <th>
                                        {{$filterTrashed ? "Restore":"Delete"}}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    if($filterTrashed){
                                        $users = App\User::onlyTrashed()->get();
                                    }else{
                                        $users = App\User::all();
                                    }
                                @endphp
                            @foreach($users as $user)
                                <tr>
                                    <td>
                                        <b>{{$user->id}}</b>
                                    </td>
                                    <td>
                                       <b>{{$user->full_name}}</b>
                                    </td>
                                    <td>
                                        <b>{{$user->email}}</b>
                                    </td>
                                    <td>
                                        <b>{{$user->phone}}</b>
                                    </td>
                                    <td>
                                        <b style="color:{{$user->balance > 0 ? '#00c106' : 'red'}};">{{number_format($user->balance, 2, '.', '')}} TND</b>
                                    </td>
                                    <td>
                                        {{$user->created_at}}
                                    </td>
                                    <td>
                                        {{$user->updated_at}}
                                    </td>
                                    <td>
                                        @if(!$filterTrashed)
                                            <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="far fa-trash-alt"></i></a>
                                        @else
                                            <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-trash-restore-alt"></i></a>
                                        @endif
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">{{$filterTrashed ? "Restore":"Delete"}} User</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to {{$filterTrashed ? "restore":"delete"}} this user ?<br>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                  @if($filterTrashed)
                                                    <a type="button" class="btn btn-primary" href="{{route('admin.users.restore', ['id' => $user->id])}}">
                                                @else
                                                    <a type="button" class="btn btn-danger" href="{{route('admin.users.delete', ['id' => $user->id])}}">

                                                @endif
                                                    Yes, {{$filterTrashed ? "Restore" : "Delete"}}</a>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

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
    $('#userTable').DataTable({
        lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, 'All']]
    });

</script>
@endsection

