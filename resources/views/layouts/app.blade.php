<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/266119dd78.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        div.dropdown-multicol{
            width: 30em;
        }
        div.dropdown-row>a.dropdown-item{
            display:inline-block;
            width: 32%;
        }

        /* Columns */
        div.dropdown-multicol2{
            width: 30em;
        }
        div.dropdown-multicol2>div.dropdown-col{
            display:inline-block;
            width: 32%;
        }
        footer.footer {
            padding-top: 5rem;
            padding-bottom: 5rem;
        }

        footer.footer .social-link {
            display: block;
            height: 4rem;
            width: 4rem;
            line-height: 4.3rem;
            font-size: 1.5rem;
            background-color: #1D809F;
            transition: background-color 0.15s ease-in-out;
            box-shadow: 0 3px 3px 0 rgba(0, 0, 0, 0.1);
        }

        footer.footer .social-link:hover {
            background-color: #155d74;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-gradient">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">Written
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    @guest

                    @else
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Browse
                        </button>
                        <div class="dropdown-menu dropdown-multicol2" aria-labelledby="dropdownMenuButton">
                            <div class="dropdown-col">
                            <a class="dropdown-item" href="#">Oranges</a>
                            <a class="dropdown-item" href="#">Bananas</a>
                            <a class="dropdown-item" href="#">Apples</a>
                            </div>
                            <div class="dropdown-col">
                            <a class="dropdown-item" href="#">Potatoes</a>
                            <a class="dropdown-item" href="#">Leeks</a>
                            <a class="dropdown-item" href="#">Cauliflowers</a>
                            </div>
                            <div class="dropdown-col">
                            <a class="dropdown-item" href="#">Beef</a>
                            <a class="dropdown-item" href="#">Pork</a>
                            <a class="dropdown-item" href="#">Venison</a>
                            </div>
                        </div>
                    </div>

                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a href="{{route('post.create')}}" class="nav-link">Create</a></li>
                        @can('haveaccess','role.index')
                            <li class="nav-item"><a href="{{route('role.index')}}" class="nav-link">Role</a></li>
                        @endcan
                        @can('haveaccess','user.index')
                            <li class="nav-item"><a href="{{route('user.index')}}" class="nav-link">User</a></li>
                        @endcan
                    </ul>

                    @endguest


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <!-- Search Form-->
                            <form  class="d-flex" action="{{route('post.search')}}" method="GET">
                                @csrf
                                <input class="form-control me-2" style="margin-right: 2%" type="search" placeholder="Title" aria-label="Search" name="search" id="search">
                                <button class="btn btn-outline-success" style="margin-right: 5%" type="submit">Search</button>
                            </form>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right bg-dark" aria-labelledby="navbarDropdown">
                                    @can('haveaccess', 'userown.show')
                                        <a class="dropdown-item bg-dark" style="color: white" href="{{route('user.show', Auth::user()->id)}}">My Profile</a>
                                    @endcan

                                    <a class="dropdown-item bg-dark" style="color: white" href="{{route('post.index')}}">My Writings</a>

                                    <a class="dropdown-item bg-dark" style="color: white" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Log Out') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
