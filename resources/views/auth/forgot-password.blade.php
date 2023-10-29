@extends('layouts.bootstrap.guest')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('Forgot Password') }}</div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        {{ __('It was not possible to send the email. Try again') }}
                    </div>
                @else
                    <div class="alert alert-success" role="alert">
                        {{ __('We have emailed your password reset link') }}
                    </div>                
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-group">
                        <label for="email">{{ __('Email') }}</label>
                        <input id="email" type="email" name="email" class="form-control" required autofocus>
                    </div>
                    <br>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-block mx-auto">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                    <div class="mt-3 text-center">
                        <a href="{{ route('login') }}">{{ __('Back to Login') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script_bottom')
    <script src="{{ mix('js/validations/form-forgot-password.js') }}"></script>
@endpush
