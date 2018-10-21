@if (Session::has('messages'))
    <div class="alert alert-success mt-3">
            @foreach (Session::get('messages') as $msg)
                <div>{{ $msg }}</div>
            @endforeach
    </div>
@endif