@extends('layouts.back')

@section('title') @lang('Create new user') @endsection

@section('content')

<div class="section-header">
    <h1>@lang('New user')</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('Dashboard')</a></div>
        <div class="breadcrumb-item active"><a href="{{ route('admin.users.index') }}">@lang('Users management')</a></div>
        <div class="breadcrumb-item">@lang('New user')</div>
    </div>
</div>

<div class="section-body">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="card">
                <form action="{{ route('admin.users.store') }}" enctype="multipart/form-data" method="POST" class="needs-validation" novalidate="">
                    @csrf
                    <div class="card-header">
                        <h2 class="section-title">@lang('Add new user')</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="text"><strong>@lang('Avatar') :</strong></label>
                            <input type="file" class="form-control @error('avatar') is-invalid @enderror" 
                                name="avatar" accept=".png, .jpg, .jpeg">
                            @error('avatar')
                                <span class="form-text text-muted" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="text"><strong>@lang('Name') :</strong> <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-solid @error('name') is-invalid @enderror" 
                                name="name" placeholder="@lang('Enter your name')" required>
                            @error('name')
                                <span class="form-text text-muted" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="text"><strong>@lang('Last name') :</strong> <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-solid @error('last_name') is-invalid @enderror" 
                                name="last_name" placeholder="@lang('Enter your last name')" required>
                            @error('last_name')
                                <span class="form-text text-muted" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="text"><strong>@lang('Email') :</strong> <span class="text-danger">*</span></label>
                            <input type="email" class="form-control form-control-solid @error('email') is-invalid @enderror" 
                                name="email" placeholder="@lang('Enter your email')" required>
                            @error('email')
                                <span class="form-text text-muted" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="text"><strong>@lang('Phone number') :</strong> <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-solid @error('phone_number') is-invalid @enderror" 
                                name="phone_number" placeholder="@lang('Enter your phone number')" required>
                            @error('phone_number')
                                <span class="form-text text-muted" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

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

                        <div class="form-group">
                            <label class="text" for="roles"><strong>@lang('Role') :</strong> <span class="text-danger">*</span></label>
                            
                            <select class="form-control select2 @error('roles[]') is-invalid @enderror" id="roles" name="roles[]" multiple="multiple" required>
                                @foreach ($roles as $id => $roles)
                                    <option value="{{ $id }}" >{{ $roles }}</option>
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