@extends('admin.layouts.app')

@section('content')
<div class="section-header">
    <h1>My Skills</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin-home') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ route('admin-skill') }}">About Me</a></div>
        <div class="breadcrumb-item">Add Skills</div>
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
            <form enctype="multipart/form-data" method="POST" action="/admin/skill/store-skill">
                @CSRF
                <div class="card-header">
                    <h4>Add My Skills</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label>Tag</label>
                        <select class="custom-select" name="tag_id">
                            <option selected>Open this select skill tag</option>
                            <option value="1">Web Development</option>
                            <option value="2">Framework</option>
                            <option value="3">Database</option>
                            <option value="4">Version Control System</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Link</label>
                        <input type="link" class="form-control" name="link">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="img">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                        <a href="{{ route('admin-skill') }}" class="btn btn-secondary">Back</a>
                    </div>
            </form>
        </div>

    </div>
</div>
@endsection