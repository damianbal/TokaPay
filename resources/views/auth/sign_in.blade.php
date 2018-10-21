@extends('layout.master')

@section('title') Sign In @endsection

@section('content')
    <div class="card simple-card">
        <div class="card-header border-bottom">Sign In</div> 
        <div class="card-body">
            <form method="POST" action="/login">
                @csrf

                <div class="form-group">
                    <label class="text-muted">Email</label> 
                    <input class="form-control shadow-sm" type="email" name="email" placeholder="Email address" required minlength="3">
                </div>
                
                <div class="form-group">
                    <label class="text-muted">Password</label> 
                    <input class="form-control shadow-sm" type="password" name="password" placeholder="Password" required minlength="3">
                </div>

                <button class="btn btn-primary shadow">Sign In</button>
            </form>
        </div>
    </div>
@endsection