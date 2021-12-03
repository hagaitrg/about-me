@extends('admin.layouts.app')

@section('content')
<div class="section-header">
    <h1>About Me</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin-home') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ route('admin-about') }}">About Me</a></div>
        <div class="breadcrumb-item">Add About</div>
    </div>
</div>
<div class="row d-flex justify-content-center">
    <div class="col-12 col-md-12 col-lg-6">
        <div class="card">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form enctype="multipart/form-data" method="POST" action="/admin/about/store-about">
                @CSRF
                <div class="card-header">
                    <h4>Add About Me</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" style="height: 100px;" name="desc"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-phone"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control phone-number" name="phone">
                        </div>
                        <div class="form-group">
                            <label>Link</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fab fa-linkedin"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control phone-number" name="link">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="img">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                        <a href="{{ route('admin-about') }}" class="btn btn-secondary">Back</a>
                    </div>
            </form>
        </div>

    </div>
</div>
@endsection