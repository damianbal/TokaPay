@extends('layout.master')

@section('title') Accept Payments @endsection

@section('content')
    <div class="card simple-card">
        <div class="card-header border-bottom">Accept Payments</div> 
        <div class="card-body">
            <p>
                To accept payment you need to send 'POST' request to <code>/api/accept-payment</code> with those fields, 
                paymentToken, accessKey, transAmount, transTitle. <br>
                <br> 
                <b>paymentToken</b> is a token which user provides you with, you can grab it from some input.<br>
                <b>accessKey</b> this is your key from your profile, you can find it on homepage<br>
                <b>transAmount</b> this is how much user is going to be charged, make sure that this amount is correctly visible for user<br> 
                <b>transTitle</b> transaction title.<br>
                <br> 
              
                @auth
            Your access key is <code>{{ auth()->user()->access_key }}</code>
            @endauth
            </p>
        </div>
    </div>
@endsection