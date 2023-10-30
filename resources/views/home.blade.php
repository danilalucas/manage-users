@extends('layouts.bootstrap.app')

@section('content')
    <div class="highlight rounded-pill bg-primary text-center">
        <div class="container text-white">
            <h1> {{ __('User Manager') }} </h1>
            <p> {{ __('Full control over your users') }} </p>
        </div>
    </div>

    <div class="feature bg-white text-center">
        <div class="container">
            <h2> {{ __('Key Features') }} </h2>
            <div class="row">
                <div class="col-md-6">
                    <span class="icon">
                        <i class="fa-solid fa-users" style="color: #533566;"></i>
                    </span>
                    <h3> {{ __('Manage Users') }} </h3>
                    <p> {{ __('Add, edit and remove users with ease.') }} </p>
                </div>
                <div class="col-md-6">
                    <span class="icon">
                        <i class="fa-solid fa-key" style="color: #f9c23c;"></i>
                    </span>
                    <h3> {{ __('Access control') }} </h3>
                    <p> {{ __('Set access permissions for each user.') }} </p>
                </div>
            </div>
        </div>
    </div>
@endsection