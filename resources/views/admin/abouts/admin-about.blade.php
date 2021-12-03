@extends('admin.layouts.app')

@section('content')
<div class="section-header">
    <h1>About Me</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">About Me</div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>About Me Data</h4>
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
                <a href="{{ route('add-about') }}" class="btn btn-icon icon-left btn-success mb-3"><i class="fas fa-plus"></i> Add Data</a>
                <div class="table-responsive">
                    <table class="table table-striped mb-0" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Link</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($abouts as $index => $about)
                            <tr>
                                <td class="text-center">
                                    {{$index+1}}
                                </td>
                                <td>{{$about->name}}</td>
                                <td>
                                    {{$about->desc}}
                                </td>
                                <td>
                                    {{$about->email}}
                                </td>
                                <td>
                                    {{$about->phone}}
                                </td>
                                <td>
                                    <a href="{{$about->link}}" class="font-weight-600" target="_blank">{{$about->link}}</a>
                                </td>
                                <td>
                                    <form action="/admin/about/delete-about/{{$about->id}}" method="POST">
                                        @CSRF
                                        @method('delete')
                                        <a class="btn btn-primary btn-action mr-1" href="/admin/about/edit-about/{{$about->id}}" role="button"><i class="fas fa-pencil-alt"></i></a>
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