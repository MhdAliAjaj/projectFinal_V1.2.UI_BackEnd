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
                     
               

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
