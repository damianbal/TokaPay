@extends('layout.master')

@section('title') Payment Tokens @endsection

@section('content')
    @include('partials.toolbar')

    <div class="card simple-card">
        <div class="card-header border-bottom">Payment Tokens</div> 
        <div class="card-body">
 
            @if($tokens->count() < 1)
                <div class=" text-muted">You don't have any payment tokens</div>
            @else 
                @include('partials.tokens_list', ['tokens' => $tokens])
            @endif

        </div>
    </div>
@endsection