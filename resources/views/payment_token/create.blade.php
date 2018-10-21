@extends('layout.master')

@section('title') Create Payment Token @endsection

@section('content')
    <div class="card simple-card">
        <div class="card-header border-bottom">Create Payment Token</div> 
        <div class="card-body">
            <div class="text-muted">Your balance is <b>{{ auth()->user()->balance }}</b></div>
            <br>
            @if(auth()->user()->balance > 0)
        <form method="POST" action="{{ route('payment_token.store') }}">
                @csrf

                <div class="form-group">
                    <label class="text-muted">Amount</label> 
                    <input class="form-control shadow-sm" type="number" name="amount" placeholder="Amount of token" required>
                </div>
    
                <div class="text-muted small">Your token is going to be valid only for 1 day</div>
                <br>

                <button class="btn btn-primary shadow">Create</button>
            </form>
            @else 
                You can not create payment token because you do not have any balance
            @endif
        </div>
    </div>
@endsection