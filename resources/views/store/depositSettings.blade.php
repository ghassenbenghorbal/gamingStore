@extends('store.userSettings')
@section('deposit')

<div class="tab-pane active" id="deposit" role="tabpanel">
    <h4 style="display:inline">Current Balance : </h4> <b style="font-size: 105%;color:{{session('user')->balance > 0 ? 'rgb(81, 241, 81)' : 'red'}};">{{number_format((float)session()->get('user')->balance, 2, '.', '')}} TND</b>
    <hr>
    <div class="row">
            <div class="col-md-4">
            <form method="POST">
                {{csrf_field()}}
                @if(Session::has('message'))
                <div class="alert alert-danger" role="alert">
                        {{Session::get('message')}}
                </div>
                @endif
                @if($errors->any())

                <ul>
                @foreach($errors->all() as $err)

                <div class="alert alert-danger" role="alert">
                    <li>{{$err}}</li>
                </div>
                @break
                @endforeach
                </ul>
            @endif
                <div class="form-group">
                <select class="form-control" name="payment_method" id="exampleFormControlSelect1">
                    <option value="0">Bank Transfer</option>
                    <option value="1">D17</option>
                </select>
                </div>
                <div class="form-group">
                    <input type="text" name="code" class="form-control" id="exampleFormControlInput1" placeholder="Transaction code">
                </div>
                <div class="form-group">
                    <input type="text" name="amount" class="form-control" id="exampleFormControlInput1" placeholder="Amount in dinars">
                </div>
                <button type="submit" name="form3" class="btn btn-success">Deposit</button>
            </form>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-info">D17</h5>
                        <p class="card-text"><b>Phone Number :</b> <span class="badge badge-secondary">20 000 000</span><br>
                            <div class="alert alert-info" role="alert">
                            <b>Note : </b>Send money to the phone number above using D17 app
                            . You'll receive transaction code via SMS
                            , put it in the form to add money to your balance.

                        </div>
                        </p>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title text-success">Banque Zitouna</h5>
                <p class="card-text"><b>RIB :</b> <span class="badge badge-secondary">25 000 0000000000000 00</span><br>
                    <b>Account : <span class="text-danger">G</span>Keys</b><br>
                    <div class="alert alert-info" role="alert"><b>Note :</b> Send money to this bank account and put transaction code in the form to add money to your balance.</div>
                </p>
                </div>
            </div>
            </div>
    </div>
    {{-- End Deposit Form --}}
</div>

@endsection
