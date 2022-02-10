<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow  container-xxl">
    <div class="navbar-container d-flex content">
        <ul class="nav navbar-nav align-items-center ms-auto">
            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);"
                   data-bs-toggle="dropdown" aria-haspopup="true">
                    <div class="user-nav d-sm-flex d-none">
                        <span class="user-name fw-bolder">
                        {{ auth()->user()->name }}
                        </span>
                        <span class="user-status">{{ __(auth()->user()->role) }}</span>
                    </div>
                    <span class="avatar">
                        <img class="round"
                             src="{{ asset('images/avatars/user.png') }}"
                             alt="{{ auth()->user()->name }}"
                             height="40"
                             width="40"
                        >
                        <span class="avatar-status-online"></span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                    <h6 class="dropdown-header">{{ __('Manage profile') }}</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ Route::has('profile.show') ? route('profile.show') : 'javascript:void(0)' }}">
                        <i class="me-50" data-feather="user"></i> {{ __('Profile') }}
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="me-50" data-feather="power"></i> {{ __('Logout') }}
                    </a>
                    <form method="POST" id="logout-form" action="{{ route('logout') }}">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
