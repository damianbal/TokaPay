@extends('layout.master')

@section('title') Sign Up @endsection

@section('content')
    <div class="card simple-card">
        <div class="card-header border-bottom">Sign Up</div> 
        <div class="card-body">
           <form method="POST" action="/register">
                 @csrf
                <div class="form-group">
                    <label class="text-muted">Email</label> 
                    <input class="form-control shadow-sm" type="email" name="email" placeholder="Email address" required minlength="3">
                </div>

                <div class="form-group">
                    <label class="text-muted">Name</label> 
                    <input class="form-control shadow-sm" type="text" name="name" placeholder="Display name" required minlength="3">
                </div>
                
                <div class="form-group">
                    <label class="text-muted">Password</label> 
                    <input class="form-control shadow-sm" type="password" name="password" placeholder="Password" required minlength="3">
                </div>

                <button class="btn btn-primary shadow">Sign Up</button>
            </form>
        </div>
    </div>
@endsection