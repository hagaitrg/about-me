@extends('admin.layouts.app')

@section('content')
<div class="section-header">
    <h1>Profile</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin-home') }}">Dashboard</a></div>
        <div class="breadcrumb-item">Profile</div>
    </div>
</div>
<div class="section-body">
    <h2 class="section-title">{{ $about->name }}</h2>
    <p class="section-lead">
        Change information about yourself on this page.
    </p>

    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-5">
            <div class="card profile-widget">
                <div class="profile-widget-header">
                    <img alt="image" src="{{ asset('img/uploads/abouts/'. $about->image) }}" class="rounded-circle profile-widget-picture">
                </div>
                <div class="profile-widget-description">
                    <div class="profile-widget-name">{{ $about->name }}
                        <div class="text-muted d-inline font-weight-normal">
                            <div class="slash"></div>{{ $about->phone }}
                        </div>
                    </div>
                    {{ $about->desc }}
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-7">
            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            @if($errors)
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
            @endif
            <div class="card">
                <form method="POST" class="needs-validation" action="{{ route('change-profile') }}">
                    @CSRF
                    <div class="card-header">
                        <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-12 col-12">
                                <label>Name</label>
                                <input type="text" class="form-control" value="{{ $profile->name }}" name="name" required>
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12 col-12">
                                <label>Email</label>
                                <input type="email" class="form-control" value="{{ $profile->email }}" name="email" required>
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12 col-12">
                                <label>Old Password</label>
                                <input type="password" class="form-control" name="old_password">
                                @if ($errors->has('old_password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('old_password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>New Passowrd</label>
                                <input type="password" class="form-control" name="new_password">
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" name="confirm_password">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary" type="submit">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection