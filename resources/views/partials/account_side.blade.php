<div class="row">
    <div class="col-sm-6 font-weight-bold">Account name</div>
    <div class="col-sm-6">{{ auth()->user()->name }}</div>
</div>
<div class="row">
    <div class="col-sm-6 font-weight-bold">Balance</div>
    <div class="col-sm-6">{{ round(auth()->user()->balance, 2) }}</div>
</div>