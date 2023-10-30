@extends('layouts.bootstrap.guest')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="col-md-6">
        <div class="row">
            <div class="col text-center text-info">
                <h4 class="p-2"> {{ config('app.name') }} </h4>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header bg-primary text-white"> {{ __('Forgot Password') }} </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        {{ __('It was not possible to send the email. Try again') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>               
                @endif

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="form-group">
                        <label for="email"> {{ __('Email') }} </label>
                        <input id="email" type="email" name="email" class="@error('email') is-invalid @enderror form-control" value="{{ old('email', $request->email) }}" required autofocus>
                        @error('email')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ __($message) }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password"> {{ __('Password') }} </label>
                        <input id="password" type="password" name="password" class="@error('password') is-invalid @enderror form-control" required>
                        @error('password')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ __($message) }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="password_confirmation"> {{ __('Password Confirmation') }} </label>
                        <input id="password_confirmation" type="password" name="password_confirmation" class="@error('password_confirmation') is-invalid @enderror form-control" required>
                        @error('password_confirmation')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ __($message) }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @enderror
                    </div>
                    <br>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-block mx-auto">
                            {{ __('Reset Password') }}
                        </button>
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
