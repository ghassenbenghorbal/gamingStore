@extends('admin_panel.adminLayout') @section('content')
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
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        Image
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Key
                                    </th>
                                    <th>Buying Price</th>
                                    <th>Selling Price</th>
                                    <th>
                                        Delete
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($keyList as $key)
                                <tr>
                                    <td>
                                        <img src="{{asset('storage/' . $productList->find($key->product_id)->image)}}" style="border-radius:10%;" alt="">
                                    </td>
                                    <td>
                                       <a href="{{route('admin.products.edit', ['id' => $productList->find($key->product_id)])}}" class="btn btn-warning">{{$productList->find($key->product_id)->name}}</a>
                                    </td>
                                    <td>{{$key->code}}</td>
                                    <td>{{$key->buying_price}} DT</td>
                                    <td>{{$key->selling_price}} DT</td>
                                    <td><a href="{{route('admin.keys.delete', ['id' => $key->id])}}"class="btn btn-danger">Delete</a></td>

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

