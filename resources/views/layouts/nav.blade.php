<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Manager</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                {{--<li class="nav-item active">--}}
                    {{--<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>--}}
                {{--</li>--}}

                @if (Auth::guest())
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">Register</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu" role="menu">

                                <a href="{{ route('logout') }}" class="dropdown-item"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>

                        </div>
                    </li>
                @endif

                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="#">Link</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link disabled" href="#">Disabled</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item dropdown">--}}
                    {{--<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                        {{--Dropdown--}}
                    {{--</a>--}}
                    {{--<div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
                        {{--<a class="dropdown-item" href="#">Action</a>--}}
                        {{--<a class="dropdown-item" href="#">Another action</a>--}}
                        {{--<div class="dropdown-divider"></div>--}}
                        {{--<a class="dropdown-item" href="#">Something else here</a>--}}
                    {{--</div>--}}
                {{--</li>--}}
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    {{--<div class="collapse bg-dark" id="navbarHeader">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-sm-8 col-md-7 py-4">--}}
                    {{--<h4 class="text-white">About</h4>--}}
                    {{--<p class="text-muted">Add some information about the album below, the author, or any other--}}
                        {{--background context. Make it a few sentences long so folks can pick up some informative tidbits.--}}
                        {{--Then, link them off to some social networking sites or contact information.</p>--}}
                {{--</div>--}}
                {{--<div class="col-sm-4 offset-md-1 py-4">--}}
                    {{--<h4 class="text-white">Contact</h4>--}}
                    {{--<ul class="list-unstyled">--}}
                        {{--@if (Auth::guest())--}}
                            {{--<li><a href="{{ route('login') }}">Login</a></li>--}}
                            {{--<li><a href="{{ route('register') }}">Register</a></li>--}}
                        {{--@else--}}
                            {{--<li class="dropdown">--}}
                                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">--}}
                                    {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
                                {{--</a>--}}

                                {{--<ul class="dropdown-menu" role="menu">--}}
                                    {{--<li>--}}
                                        {{--<a href="{{ route('logout') }}"--}}
                                           {{--onclick="event.preventDefault();--}}
                                                     {{--document.getElementById('logout-form').submit();">--}}
                                            {{--Logout--}}
                                        {{--</a>--}}

                                        {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                                            {{--{{ csrf_field() }}--}}
                                        {{--</form>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                        {{--@endif--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="navbar navbar-dark bg-dark box-shadow">--}}
        {{--<div class="container d-flex justify-content-between">--}}
            {{--<a href="#" class="navbar-brand d-flex align-items-center">--}}
                {{--<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"--}}
                     {{--stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2">--}}
                    {{--<path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path>--}}
                    {{--<circle cx="12" cy="13" r="4"></circle>--}}
                {{--</svg>--}}
                {{--<strong>Manager</strong>--}}
            {{--</a>--}}
            {{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader"--}}
                    {{--aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">--}}
                {{--<span class="navbar-toggler-icon"></span>--}}
            {{--</button>--}}
        {{--</div>--}}
    {{--</div>--}}
</header>