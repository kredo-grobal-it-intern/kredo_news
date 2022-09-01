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
                <li class="nav-item dropdown me-4">
                    <a id="categoriesDropdown" class="nav-link dropdown-toggle text-white fw-bold" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                    </a>

                    <!-- category dropdown list -->
                    <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                        <a href="" class="dropdown-item">
                            Politics
                        </a>
                        <a href="" class="dropdown-item">
                            Business
                        </a>
                        <a href="" class="dropdown-item">
                            Sports
                        </a>
                        <a href="" class="dropdown-item">
                            Travel
                        </a>
                        <a href="" class="dropdown-item">
                            Health
                        </a>
                        <a href="" class="dropdown-item">
                            Entertainment
                        </a>
                    </ul>
                </li>
                <li class="nav-item dropdown me-4">
                    <a id="countriesDropdown" class="nav-link dropdown-toggle text-white fw-bold" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        Countries
                    </a>

                    <!-- category dropdown list -->
                    <ul class="dropdown-menu" aria-labelledby="countriesDropdown">
                        <a href="" class="dropdown-item">
                            America
                        </a>
                        <a href="" class="dropdown-item">
                            Japan
                        </a>
                        <a href="" class="dropdown-item">
                            UK
                        </a>
                        <a href="" class="dropdown-item">
                            Brazil
                        </a>
                        <a href="" class="dropdown-item">
                            Spain
                        </a>
                        <a href="" class="dropdown-item">
                            China
                        </a>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item text-start me-4">
                    <!-- search bar -->
                    <a href="" class="nav-link text-white fw-bold border-0" data-bs-toggle="modal" data-bs-target="#search">Search</a>
                    <!-- search modal -->
                    @include('layouts.body.search-modal')
                </li>
                @guest
                    @if (!Route::is('login') && !Route::is('register'))
                        <li class="nav-item me-4">
                            <a class="nav-link text-white fw-bold" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white fw-bold" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->username }}
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