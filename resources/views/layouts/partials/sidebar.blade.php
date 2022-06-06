<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header" style="height: 140px">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto text-center">
                <a class="navbar-brand" href="{{url('/')}}">
                    <img src="https://iesleopoldoalasclarin.com/wp-content/uploads/2020/01/layout_set_logo.jpg" style="max-height: 100px" alt="">
{{--                    <h2 class="brand-text">Vuexy</h2>--}}
                </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pe-0" data-toggle="collapse">
                    <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                    <i class="d-none d-xl-block collapse-toggle-icon font-medium-4 text-primary" data-feather="disc" data-ticon="disc"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item @if (Request::url() == route('dashboard.index')) active @endif">
                <a href="{{ route('dashboard.index') }}" class="d-flex align-items-center" target="_self">
                    <i data-feather="home"></i>
                    <span class="menu-title text-truncate">Dashboard</span>
                </a>
            </li>
            <li class="navigation-header">
                <span>{{ __('Modules') }}</span>
                <i data-feather="more-horizontal"></i>
            </li>

            @can('view users')
            <li class="nav-item  ">
                <a href="javascript:void(0)" class="d-flex align-items-center" target="_self">
                    <i data-feather="user"></i>
                    <span class="menu-title text-truncate">{{ __('Users') }}</span>
                </a>
                <ul class="menu-content">
                    <li class="@if (Request::url() == route('users.index')) active @endif">
                        <a href="{{ route('users.index') }}" class="d-flex align-items-center" target="_self">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate">{{ __('List') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endcan

            @can('view students')
            <li class="nav-item  ">
                <a href="javascript:void(0)" class="d-flex align-items-center" target="_self">
                    <i data-feather='users'></i>
                    <span class="menu-title text-truncate">{{ __('Students') }}</span>
                </a>
                <ul class="menu-content">
                    <li class="@if (Request::url() == route('students.index')) active @endif">
                        <a href="{{ route('students.index') }}" class="d-flex align-items-center" target="_self">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate">{{ __('List') }}</span>
                        </a>
                    </li>
                </ul>
                <ul class="menu-content">
                    <li class="@if (Request::url() == route('students.import')) active @endif">
                        <a href="{{ route('students.import') }}" class="d-flex align-items-center" target="_self">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate">{{ __('Import') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endcan

            @can('view courses')
            <li class="nav-item  ">
                <a href="javascript:void(0)" class="d-flex align-items-center" target="_self">
                    <i data-feather="file-text"></i>
                    <span class="menu-title text-truncate">{{ __('Courses') }}</span>
                </a>
                <ul class="menu-content">
                    <li class="@if (Request::url() == route('courses.index')) active @endif">
                        <a href="{{ route('courses.index') }}" class="d-flex align-items-center" target="_self">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate">{{ __('List') }}</span>
                        </a>
                    </li>
                    <li class="@if (Request::url() == route('courses.create')) active @endif">
                        <a href="{{ route('courses.create') }}" class="d-flex align-items-center" target="_self">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate">{{ __('Create') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endcan

            @can('create enrollment')
                <li class="nav-item @if (Request::url() == route('enrollment.create')) active @endif">
                    <a href="{{ route('enrollment.create') }}" class="d-flex align-items-center" target="_self">
                        <i data-feather="file-text"></i>
                        <span class="menu-title text-truncate">{{ __('Enrollment') }}</span>
                    </a>
                </li>
            @endcan

            @can('view enrollments')
                <li class="navigation-header">
                    <span>{{ __('Modules') }}</span>
                    <i data-feather="more-horizontal"></i>
                </li>

                <li class="nav-item @if (Request::url() == route('enrollments.index')) active @endif">
                    <a href="{{ route('enrollments.index') }}" class="d-flex align-items-center" target="_self">
                        <i data-feather="file-text"></i>
                        <span class="menu-title text-truncate">{{ __('Enrollments') }}</span>
                    </a>
                </li>
            @endcan

            @can('edit settings')
            <li class="nav-item @if (Request::url() == route('settings.index')) active @endif">
                <a href="{{ route('settings.index') }}" class="d-flex align-items-center" target="_self">
                    <i data-feather="file-text"></i>
                    <span class="menu-title text-truncate">{{ __('Settings') }}</span>
                </a>
            </li>
            @endcan
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
