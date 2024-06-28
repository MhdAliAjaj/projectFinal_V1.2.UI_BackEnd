@extends('layouts.app')

@section('content')
{{-- <div class="container"> --}}




                    <div class="wrapper">
                        {{-- <aside id="sidebar" class="js-sidebar">
                    <div class="h-100">
                        <div class="sidebar-logo">
                            <a href="#">Focal X</a>
                        </div>
                        <ul class="sidebar-nav">
                            <li class="sidebar-header">
                                Ali Saleh
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">
                                    <i class="fa-solid fa-list pe-2"></i>
                                    Dashboard
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
                                @canany(['show-orders-services','handel-order-service'])
                                <li><a class="sidebar-link collapsed" href="{{ route('order.index') }}">Manage orders</a></li>
                                @endcanany
                                    </li>
                                </ul>
                            </li>
                        </ul>

                    </aside> --}}
                    <div class="main">
                        <nav class="navbar navbar-expand px-3 border-bottom">
                            <button class="btn" id="sidebar-toggle" type="button">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="navbar-collapse navbar">
                                <ul class="navbar-nav">
                                    <li class="nav-item dropdown">
                                        <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
            <h2>Focal X</h2>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <main class="content px-3 py-2">
                            <div class="container-fluid">

                                <div class="mb-3">
                                    @if(auth()->user()->hasRole('Admin'))
                                    <h4>Admin Dashboard</h4>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6 d-flex">
                                        <div class="card flex-fill border-0 illustration">
                                            <div class="card-body p-0 d-flex flex-fill">
                                                <div class="row g-0 w-100">
                                                    <div class="col-6">
                                                        <div class="p-3 m-1">
                                                            <h4>Welcome Back, {{ Auth::user()->name }}</h4>
                                                            <p class="mb-0"> {{ Auth::user()->roles_name }} in focal x</p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </main>


                    </div>

                    <!-- {{-- @canany(['create-service', 'edit-service', 'delete-service'])
                        <a class="btn btn-success" href="{{ route('services.index') }}">
                        <i class="bi bi-people"></i> Manage Services</a>
                    @endcanany --}} -->




                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start ">
                            <p class="mb-0">
                                <a href="#" class="text-muted">
                                    <strong>Focal x</strong>
                                </a>
                            </p>
                        </div>
                        <div class="col-6 text-end">
                            <ul class="list-inline">
                                <span class="mt-4 text-center  ">focal x &copy;  </span>

                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

    </div>
</div>

</div>

@endsection

