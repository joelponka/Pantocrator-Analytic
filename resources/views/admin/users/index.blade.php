@extends('layouts.back')

@section('title') @lang('Users management') @endsection

@section('content')

<div class="section-header">
    <h1>@lang('Users management')</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">@lang('Dashboard')</a></div>
      <div class="breadcrumb-item">@lang('Users management')</div>
    </div>
</div>

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>@lang('Users list')</h4>
                    <div class="pull-right">
                        @can('users-manage')
                            <a class="btn btn-success" href="{{ route('admin.users.create') }}"> @lang('New user')</a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>                                 
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>@lang('Image')</th>
                                    <th>@lang('Name')</th>
                                    <th>@lang('Last name')</th>
                                    <th>@lang('Email')</th>
                                    <th>@lang('Phone number')</th>
                                    <th>@lang('Roles')</th>
                                    @can('users-manage')
                                    <th>@lang('Action')</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>     
                                @foreach ($users as $key => $user)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td><img src="{{ asset('storage/users/images/'. $user->avatar) }}" height="35px" width="35px" alt="image"></td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->last_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone_number }}</td>
                                        <td>
                                            @if(!empty($user->getRoleNames()))
                                                @foreach($user->getRoleNames() as $v)
                                                    <span class="badge rounded-pill bg-dark text-light">{{ $v }}</span>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                                @can('users-manage')
                                                <a class="btn btn-primary" href="{{ route('admin.users.edit',$user->id) }}"><i class="fas fa-edit"></i></a>
                                                @endcan
                                                @csrf
                                                @method('DELETE')
                                                @can('users-manage')
                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                @endcan
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection