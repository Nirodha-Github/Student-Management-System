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

                    <!-- {{ __('You are logged in!') }} -->


                    <div class="container p-1 mt-3">
                        <div class="row">
                            <h2 class="navbar-brand text-white">Admin Dashboard</h2>
                            <div class="d-flex justify-content-center btn-group">
                                <a role="button" class="btn btn-primary" href="students">Add New Students</a>
                                <a role="button" class="btn btn-secondary" href="courses">Add New Courses</a>
                                <a role="button" class="btn btn-warning" href="categories">Add New categories</a>
                                <a role="button" class="btn btn-dark" href="assign-students">Assign Students</a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="card col-sm-12">
                                <div>
                                    <h1>Welcome to Dashboard</h1>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
