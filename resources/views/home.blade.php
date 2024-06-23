@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    @canany(['create-user', 'edit-user', 'delete-user'])
                        <a class="btn btn-success" href="{{ route('users.index') }}">
                        <i class="bi bi-people"></i> Manage Users</a>
                    @endcanany

                    @canany(['create-category', 'edit-category', 'delete-category'])
                        <a class="btn btn-success" href="{{ route('category.index') }}">
                        <i class="bi bi-people"></i> Manage category</a>
                        @endcanany

                    @canany(['create-service', 'edit-service', 'delete-service'])
                        <a class="btn btn-success" href="{{ route('services.index') }}">
                        <i class="bi bi-people"></i> Manage Services</a>
                    @endcanany
                    @if(auth()->user()->hasRole('Admin'))
                    <a class="btn btn-success" href="{{ route('reports.index') }}">Order Reports</a>
                    <a class="btn btn-success" href="{{ route('reports.annual') }}">Overall Performance</a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
