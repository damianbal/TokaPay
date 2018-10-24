@extends('layout.master')

@section('title') Add Funds @endsection

@section('content')
    @include('partials.toolbar')

    <div class="card simple-card">
        <div class="card-header border-bottom">Add Funds</div> 
        <div class="card-body">
        <div class="text-muted mb-3">
            On this page you can add funds to your account by using card. Maxium funds you can add in 
            one transaction is 99. 
            
            <div class="text-danger">You can not get refund for that payment.</div>
        </div>
        <form method="POST" action="{{ route('account.submit_add_funds') }}">
            @csrf
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="text-muted">First Name</label>
                        <input class="form-control" type="text" name="firstName" minlength="3" required placeholder="First name...">
                    </div>
                </div>
                                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="text-muted">Last Name</label>
                        <input class="form-control" type="text" name="lastName" minlength="3" required placeholder="Last name...">
                    </div>
                </div>
                                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="text-muted">Amount</label>
                        <input class="form-control" type="number" name="amount" required placeholder="Amount...">
                    </div>
                </div>
            </div>

            <div class="row">
            
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="text-muted">Card</label>
                        <input class="form-control" type="text" name="number" required placeholder="Number...">
                    </div>
                </div>
                
                    <div class="col-sm-2">
                    <div class="form-group">
                        <label class="text-muted">CVV</label>
                        <input class="form-control" type="text" name="cvv" required placeholder="CVV number">
                    </div>
                </div>

                              <div class="col-sm-2">
                    <div class="form-group">
                        <label class="text-muted">Expiry month (1-12)</label>
                        <input class="form-control" type="number" name="expiryMonth" required placeholder="XX">
                    </div>
                </div>

                              <div class="col-sm-2">
                    <div class="form-group">
                        <label class="text-muted">Expiry Year</label>
                        <input class="form-control" type="number" name="expiryYear" required placeholder="XXXX">
                    </div>
                </div>

            </div>

                <button class="btn btn-primary" type="submit">Add funds</button>
                
            </form>
        </div>
    </div>
@endsection