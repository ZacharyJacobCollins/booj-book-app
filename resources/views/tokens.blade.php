@extends('layouts.app')

{{--Display user login routes--}}
@if (Route::has('login'))
    <div class="top-right links">
        {{--If user is logged in display home--}}
        @auth
        @section('content')
            <passport-clients></passport-clients>
            <passport-authorized-clients></passport-authorized-clients>
            <passport-personal-access-tokens></passport-personal-access-tokens>
        @endsection

        {{--Else login--}}
        @else
    </div>

@section('content')
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="{{ "/book.png" }}" alt="" width="72" height="72">
        <h2>auto</h2>
        <p class="lead">the book app.</p>
    </div>
@endsection

@endauth
@endif
