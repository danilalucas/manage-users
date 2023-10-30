<div class="mb-3">
    <label for="name" class="form-label"> {{ __('Name') }} <span class="text-danger">*</span></label>
    <input type="text" class="@error('name') is-invalid @enderror form-control"
        id="name" name="name" max="120" value="{{ old('name', $user->name ?? '') }}" required>
    @error('name')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @enderror
</div>

<div class="mb-3">
    <label for="email" class="form-label"> {{ __('Email') }} <span class="text-danger">*</span></label>
    <input type="text" class="@error('email') is-invalid @enderror form-control"
        id="email" name="email" max="120" value="{{ old('email', $user->email ?? '') }}" required>
    @error('email')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @enderror
</div>

<div class="mb-3">
    <label for="password" class="form-label"> {{ __('Password') }} @if($action == 'create') <span class="text-danger">*</span> @endif </label>
    <input type="password" class="@error('password') is-invalid @enderror form-control"
        id="password" name="password" max="120" value="" @if($action == 'create') required @endif>
    @error('password')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> 
    @enderror
</div>

<div class="mb-3">
    <label for="password_confirmation" class="form-label"> {{ __('Password Confirmation') }} @if($action == 'create') <span class="text-danger">*</span> @endif </label>
    <input type="password" class="@error('password_confirmation') is-invalid @enderror form-control"
        id="password_confirmation" name="password_confirmation" max="120" value="" @if($action == 'create') required @endif>
    @error('password_confirmation')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @enderror
</div>

@push('script_bottom')
    <script src="{{ mix('js/validations/form-user.js') }}"></script>
@endpush