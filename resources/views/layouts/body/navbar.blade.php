<div class="text-center py-2 bg-white">
    <a class="navbar-brand" href="{{ route('news.index') }}">
        <!-- logo img -->
        <img src="{{ asset('images/logo.webp')}}" alt="LOGO" class="logo" width="60">
    </a>
</div>
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item nav-item-custom me-4 myLink" data-pathname="/index.php">
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
                    <a id="categoriesDropdown" class="nav-link dropdown-toggle text-white fw-bold" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                    </a>
                    <!-- category dropdown list -->
                    <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                        @foreach ($all_categories as $category)
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
                    <ul class="dropdown-menu dropdown-menu-custom" aria-labelledby="countriesDropdown">
                        @foreach ($continents as $continent)
                            @php
                                $sources_by_continent = $all_sources->filter(function($source) use($continent) {
                                    return $source->country->continent == $continent;
                                });
                            @endphp
                            <span class="dropdown-item fw-bold d-block text-center">--- {{ $continent }} ---</span>
                            @foreach ($sources_by_continent as $sources)
                                <a href="{{ route('news.media' , $sources->id) }}" class="dropdown-item">
                                    {{ $sources->country->name }}
                                </a>
                            @endforeach
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item nav-item-custom dropdown me-4">
                    <a id="countriesDropdown" class="nav-link dropdown-toggle text-white fw-bold" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        Countries
                    </a>

                    <!-- category dropdown list -->
                    <ul class="dropdown-menu dropdown-menu-custom" aria-labelledby="countriesDropdown">
                        @foreach ($continents as $continent)
                            @php
                                $countries_by_continent = $all_countries->filter(function($country) use($continent) {
                                    return $country->continent == $continent;
                                });
                            @endphp
                            <span class="dropdown-item fw-bold d-block text-center">--- {{ $continent }} ---</span>
                            @foreach ($countries_by_continent as $country)
                                <a href="{{ route('news.country' , $country->id) }}" class="dropdown-item">
                                    {{ $country->name }}
                                </a>
                            @endforeach
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item nav-item-custom text-start me-4">
                    <!-- search bar -->
                    <a href="#" class="nav-link text-white fw-bold border-0" data-bs-toggle="modal" data-bs-target="#search">Search</a>
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
                                    <i class="fa-solid fa-inbox"></i>&nbsp;Dashboard
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
