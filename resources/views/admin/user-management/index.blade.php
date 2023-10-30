@extends('layouts.bootstrap.app')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="p-2"> {{ __('List of users') }} </h4>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="d-flex bd-highlight">

                <div class="p-2 flex-grow-1 bd-highlight">
                    <form method="get" action="{{ route('user-management.index') }}">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="search" class="form-control" name="name" 
                                    placeholder="{{ __('enter user name') }}" value="{{ $search['name'] ?? '' }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="p-2 bd-highlight">
                    <div class="form-group">
                    <div class="input-group justify-content-center">
                        <a class="btn btn-success" href="{{ route('user-management.create'); }}">
                            <i class="fas fa-plus"></i>
                            {{ __('New user') }}
                        </a>
                    </div>
                    </div>
                </div>

            </div>  
        </div>
    </section>

    @if (session('success'))
        <div class="col-sm-12">
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="col-sm-12">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session('error') }}
            </div>
        </div>
    @endif

    <section class="content">
        <div class="container-fluid">
            <div class="card">

                <div class="card-header bg-primary text-white"> 
                    {{ __('List of registered records') }} 
                </div>
    
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: calc(10% - 150px);"> {{ __('Id') }} </th>
                                <th style="width: calc(25% - 150px);"> {{ __('Name') }} </th>
                                <th style="width: calc(45% - 150px);"> {{ __('Email') }} </th>
                                <th style="width: calc(20% - 150px);"> {{ __('User Access') }} </th>
                                <th style="min-width: 150px;"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="align-middle">
                                        {{ $user->id ?? "" }}
                                    </td>
                                    <td class="text-break align-middle">
                                        {{ $user->name ?? "" }}
                                    </td>
                                    <td class="text-break align-middle">
                                        {{ $user->email ?? "" }}
                                    </td>
                                    <td class="align-middle">
                                        @foreach ($user->roles as $role)
                                            {{ __($role->name ?? "") }}
                                        @endforeach
                                    </td>
                                    <td class="project-actions text-right text-break align-middle">
                                        <a class="btn btn-primary btn-sm" href="{{ route('user-management.edit', ['id' => $user->id]); }}">
                                            <i class="fas fa-pencil-alt"></i>
                                            {{ __('Edit') }}
                                        </a>
                                        <a class="btn btn-danger btn-sm text-white" data-toggle="modal" data-target="#modal{{ $user->id; }}">
                                            <i class="fas fa-trash"></i>
                                            {{ __('Delete') }}
                                        </a>
                                    </td>
                                </tr> 
                            @endforeach
                        </tbody>
                    </table> 
                </div>

            </div>
        </div>
    </section>

@endsection

@push('modals')
    @foreach ($users as $user)
        <div class="modal fade" id="modal{{ $user->id; }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle"> {{ __('Are you sure you want to delete the user?') }} </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        {{ $user->id . ' - ' . $user->name; }}
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-info" data-dismiss="modal">
                            {{ __('No') }}
                        </button>
                        <form action="{{ route('user-management.delete', ['id' => $user->id]); }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">
                                {{ __('Delete') }}
                            </button>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    @endforeach
@endpush