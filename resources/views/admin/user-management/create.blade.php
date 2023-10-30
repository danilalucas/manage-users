@extends('layouts.bootstrap.app')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="p-2"> {{ __('New user') }} </h4>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            @if (session('error'))
                <div class="col-sm-12">
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ session('error') }}
                    </div>
                </div>
            @endif

            <div class="card">
                <div class="card-header bg-primary text-white"> 
                    {{ __('Create new user') }} 
                </div>
    
                <div class="card-body">
                    <form method="post" action="{{ route('user-management.store') }}" id="user_store">
                        @csrf
                        @include('admin.user-management._partials.form', ['action' => 'create'])
                    </form>               
                </div>

                <div class="col-12 card-footer">
                    <button type="submit" class="btn btn-success btn-sm" form="user_store">
                        {{ __('Create new user') }}
                    </button>
                    <a href="{{ route('user-management.index') }}" class="btn btn-secondary btn-sm">
                        {{ __('Cancel') }}
                    </a>
                </div>  
            </div>
            
        </div>
    </section>

@endsection