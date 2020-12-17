@extends('admin_panel.adminLayout')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Dashboard</h4>
                </div>
                <div style="width: 80%;margin: 0 auto;">
                    {!! $chart->container() !!}
                </div>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
                {!! $chart->script() !!}
            </div>
        </div>
    </div>
@endsection
