@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="hero is-primary">

            @auth
                <div class="hero-body">
                    <div class="container">
                        <h1 class="title">
                            You are Logged in
                        </h1>
                        <h2 class="subtitle">
                            Hello World
                        </h2>
                    </div>
                </div>
            @endauth
            <div class="hero-body">
                <p>
                    This is my website. Here i recently created the phonebook system using vue js, Vue router and Bulma css framework.
                    I also created a Chat application where people can login or register to start chatting with one another. When a person is logged in
                    He will get notification of a person being logged in or logged out. Here I use the laravel Pusher and nofication package.
                </p>
            </div>
        </section>
    </div>
@endsection
