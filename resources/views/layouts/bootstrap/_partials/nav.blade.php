<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">

    <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name') }}</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}"> {{ __('Home') }} </a>
            </li>
            @if (auth()->user()->hasRole('admin'))        
                <li class="nav-item dropdown {{ request()->routeIs('user-management.index', 'user-management.create') ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ __('User Management') }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('user-management.index') }}">
                            {{ __('List Users') }}
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('user-management.create') }}">
                            {{ __('Add New User') }}
                        </a>
                    </div>
                </li>
            @endif
        </ul>

        <div class="dropdown">
            <button class="btn btn-sm btn-light rounded-pill dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                {{ auth()->user()->name }}
            </button>
            <div class="dropdown-menu dropdown-menu-lg-right">
                <a class="dropdown-item" href="javascript:document.getElementById('form_logout').submit();">
                    <form class="form-inline" action="{{ route('logout') }}" method="POST" id="form_logout">
                        @csrf
                            {{ __('Logout') }}
                    </form>
                </a>
            </div>
        </div>

    </div>

</nav>