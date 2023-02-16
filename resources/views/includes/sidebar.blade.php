<?php $r = \Route::current()->getAction() ?>
<?php $route = (isset($r['as'])) ? $r['as'] : ''; ?>

<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ route('admin.dashboard') }}">{{ __('Pantocrator Analytics') }}</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{ route('admin.dashboard') }}">PA</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">@lang('Dashboard')</li>

      <li class="@if(request()->routeIs('admin.dashboard')) active @endif"> 
        <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>@lang('Dashboard')</span></a>
      </li>

      <li class="menu-header">@lang('Pages')</li>
      @can('users-manage')
      <li class="@if(Str::startsWith($route, 'admin.users')) active @endif dropdown">
        <a href="{{ route('admin.users.index') }}" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>@lang('Users')</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{ route('admin.users.index') }}">@lang('Users list')</a></li>
          <li><a class="nav-link" href="{{ route('admin.users.create') }}">@lang('Add user')</a></li>
        </ul>
      </li>

      <li class="@if(Str::startsWith($route, 'admin.roles')) active @endif dropdown">
        <a href="{{ route('admin.roles.index') }}" class="nav-link has-dropdown"><i class="fas fa-columns"></i> <span>@lang('Roles')</span></a>
        <ul class="dropdown-menu">
          <li><a href="{{ route('admin.roles.index') }}">@lang('Role list')</a></li> 
          <li><a href="{{ route('admin.roles.create') }}">@lang('Add role')</a></li> 
        </ul>
      </li>
      {{-- <li class="@if(Str::startsWith($route, 'admin.contacts')) active @endif"><a class="nav-link" href="{{ route('admin.contacts.index') }}"><i class="far fa-envelope"></i> <span>@lang('Contacts')</span></a></li>
      <li class="@if(Str::startsWith($route, 'admin.quotes')) active @endif"><a class="nav-link" href="{{ route('admin.quotes.index') }}"><i class="fas fa-pencil-ruler"></i> <span>@lang('Estimate')</span></a></li> --}}
      @endcan
    </ul>       
  </aside>
</div>