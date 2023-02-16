@extends('layouts.back')

<?php 
    $r = Route::current()->getAction(); 
    $route = (isset($r['as'])) ? $r['as'] : '';
?>

@section('title') @lang('Edit user') @endsection

@section('content')

<div class="section-header">
    <h1>@lang('Edit user')</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('Dashboard')</a></div>
        <div class="breadcrumb-item active"><a href="{{ route('admin.users.index') }}">@lang('Users management')</a></div>
        <div class="breadcrumb-item">@lang('Edit user')</div>
    </div>
</div>

<div class="section-body">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="card">
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="needs-validation" novalidate="">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <h2 class="section-title">@lang('Edit user')</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="text"><strong>@lang('Name') :</strong> <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-solid @error('name') is-invalid @enderror" 
                                name="name" placeholder="@lang('Enter your name')" value="{{ $user->name }}" required>
                            @error('name')
                                <span class="form-text text-muted" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="text"><strong>@lang('Last name') :</strong> <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-solid @error('last_name') is-invalid @enderror" 
                                name="last_name" placeholder="@lang('Enter your last name')" value="{{ $user->last_name }}" required>
                            @error('last_name')
                                <span class="form-text text-muted" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="text"><strong>@lang('Email') :</strong> <span class="text-danger">*</span></label>
                            <input type="email" class="form-control form-control-solid @error('email') is-invalid @enderror" 
                                name="email" placeholder="@lang('Enter your email')" value="{{ $user->email }}" required>
                            @error('email')
                                <span class="form-text text-muted" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="text"><strong>@lang('Phone number') :</strong> <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control form-control-solid @error('phone_number') is-invalid @enderror" 
                                name="phone_number" placeholder="@lang('Enter your phone number')" value="{{ $user->phone_number }}" required>
                            @error('phone_number')
                                <span class="form-text text-muted" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        @if ($route == 'admin.users.create')
                        <div class="form-group">
                            <label class="text"><strong>@lang('Password') :</strong> <span class="text-danger">*</span></label>
                            <input type="password" class="form-control form-control-solid @error('password') is-invalid @enderror" 
                                name="password" placeholder="@lang('Enter your password')" required>
                            @error('password')
                                <span class="form-text text-muted" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="text"><strong>@lang('Confirm Password') :</strong> <span class="text-danger">*</span></label>
                            <input type="password" class="form-control form-control-solid @error('confirm-password') is-invalid @enderror" 
                                name="confirm-password" placeholder="@lang('Confirm your password')" required>
                            @error('confirm-password')
                                <span class="form-text text-muted" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        @endif

                        <div class="form-group">
                            <label class="text" for="roles"><strong>@lang('Role') :</strong> <span class="text-danger">*</span></label>
                            
                            <select class="form-control select2 @error('roles[]') is-invalid @enderror" id="roles" name="roles[]" multiple="multiple" required>
                                @foreach ($roles as $id => $roles)
                                    <option value="{{ $id }}" @isset($roles) @if(in_array($id,$user->roles()->pluck('name')->toArray())) selected @endif @endisset>{{ $roles }}</option>
                                @endforeach
                            </select>
                            @error('roles[]')
                                <span class="form-text text-muted" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                    </div>

                    <div class="card-footer text-right">
                        <a class="btn btn-danger" href="{{ route('admin.users.index') }}"> @lang('Back')</a>
                        <button class="btn btn-primary">@lang('Submit')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection