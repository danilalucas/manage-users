@extends('layouts.bootstrap.guest')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div  class="col-md-6">
            <div class="row">
                <div class="col text-center text-info">
                    <h4 class="p-2"> {{ config('app.name') }} </h4>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header bg-primary text-white"> {{ __('Login') }} </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            {{ __('The provided credentials are incorrect') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ __(session('status')) }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email"> {{ __('Email') }} </label>
                            <input id="email" type="email" name="email" class="form-control" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="password"> {{ __('Password') }} </label>
                            <input id="password" type="password" name="password" class="form-control" required>
                        </div>
                        <br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label" for="remember">
                                {{ __('Remember me') }}
                            </label>
                        </div>
                        <br>
                        <div class="d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-primary"> {{ __('Login') }} </button>
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script_bottom')
    <script src="{{ mix('js/validations/form-login.js') }}"></script>
@endpush
