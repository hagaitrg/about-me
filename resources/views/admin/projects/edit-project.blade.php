@extends('admin.layouts.app')

@section('content')
<div class="section-header">
    <h1>Projects</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin-home') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ route('admin-project') }}">My Projects</a></div>
        <div class="breadcrumb-item">Edit Project</div>
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
            <form enctype="multipart/form-data" method="POST" action="/admin/project/update-project/{{$project->id}}">
                @CSRF
                @method('patch')
                <div class="card-header">
                    <h4>Edit My Project</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{$project->name}}">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" style="height: 100px;" name="desc" value="{{$project->desc}}">{{$project->desc}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Link</label>
                        <input type="text" class="form-control" name="link" value="{{$project->link}}">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="img">
                            <label class="custom-file-label" for="customFile">{{$project->image}}</label>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                        <a href="{{ route('admin-project') }}" class="btn btn-secondary">Back</a>
                    </div>
            </form>
        </div>

    </div>
</div>
@endsection