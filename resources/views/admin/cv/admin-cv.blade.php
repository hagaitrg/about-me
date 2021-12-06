@extends('admin.layouts.app')

@section('content')
<div class="section-header">
    <h1>Curriculum Vitae
    </h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin-home') }}">Dashboard</a></div>
        <div class="breadcrumb-item">My CV</div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>My CV</h4>
                <div class="card-header-form">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <div class="input-group-btn">
                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <a href="{{ route('add-cv') }}" class="btn btn-icon icon-left btn-success mb-3"><i class="fas fa-plus"></i> Add Data</a>
                <div class="table-responsive">
                    <table class="table table-striped mb-0" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Name</th>
                                <th>File</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cvs as $index => $cv)
                            <tr>
                                <td class="text-center">
                                    {{$index+1}}
                                </td>
                                <td>{{$cv->name}}</td>
                                <td>
                                    {{$cv->file}}
                                </td>
                                <td>
                                    <form action="/admin/cv/delete-cv/{{$cv->id}}" method="POST">
                                        @CSRF
                                        @method('delete')
                                        <a class="btn btn-primary btn-action mr-1" href="/admin/cv/edit-cv/{{$cv->id}}" role="button"><i class="fas fa-pencil-alt"></i></a>
                                        <button class="btn btn-danger btn-action" type="submit"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection