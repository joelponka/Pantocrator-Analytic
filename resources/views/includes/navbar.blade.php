<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
        </ul>
        <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
            <div class="search-result">
                <div class="search-item">
                    <a href="#">
                        <div class="search-icon bg-primary text-white mr-3">
                            <i class="fas fa-laptop"></i>
                        </div>
                        @lang('Create a new Homepage Design')
                    </a>
                </div>
            </div>
        </div>
    </form>
    <ul class="navbar-nav navbar-right">
        
        @php $locale = app()->getLocale(); @endphp
        <li class="dropdown">
            @if ($locale == 'en')
                <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user"> 
                    <img alt="image" src="{{ asset('assets/modules/flag-icon-css/flags/4x3/us.svg') }}"
                        class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span>
                </a>
            @elseif($locale == 'fr')
                <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user"> 
                    <img alt="image" src="{{ asset('assets/modules/flag-icon-css/flags/4x3/gp.svg') }}"
                        class="user-img-radious-style">  <span class="d-sm-none d-lg-inline-block"></span>
                </a>
            @else
                <img alt="image" src="{{ asset('assets/modules/flag-icon-css/flags/4x3/us.svg') }}"
                    class="user-img-radious-style">
            @endif

            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-item has-icon">
                <a rel="alternate" href="{{ route('langue',['locale' => 'en']) }}"> <img alt="image" src="{{ asset('assets/modules/flag-icon-css/flags/4x3/us.svg') }}"
                    class="user-img-radious-style" height="25px" width="25px"> @lang('English')</a> <br>
                <a rel="alternate" href="{{ route('langue',['locale' => 'fr']) }}"><img alt="image" src="{{ asset('assets/modules/flag-icon-css/flags/4x3/gp.svg') }}"
                    class="user-img-radious-style" height="25px" width="25px"> @lang('Français')</a>
              </div>
            </div>
        </li>

        {{-- @include('includes.notifications') --}}

        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ asset('storage/users/images/'. Auth::user()->avatar) }}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->name }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">@lang('Hi'), {{ Auth::user()->name }}</div>
                <a href="{{ route('admin.dashboard') }}" class="dropdown-item has-icon">
                    <i class="fas fa-tachometer-alt"></i> @lang('Back to home') 
                </a>
                <a href="{{ route('profile.edit') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> @lang('Profile') 
                </a>
                <div class="dropdown-divider"></div>
                <!-- Authentication -->
                <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> @lang('Log Out')
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>