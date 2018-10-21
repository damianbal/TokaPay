<div class="">
    <div class="row font-weight-bold bg-body border-bottom">
        <div class="col-sm p-2">Title</div> 
        <div class="col-sm p-2">Amount</div> 
        <div class="col-sm p-2">Paid to</div> 
    </div>
    @foreach($transactions as $trans)
    @if($trans->receiver_id == auth()->user()->id)
    <div class="row bg-success text-white">
    @else 
    <div class="row bg-danger text-white">
    @endif
        <div class="col-sm p-2">{{ $trans->title }}</div> 
        <div class="col-sm p-2">    
           @if($trans->receiver_id == auth()->user()->id) + @else - @endif
            {{ $trans->amount }}
        </div> 
        <div class="col-sm p-2">{{ $trans->receiver->name }}</div> 
    </div>
    @endforeach
</div>