@extends ('layout')

@section ('content')
<div id="header-featured">
    <div id="banner-wrapper">
        <div id="banner" class="container">
            <h2>Hi {{ Auth::user() ? Auth::user()->name : 'there' }}</h2>
            <p>This is a simple app created using the <a href="https://laracasts.com/series/laravel-6-from-scratch/">Laravel From Scratch</a> series on: </p>
            <a href="https://laracasts.com" class="button">Laracasts</a>
        </div>
    </div>
</div>
@endsection