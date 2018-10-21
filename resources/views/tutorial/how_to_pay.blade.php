@extends('layout.master')

@section('title') How to pay @endsection

@section('content')
    <div class="card simple-card">
        <div class="card-header border-bottom">How to pay</div> 
        <div class="card-body">
            <p>
            Firstly you need to create payment token on <a href='{{ route('payment_token.create') }}'>Create Payment Token</a> page. <br>
                The amount you put is a amount that can be charged by seller, so make sure you put same amount 
                that you are required to pay.
                <br> 
                Now when you have token you can provide it to seller, after seller uses it it will be invalid and can be removed
                by you.
            </p>
        </div>
    </div>
@endsection