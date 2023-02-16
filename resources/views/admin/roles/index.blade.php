@extends('layouts.back')

@section('title') @lang('Roles and Permissions') @endsection

@section('content')

    <div class="section-header">
        <h1>@lang('Role management')</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">@lang('Dashboard')</a></div>
            <div class="breadcrumb-item">@lang('Role management')</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>@lang('Role list')</h4>
                        <div class="pull-right">
                            @can('users-manage')
                                <a class="btn btn-success" href="{{ route('admin.roles.create') }}"> @lang('New role')</a>
                            @endcan
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>                                 
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>@lang('Name')</th>
                                        <th>@lang('Action')</th>
                                    </tr>
                                </thead>
                                <tbody>     
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>
                                                <form action="{{ route('admin.roles.destroy',$role->id) }}" method="POST">
                                                    @can('users-manage')
                                                    <a class="btn btn-primary" href="{{ route('admin.roles.edit',$role->id) }}"><i class="fas fa-edit"></i></a>
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