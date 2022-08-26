<nav class="navbar navbar-expand-lg navbar-dark p-0 navbar-custom">
    <div class="container">
        <a class="navbar-brand bg-white text-center logo-area" href="{{ route('news.index') }}">
            <!-- logo img -->
            <img src="{{ asset('images/logo.png')}}" alt="LOGO" class="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">
                <li class="nav-item me-4">
                    <a href="{{ route('news.index') }}" class="nav-link text-white fw-bold align-bottom">
                        Top
                    </a>
                </li>
                <li class="nav-item me-4">
                    <a href="" class="nav-link text-white fw-bold">
                        My Favorite
                    </a>
                </li>
                <li class="nav-item me-4">
                    <a href="" class="nav-link text-white fw-bold">
                        Categories
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link text-white fw-bold">
                        Countries
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item text-start me-4">
                    <!-- search bar -->
                    <button type="button" class="search border-0 text-center" data-bs-toggle="modal" data-bs-target="#search"><i class="fa fa-search" aria-hidden="true"></i>search</button>
                    <!-- search modal -->
                    @include('layouts.body.search-modal')
                </li>
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item me-4">
                            <a class="nav-link text-white fw-bold" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-white fw-bold" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a href="" class="dropdown-item">
                                <i class="fa-solid fa-user"></i>&nbsp;My Profile
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
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