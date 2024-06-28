<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

<!-- Scripts -->
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>{{ config('app.name', 'Laravel') }}</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

*,
::after,
::before {
    box-sizing: border-box;
}

body {
    font-family: 'Poppins', sans-serif;
    font-size: 0.875rem;
    opacity: 1;
    /* overflow-y: scroll; */
    margin: 0;
    /* color: black !important */
    overflow-x: hidden;
}

a {
    cursor: pointer;
    text-decoration: none;
    font-family: 'Poppins', sans-serif;
}

li {
    list-style: none;
}

h4 {
    font-family: 'Poppins', sans-serif;
    font-size: 1.275rem;
    color: var(--bs-emphasis-color);
}

/* Layout for admin dashboard skeleton */

.wrapper {
    align-items: stretch;
    display: flex;
    /* width: 100px; */
    width: auto;    /* height: 100wh; */
    /* height: 100vh; */
    height: 100%;
  }

#sidebar {
    max-width: 264px;
    min-width: 264px;
    background: var(--bs-dark);
    transition: all 0.35s ease-in-out;
    width: 100vw;
    height: 100vh;
}
.y{
    width: 100%;
    /* height: 100%; */
    height: 100%;

}
.main {
    display: flex;
    flex-direction: column;
    /* min-height: 100vh; */
    min-width: 0;
    overflow: hidden;
    transition: all 0.35s ease-in-out;
    width: 80vw;
        background: var(--bs-dark-bg-subtle);
}

/* Sidebar Elements Style */

.sidebar-logo {
    padding: 1.15rem;
}

.sidebar-logo a {
    color: #e9ecef;
    font-size: 1.15rem;
    font-weight: 600;
}

.sidebar-nav {
    list-style: none;
    margin-bottom: 0;
    padding-left: 0;
    margin-left: 0;
}

.sidebar-header {
    color: #e9ecef;
    font-size: .75rem;
    padding: 1.5rem 1.5rem .375rem;
}

a.sidebar-link {
    padding: 35px;
    color: #e9ecef;
    position: relative;
    display: block;
    font-size: 1rem;
}

.sidebar-link[data-bs-toggle="collapse"]::after {
    border: solid;
    border-width: 0 .075rem .075rem 0;
    content: "";
    display: inline-block;
    padding: 2px;
    position: absolute;
    right: 1.5rem;
    top: 1.4rem;
    transform: rotate(-135deg);
    transition: all .2s ease-out;
}

.sidebar-link[data-bs-toggle="collapse"].collapsed::after {
    transform: rotate(45deg);
    transition: all .2s ease-out;
}

.avatar {
    height: 40px;
    width: 40px;
}

.navbar-expand .navbar-nav {
    margin-left: auto;
}

.content {
    flex: 1;
    max-width: 100vw;
    width: 100vw;
}

@media (min-width:768px) {
    .content {
        max-width: auto;
        width: auto;
    }
}

.card {
    box-shadow: 0 0 .875rem 0 rgba(34, 46, 60, .05);
    margin-bottom: 24px;
}

.illustration {
    background-color: var(--bs-primary-bg-subtle);
    color: var(--bs-emphasis-color);
}

.illustration-img {
    max-width: 150px;
    width: 100%;
}

/* Sidebar Toggle */

#sidebar.collapsed {
    margin-left: -264px;
}
.yy{
    display: flex;
    width: 100vw;
}

/* Footer and Nav */

@media (max-width:767.98px) {

    .js-sidebar {
        margin-left: -264px;
    }

    #sidebar.collapsed {
        margin-left: 0;
    }

    .navbar,
    footer {
        width: 100vw;
    }
}
</style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else


                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
       <div class="yy">
        <aside id="sidebar" class="js-sidebar">
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="#">Focal X</a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        {{ Auth::user()->roles_name }}
                    </li>
                    <li class="sidebar-item">
                        <a href="/home" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>
                            {{ Auth::user()->name }}
                        </a>
                    </li>
                    <li class="sidebar-item">
                        @canany(['create-user', 'edit-user', 'delete-user'])
                        <li><a class="sidebar-link collapsed" href="{{ route('users.index') }}">Manage Users</a></li>
                        @endcanany

                    </li>
                    <li class="sidebar-item">
                        @canany(['create-category', 'edit-category', 'delete-category'])
                        <li><a class="sidebar-link collapsed" href="{{ route('category.index') }}">Manage category</a></li>
                        @endcanany

                    </li>
                    <li class="sidebar-item">
                        @canany(['create-service', 'edit-service', 'delete-service'])
                        <li><a class="sidebar-link collapsed" href="{{ route('services.index') }}">Manage service</a></li>
                        @endcanany

                    </li>
                    <li class="sidebar-item">
                        @canany(['show-report-order'])
                        <li><a class="sidebar-link collapsed" href="{{ route('reports.index') }}">report</a></li>
                        @endcanany

                    </li>

                    @if(auth()->user()->hasRole('Employee'))
                    <li class="sidebar-item">
                    <li><a class="sidebar-link collapsed" href="{{ route('order.index') }}">Manage orders</a></li>
                    </li>
                    @endif
                    @if(auth()->user()->hasRole('Employee'))
                    <li class="sidebar-item">
                    <li><a class="sidebar-link collapsed" href="{{ route('contact.index') }}">Contact</a></li>
                    </li>
                    @endif

                    <!-- {{-- <li class="sidebar-item"> --}}
                       {{-- @canany(['show-orders-services','handel-order-service'])
<li><a class="sidebar-link collapsed" href="{{ route('order.index') }}">Manage orders</a></li>
@endcanany --}} -->
@if(auth()->user()->hasRole('Customer'))
{{-- <li><a class="sidebar-link collapsed" href="{{ route('services.show') }}">show all service</a></li> --}}
{{-- <li><a class="sidebar-link collapsed" href="{{ route('services.index') }}">show service</a></li> --}}
{{-- <li><a class="sidebar-link collapsed" href="{{ route('order.create') }}">order service</a></li> --}}
{{-- <li><a class="sidebar-link collapsed" href="{{ route('services.index') }}">contact form</a></li> --}}

@endif
@if(auth()->user()->hasRole('Employee'))
{{-- <li><a class="sidebar-link collapsed" href="{{ route('order.index') }}">show  order</a></li> --}}
{{-- <li><a class="sidebar-link collapsed" href="{{ route('order.handle') }}">order handle</a></li> --}}

@endif
                            </li>
                        </ul>
                    </li>
                </ul>

            </aside>
        <main class="y">

            @yield('content')
        </main>

       </div>
    </div>
    <script>
        const sidebarToggle = document.querySelector("#sidebar-toggle");
sidebarToggle.addEventListener("click",function(){
    document.querySelector("#sidebar").classList.toggle("collapsed");
});

document.querySelector(".theme-toggle").addEventListener("click",() => {
    toggleLocalStorage();
    toggleRootClass();
});




    </script>
</body>
</html>
