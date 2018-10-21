@extends('layout.master')

@section('title') Transactions @endsection

@section('content')
               <div class="row">
                <div class="col-sm-12 text-sm-right">
                <a href="{{ route('payment_token.create') }}" class="btn btn-sm btn-dark">Create Payment Token</a>
                </div>
            </div>

    <div class="card simple-card">
        <div class="card-header border-bottom">Transactions</div> 
        <div class="card-body">
 
            <div class="row text-muted">
                <div class="col-sm-3">
                   @include('partials.account_side')
                </div>
                <div class="col-sm-9">
                    @include('partials.transactions_list', ['transactions' => $transactions])

                    <div class="mt-3">
                        {{ $transactions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection