<div class="">
    <div class="row font-weight-bold bg-body border-bottom">
        <div class="col-sm p-2">Token</div> 
        <div class="col-sm p-2">Valid</div> 
        <div class="col-sm p-2">Valid Until</div>
        <div class="col-sm p-2">Actions</div> 
    </div>

    @foreach($tokens as $tok)
    <div class="row text-muted">
        <div class="col-sm p-2"><code>{{ $tok->token }}</code></div> 
    <div class="col-sm p-2">{{ $tok->valid ? 'Yes' : 'No' }}</div> 
    <div class="col-sm p-2">{{ $tok->valid_until}}</div>
        <div class="col-sm p-2">
        <form method="POST" action="{{ route('payment_token.destroy', $tok->id) }}">@csrf <button class="btn btn-block btn-sm btn-outline-danger">Remove</button></form>    
        </div> 
    </div>
    @endforeach
</div>