<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'JutsyVel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @guest
                        <li class="nav-item">
                                <a class="nav-link" href="/posts">Blog Posts</a>
                            </li>
                        @else

                                <li class="nav-item active">
                                    <a class="nav-link" href="/dashboard">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/posts">Blog Posts</a>
                                </li>
                                <li class="nav-item pull-right">
                                        <a class="nav-link" href="/posts/create">Create Post</a>
                                </li>

                        @endguest

                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @else
                            <li class="nav-item">
                                    <a class="nav-link" href="#">{{ Auth::user()->name }}</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 {{ __('Logout') }}
                             </a>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 @csrf
                             </form>
                            </li>
                            @endguest
                        </ul>
            </div>

    </div>
</nav>
