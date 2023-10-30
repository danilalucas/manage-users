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
        
        <form class="form-inline my-2 my-lg-0" action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-info my-2 my-sm-0 rounded-pill" type="submit">
                {{ __('Logout') }}
            </button>
        </form>

    </div>

</nav>