<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="{{ mix('js/admin.js') }}"></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        <link href="{{ mix('css/admin/style.css') }}" rel="stylesheet">
        <link href="{{ mix('css/admin/navbar.css') }}" rel="stylesheet">
        <link rel="shortcut icon" href="{{ asset('images/news_favicon.png') }}">
        @yield('style')

        <!-- fontawesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Insert the blade containing the TinyMCE configuration and source script -->
        <x-head.tinymce-config/>

</body>
</head>
<body>
        <div id="app">
            <div class="d-flex" id="wrapper">
                <!-- Sidebar-->
                <div class="sidebar" id="sidebar-wrapper">
                    <div class="list-group">
                        <a href="{{ route('news.index') }}"><img src="{{ asset('storage/images/logo_transparent.png') }}" alt="" class="list-group-item w-50 d-block mx-auto"></a>
                        <a href="{{ route('news.index') }}" class="list list-group-item btn d-block text-decoration-none text-white"><span class="me-2"><i class="fa-solid fa-arrow-left"></i></span>Top</a>
                        <a href="{{ route('admin.show.dashboard') }}" class="list list-group-item btn d-block text-decoration-none text-white"><span class="me-2"><i class="fa-solid fa-inbox"></i></span>Dashboard</a>
                        <a href="{{ route('admin.news.list') }}" class="list list-group-item btn d-block text-decoration-none text-white"><span class="me-2"><i class="fa-solid fa-newspaper"></i></span>News</a>
                        <a href="{{ route('admin.comments.list') }}" class="list list-group-item btn d-block text-decoration-none text-white"><span class="me-2"><i class="fa-solid fa-comments"></i></span>Comments</a>
                        <a href="{{ route('admin.users.list') }}" class="list list-group-item btn d-block text-decoration-none text-white"><span class="me-2"><i class="fa-solid fa-users"></i></span>Users</a>
                        <a href="{{ route('admin.news.create') }}" class="list list-group-item btn d-block text-decoration-none text-white"><span class="me-2"><i class="fa-solid fa-file-circle-plus"></i></span>Create news</a>
                    </div>
                </div>
                <!-- Page content wrapper-->
                <div id="page-content-wrapper">
                    <!-- Top navigation-->
                    <nav class="navbar navbar-expand-lg">
                        <ul class="navbar-nav me-auto">
                            <button class="btn text-white fs-5" id="sidebarToggle">
                                <i class="fa-solid fa-bars"></i>
                            </button>
                        </ul>
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item nav-item-custom dropdown me-4">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a href="{{route('user.profile.show', Auth::id())}}" class="dropdown-item">
                                        <i class="fa-solid fa-user"></i>&nbsp;My Profile
                                    </a>

                                    @if (Auth::user()->is_admin)
                                        <a href="{{ route('admin.show.dashboard') }}" class="dropdown-item">
                                            <i class="fa-solid fa-inbox"></i> Dashboard
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
                        </ul>
                    </nav>
                    <!-- Page content-->
                <main>
                    <div class="container-fluid px-5">
                        @yield('content')
                    </div>
                </main>
                </div>
            </div>
        </div>
    </body>
    @yield('script')
</html>
