@extends('admin.layouts.app')

@section('content')
<div class="section-header">
    <h1>Curriculum Vitae</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin-home') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ route('admin-cv') }}">My CV</a></div>
        <div class="breadcrumb-item">Edit CV</div>
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
            <form enctype="multipart/form-data" method="POST" action="/admin/cv/update-cv/{{$cv->id}}">
                @method('patch')
                @CSRF
                <div class="card-header">
                    <h4>Add My CV</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{$cv->name}}">
                    </div>
                    <div class="jumbotron text-center">
                        <h2>Upload CV</h2>
                        <p class="lead text-muted mt-3">upload your cv so the recruitment team can read in more detail your experience, skills, and portfolio history documents </p>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="file">
                            <label class="custom-file-label" for="customFile">{{$cv->file}}</label>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                        <a href="{{ route('admin-cv') }}" class="btn btn-secondary">Back</a>
                    </div>
            </form>
        </div>

    </div>
</div>
@endsection