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
    <main class="container">
        <!-- header -->
        <header class="row">

        </header>

        <!-- nav -->
        <nav class="row">

        </nav>

        <!-- body -->
        <nav class="row">
            @yield('content')
        </nav>

        <!-- footer -->
        <footer class="row">

        </footer>
    </main>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>