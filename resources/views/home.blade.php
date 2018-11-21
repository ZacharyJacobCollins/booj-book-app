@extends('layouts.app')

{{--Display user login routes--}}
@if (Route::has('login'))
    <div class="top-right links">
        {{--If user is logged in display home--}}
        @auth
            @section('content')
                <div class="container">
                    <div class="py-5 text-center">
                        <img class="d-block mx-auto mb-4" src="{{ "/book.png" }}" alt="" width="72" height="72">
                        <h2>the book app.</h2>
                    </div>

                    <div class="row">
                        <book-manager></book-manager>

                        <div class="col-md-8 order-md-1">
                            <h4 class="mb-3">add a book</h4>
                            <form class="needs-validation" novalidate>

                                <input type="hidden" class="form-control" id="userId" value={{ Auth::user()->id }} name="userId" required>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="title" placeholder="title" name="title" value="" required>
                                        <div class="invalid-feedback" style="width: 100%;">
                                            title is required.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="date" value="2018-11-21" class="form-control" id="publicationDate" placeholder="title" name="publicationDate" required>
                                        <div class="invalid-feedback" style="width: 100%;">
                                            publication date is required.
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="firstName" placeholder="author first name" value="" name="firstName" required>
                                        <div class="invalid-feedback">
                                            valid name is required.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="lastName" placeholder="author last name" value="" name="lastName" required>
                                        <div class="invalid-feedback">
                                            valid last name is required.
                                        </div>
                                    </div>
                                </div>

                                <hr class="mb-4">

                                <button type="button" v-on:click="addBook" class="btn btn-primary btn-lg btn-block">add book</button>
                            </form>
                        </div>
                    </div>

                    <footer class="my-5 pt-5 text-muted text-center text-small">
                        <p class="mb-1">&copy; Zac</p>
                        <ul class="list-inline">
                            <li class="list-inline-item"><a href="#">Readme</a></li>
                            <li class="list-inline-item"><a href="#">Time report</a></li>
                        </ul>
                    </footer>
                </div>

                {{--<div id="toReplace">--}}
                    {{--<div :is="component"></div>--}}
                    {{--Current displayed component--}}
                    {{--<div v-show="!component" v-for="currentComponent in componentsArray">--}}
                        {{--<button @click="swap(currentComponent)">@{{currentComponent}}</button>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<button @click="swap(null)">Close</button>--}}
            @endsection

        {{--Else login--}}
        @else
        </div>

            @section('content')
                <div class="py-5 text-center">
                    <img class="d-block mx-auto mb-4" src="{{ "/book.png" }}" alt="" width="72" height="72">
                    <h2>the book app.</h2>
                </div>
            @endsection

        @endauth
@endif


