@extends('layouts.back')

@section('title') @lang('Create new role') @endsection

@section('content')

<div class="section-header">
    <h1>@lang('New role')</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('Dashboard')</a></div>
        <div class="breadcrumb-item active"><a href="{{ route('admin.roles.index') }}">@lang('Role management')</a></div>
        <div class="breadcrumb-item">@lang('New role')</div>
    </div>
</div>

<div class="section-body">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="card">
                <form action="{{ route('admin.roles.store') }}" method="POST" class="needs-validation" novalidate="">
                    @csrf
                    <div class="card-header">
                        <h2 class="section-title">@lang('Add new role')</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="text"><strong>@lang('Name') :</strong> <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-solid @error('name') is-invalid @enderror" 
                                name="name" placeholder="@lang('Enter a role name')" required>
                            @error('name')
                                <span class="form-text text-muted" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="text" for="permission"><strong>@lang('Permission') :</strong> <span class="text-danger">*</span></label>
                            
                            <select class="form-control select2" id="permission" name="permission[]" multiple="multiple" required>
                                @foreach ($permission as $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                            @error('permissions[]')
                                <span class="form-text text-muted" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a class="btn btn-danger" href="{{ route('admin.roles.index') }}"> @lang('Back')</a>
                        <button class="btn btn-primary">@lang('Submit')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection