@extends('layout.master')

@section('title') Payment Tokens @endsection

@section('content')
               <div class="row">
                <div class="col-sm-12 text-sm-right">
                <a href="{{ route('payment_token.create') }}" class="btn btn-sm btn-dark">Create Payment Token</a>
                </div>
            </div>

    <div class="card simple-card">
        <div class="card-header border-bottom">Payment Tokens</div> 
        <div class="card-body">
 

                @include('partials.tokens_list', ['tokens' => $tokens])
          
        </div>
    </div>
@endsection