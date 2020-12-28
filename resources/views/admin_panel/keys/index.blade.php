@extends('admin_panel.adminLayout') @section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<div class="content-wrapper">
    <div class="row">
        @php
         function shortOf($text, $length)
            {
                if(strlen($text) > $length) {
                    $text = substr($text, 0, strpos($text, ' ', $length));
                }

                return $text;
            }
        @endphp
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Keys Table <a class="btn btn-lg btn-success" style="float:right;color:white" href="{{route('admin.keys.create')}}">+ Add Keys</a></h4>
                    <br><br>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered mydatatable" id="keysTable">
                            <thead>
                                <tr>
                                    <th>
                                        Product
                                    </th>
                                    <th>
                                        Key
                                    </th>
                                    <th>Buying Price</th>
                                    <th>
                                        Delete
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($keyList as $key)
                                <tr>
                                    <td>
                                        <img src="{{asset('storage/' . $productList->find($key->product_id)->image)}}" style="border-radius:10%;" alt="">&nbsp;&nbsp;<b style="font-size: 105%;">{{$key->product->name}}</b>
                                    </td>
                                    <td>{{$key->code}}</td>
                                    <td>{{$key->buying_price}} DT</td>
                                    <td>
                                        @if($key->command_id == null)
                                        <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="far fa-trash-alt"></i></a>
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Delete Key</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this key ?<br><small>This action is irreversable!</small>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                  <a type="button" class="btn btn-danger" href="{{route('admin.keys.delete', ['id' => $key->id])}}">Yes, Delete</a>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          @else
                                            <span class="badge badge-success">Sold</span>
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
<script>
    $('#keysTable').DataTable({
        lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, 'All']]
    });
</script>
@endsection

