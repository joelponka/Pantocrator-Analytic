@extends('layouts.back')

@section('title') @lang('Edit role') @endsection

@section('content')

<div class="section-header">
    <h1>@lang('Edit role')</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('Dashboard')</a></div>
        <div class="breadcrumb-item active"><a href="{{ route('admin.roles.index') }}">@lang('Role management')</a></div>
        <div class="breadcrumb-item">@lang('Edit role')</div>
    </div>
</div>

<div class="section-body">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="card">
                <form action="{{ route('admin.roles.update', $role->id) }}" method="POST" class="needs-validation" novalidate="">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <h2 class="section-title">@lang('Add new role')</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="text"><strong>@lang('Name') :</strong> <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-solid @error('name') is-invalid @enderror" 
                                name="name" value="{{ $role->name }}" placeholder="Enter a product name" required>
                            @error('name')
                                <span class="form-text text-muted" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="text" for="permission"><strong>@lang('Permission') :</strong> <span class="text-danger">*</span></label>
                            <select multiple="multiple" class="form-control select2 @error('permission') is-invalid @enderror" name="permissions[]" id="permission" required>
                                @foreach($permissions as $id => $permissions)
                                    <option value="{{ $id }}" @isset($role) @if(in_array($id,$role->permissions->pluck('name')->toArray())) selected @endif @endisset>{{ $permissions }}</option>
                                @endforeach
                            </select>
                            @error('permission')
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