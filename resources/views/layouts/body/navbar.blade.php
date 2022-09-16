<div class="text-center py-2 bg-white">
    <a class="navbar-brand" href="{{ route('news.index') }}">
        <!-- logo img -->
        <img src="{{ asset('images/logo.png')}}" alt="LOGO" class="logo" width="60">
    </a>
</div>
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item nav-item-custom me-4">
                    <a href="{{ route('news.index') }}" class="nav-link text-white fw-bold align-bottom">
                        Top
                    </a>
                </li>
                <li class="nav-item nav-item-custom me-4">
                    <a href="{{ route('user.news.favorite') }}" class="nav-link text-white fw-bold">
                        My Favorite
                    </a>
                </li>
                <li class="nav-item nav-item-custom dropdown me-4">
                    <a id="categoriesDropdown" class="nav-link dropdown-toggle text-white fw-bold" href="" data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                    </a>

                    <!-- category dropdown list -->
                    <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                        @php
                            $categories = App\Models\Category::all();
                        @endphp
                        @foreach ($categories as $category)
                            <a href="{{ route('news.category', $category->id) }}" class="dropdown-item">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item nav-item-custom dropdown me-4">
                    <a id="countriesDropdown" class="nav-link dropdown-toggle text-white fw-bold" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        Media
                    </a>

                    <!-- category dropdown list -->
                    <ul class="dropdown-menu" aria-labelledby="countriesDropdown">
                        @php
                            $sources = App\Models\Source::all();
                        @endphp
                        @foreach ($sources as $source)
                            <a href="{{ route('news.media', $source->id) }}" class="dropdown-item">
                                {{ $source->country->name }}
                            </a>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item nav-item-custom dropdown me-4">
                    <a id="countriesDropdown" class="nav-link dropdown-toggle text-white fw-bold" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        Countries
                    </a>

                    <!-- category dropdown list -->
                    <ul class="dropdown-menu" aria-labelledby="countriesDropdown">
                        @php
                            $countries = App\Models\Country::whereNotNull('continent' )->get();
                        @endphp
                        @foreach ($countries as $country )
                            <a href="{{ route('news.country' , $country->id) }}" class="dropdown-item">
                                {{ $country->name }}
                            </a>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item nav-item-custom text-start me-4">
                    <!-- search bar -->
                    <a href="" class="nav-link text-white fw-bold border-0" data-bs-toggle="modal" data-bs-target="#search">Search</a>
                    <!-- search modal -->
                    @include('layouts.body.search-modal')
                </li>
                @guest
                    @unless (Route::is('login') || Route::is('register'))
                        <li class="nav-item nav-item-custom me-4">
                            <a class="nav-link text-white fw-bold" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>

                        <li class="nav-item nav-item-custom">
                            <a class="nav-link text-white fw-bold" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endunless
                @else
                    <li class="nav-item nav-item-custom dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->username }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a href="{{route('user.profile.show', Auth::id())}}" class="dropdown-item">
                                <i class="fa-solid fa-user"></i>&nbsp;My Profile
                            </a>

                            @if (Auth::user()->is_admin)
                                <a href="{{ route('admin.show.dashboard') }}" class="dropdown-item">
                                    <i class="fa-solid fa-inbox"></i>Dashboard
                                </a>
                            @endif

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