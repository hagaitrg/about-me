@extends('admin.layouts.app')

@section('content')
<div class="section-header">
    <h1>About Me</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('edit-about') }}">Dashboard</a></div>
        <div class="breadcrumb-item">About Me</div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>About Me Data</h4>
                <div class="card-header-form">
                    <a href="{{ route('edit-about') }}" class="btn btn-icon icon-left btn-warning mb-3"><i class="fas fa-pencil-alt"></i></a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped mb-0 border border-dark" width="100%" cellspacing="0">
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <td>{{$about->name ?? " " }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{$about->desc ?? " " }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{$about->email ?? " " }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>
                                    {{$about->phone ?? " " }}
                                </td>
                            </tr>
                            <tr>
                                <th>Link</th>
                                <td>{{$about->link ?? " " }}</td>
                            </tr>
                            <tr>
                                <th>Action</th>
                                <td>
                                    @if($about)
                                    <form action="/admin/about/delete-about/{{$about->id}}" method="POST">
                                        @CSRF
                                        @method('delete')
                                        <button class="btn btn-danger btn-action" type="submit"><i class="fas fa-trash"></i></button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection