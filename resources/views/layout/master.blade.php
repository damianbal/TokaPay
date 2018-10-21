<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TokaPay - @yield('title', '')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">    
</head>
<body>
    <main class="container shadow-sm">

            <!-- nav -->
        <nav class="row bg-primary shadow-sm">
            <div class="col-sm-12">
            <a href="{{ route('home') }}">Home</a>

            @guest
            <a href="{{ route('auth.sign_in') }}">Sign In</a> 
            <a href="{{ route('auth.sign_up') }}">Sign Up</a> 
            @endguest

            @auth
                <a href="#">Account ({{ auth()->user()->name }})</a>
                <a href="{{ route('auth.sign_out') }}">Sign out</a>
            @endauth

            </div>
        </nav>

        <!-- header -->
        <header class="row text-muted bg-body border-bottom">
            <div class="col-sm-12">
                TokaPay
            </div>
        </header>

        @include('partials.errors')
        @include('partials.messages')

        <!-- body -->
        <section class="row p-3">
            <div class="col-sm-12">
                @yield('content')
            </div>
        </secton>




    </main>

    {{--
            <!-- footer -->
        <footer class="container bg-body p-2">
            <div class="row">
            <div class="col-sm-12 text-muted small">TokaPay</div>
            </div>
        </footer> --}}

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>