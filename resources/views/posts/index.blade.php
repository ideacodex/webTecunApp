@extends('layouts.admin')

@section('content')
<div class="container">
    <div>
        <html>

        <head>
            @trixassets
        </head>

        <body>
            <form method="POST" action="{{url('adminPost')}}">
                @csrf
                <label for="">titulo</label>
                <input type="text" name="title" id="">
                @csrf
                @trix(\App\Article::class, 'content')
                <input type="submit">
            </form>
        </body>

        </html>
    </div>
</div>
@endsection