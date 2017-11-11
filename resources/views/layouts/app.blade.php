<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="container">

            <nav class="navbar is-transparent ">
                <div class="navbar-brand ">
                    <a class="navbar-item" href="{{url('/')}}">
                        Binoy Website
                    </a>
                    <div class="navbar-burger burger" data-target="navMenu"
                         onclick="event.preventDefault();
                         document.getElementById('navMenu').classList.toggle('is-active');">

                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>

                <div id="navMenu" class="navbar-menu ">
                    <div class="navbar-start">
                        <a class="navbar-item" href="{{url('/chat')}}">
                            Chat
                        </a>
                        <a class="navbar-item" href="{{url('/phonebook')}}">
                            Phonebook
                        </a>
                    </div>

                    <div class="navbar-end">
                        @guest
                            <li class="navbar-item"><a href="{{ route('login') }}">Login</a></li>
                            <li class="navbar-item"><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <div class="navbar-item has-dropdown is-hoverable" id="subNav">
                                <a class="navbar-link" href="">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="navbar-dropdown">
                                    <a class="navbar-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                        @endguest
                    </div>
                </div>
            </nav>
        </div>





        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script >

    </script>
</body>
</html>
