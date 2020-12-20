@extends('store.storeLayout')
@section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<style>
    .just-padding {
  padding: 15px;
}

.list-group.list-group-root {
  padding: 0;
  overflow: hidden;
}

.list-group.list-group-root .list-group {
  margin-bottom: 0;
}

.list-group.list-group-root .list-group-item {
  border-radius: 0;
  border-width: 1px 0 0 0;
}

.list-group.list-group-root > .list-group-item:first-child {
  border-top-width: 0;
}


</style>
<div class="section">
    <!-- container -->
    <div class="container">
                <!-- List group -->
                <div class="row">

                    <div class="col-md-2" style="width: 20%">
                    <div class="list-group" id="myList"  role="tablist">
                        <div class="list-group-item">Account</div>
                        <div class="list-group" role="tablist">
                            <a class="list-group-item list-group-item-action {!! $tab == 'profile' ? 'active' : '' !!}"  id="prof" href="{{ route('user.settings', 'profile')}}" style="padding-left: 40px;">Profile</a>
                            <a class="list-group-item list-group-item-action {!! $tab == 'password' ? 'active' : '' !!}"  id="pass" href="{{ route('user.settings',  'password')}}" style="padding-left: 40px;">Password</a>
                        </div>
                        <a class="list-group-item list-group-item-action {!! $tab == 'deposit' ? 'active' : '' !!}"   id="dep" href="{{ route('user.settings','deposit')}}" >Deposit</a>
                        <a class="list-group-item list-group-item-action {!! $tab == 'orderHistory' ? 'active' : '' !!}"   id="ordh" href="{{ route('user.settings','orderHistory')}}" >Order history <span class="badge badge-primary badge-pill">
                            @php
                                $sales = App\sale::where('user_id', session('user')->id)->get();
                                $tot = 0;
                                foreach ($sales as $sale) {
                                    $tot += $sale->commands->count();
                                }
                                echo $tot;
                        @endphp</span></a>
                        <a class="list-group-item list-group-item-action {!! $tab == 'depositHistory' ? 'active' : '' !!}"   id="deph" href="{{ route('user.settings', 'depositHistory')}}" >Deposit history<span class="badge badge-primary badge-pill">{{App\Deposit::where('user_id', session('user')->id)->count()}}</span></a>
                    </div>
                    </div>
                    <!-- Tab panes -->
                    <div class="col-md-9">
                    <div class="tab-content">

                        <!-- Account tab pane -->
                                <!-- Profile tab pane -->
                                @yield('profile')

                                <!-- Password tab pane -->
                                @yield('password')

                                <!-- Order history tab pane -->
                                @yield('orderHistory')
                                {{-- Deposit tab pane --}}
                                @yield('deposit')

                                {{-- Deposit History tab pane --}}
                                @yield('depositHistory')

                    </div>
                    </div>

                </div>
        </div>
    </div>
    {{-- Tab pane script (vertical list) --}}
    {{-- @isset($_GET['tab'])
        <script>
            var elems = document.querySelectorAll("#myList a");
        [].forEach.call(elems, function(el) {
            el.classList.remove("active")
        });
        var elems = document.querySelectorAll("#myList a");
        [].forEach.call(elems, function(el) {
            el.classList.remove("active")
        });
            $("#{{$_GET['tab']}}").click().on('click', function (e) {
        e.preventDefault()
        var elems = document.querySelectorAll("#myList a");
        [].forEach.call(elems, function(el) {
            el.classList.remove("active")
        });
        // console.log(elems)

    })

        </script>
    @endisset
    <script>
        $('#myList a').on('click', function (e) {
        e.preventDefault()
        var elems = document.querySelectorAll("#myList a");
        [].forEach.call(elems, function(el) {
            el.classList.remove("active")
        });
        // console.log(elems)
       $(this).tab('show')


    })
    </script> --}}
{{-- Datatable script --}}

@endsection
