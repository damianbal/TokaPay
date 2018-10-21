@extends('layout.master')

@section('title') Transactions @endsection

@section('content')

    @include('partials.toolbar')

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