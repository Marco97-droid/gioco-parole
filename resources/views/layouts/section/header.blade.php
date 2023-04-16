<header id="#top" class="">

    <nav class="header-area main-navigation navbar navbar-expand-lg navbar-light">
        <div class="container-fluid ">

            <button onclick="sidebar()" class="navbar-toggler bg-giallo" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" hidden id="navbarNav">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link {{url()->current() == route('gioco') ? 'active' : ''}}" href="{{ url('/') }}">Torna al gioco</a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('login'))
                            @auth
                        <li class="nav-item">
                            <a class="nav-link {{url()->current() == route('profilo' , Auth::user()->id) ? 'active' : ''}}" href="{{ route('profilo' , Auth::user()->id) }}">Profilo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{url()->current() == route('stats.show' , Auth::user()->id) ? 'active' : ''}}" href="{{ route('stats.show' , Auth::user()->id) }}">Statistiche</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link {{url()->current() == route('login') ? 'active' : ''}}" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{url()->current() == route('register') ? 'active' : ''}}" href="{{ route('register') }}">Registrati</a>
                        </li>
                    @endauth
                    @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="position-absolute  blocco-sidebar">

        <div class="menu-sidebar  position-fixed close-sidebar" id="sidebar">
            <ul class="nav-sidebar">
                @auth
                    <div class="sidebar-item sidebar-profilo">
                        <a herf="" class="nav login user-log-name">
                            <img class="img-40 rounded user-log-img"
                                src="{{ Auth::user()->foto ? asset(Auth::user()->foto) : '/images/placeholder-user.jpg' }} ">
                            <span cass="nav-link user-log-name"
                                style="font-weight: 600;
                                        padding: 10px 20px;">
                                {{ Auth::user()->username }}</span>
                        </a>
                    </div>
                    <li class="sidebar-item">
                        <a class="nav-link {{url()->current() == route('gioco') ? 'active' : ''}}" href="{{ url('/') }}">
                            <i data-feather="grid" class="sidebar-icon"></i>
                            Torna al gioco
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="nav-link {{url()->current() == route('profilo' , Auth::user()->id) ? 'active' : ''}}" href="{{ route('profilo', Auth::user()->id) }}">
                            <i data-feather="user" class="sidebar-icon"></i>
                            Profilo
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="nav-link {{url()->current() == route('stats.show' , Auth::user()->id) ? 'active' : ''}}" href="{{ route('stats.show' , Auth::user()->id) }}">
                            <i data-feather="trending-up" class="sidebar-icon"></i>
                            Statistiche
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="nav-link {{url()->current() == route('premi') ? 'active' : ''}}" href="{{ route('premi') }}">
                            <i data-feather="gift" class="sidebar-icon"></i>
                            Premi
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i data-feather="log-out" class="sidebar-icon"></i>
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                       </form>
                    </li>
                    @else
                    <div class="sidebar-item sidebar-profilo"></div>
                    <li class="sidebar-item">
                        <a class="nav-link {{url()->current() == route('gioco') ? 'active' : ''}}" href="{{ url('/') }}">
                            <i data-feather="grid" class="sidebar-icon"></i>
                            Torna al gioco
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="nav-link {{url()->current() == route('login') ? 'active' : ''}}" href="{{ route('login') }}">
                            <i data-feather="key" class="sidebar-icon"></i>
                            Login
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="nav-link {{url()->current() == route('register') ? 'active' : ''}}" href="{{ route('register') }}">
                            <i data-feather="log-in" class="sidebar-icon"></i>
                            Registrati
                        </a>
                    </li>

                @endauth


            </ul>
        </div>

    </div>

</header>
