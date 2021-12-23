@extends('admin.layouts.app')

@section('content')
<div class="section-header">
    <h1>Dashboard</h1>
</div>
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Admin</h4>
                </div>
                <div class="card-body">
                    1
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="fas fa-code"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Skills</h4>
                </div>
                <div class="card-body">
                    {{$totalSkills}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="fas fa-tasks"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Projects</h4>
                </div>
                <div class="card-body">
                    {{$totalProjects}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-info">
                <i class="fas fa-inbox"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Messages</h4>
                </div>
                <div class="card-body">
                    {{$totalMessages}}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4>About Me</h4>
            </div>
            <div class="card-body">
                <div class="row d-flex justify-content-center mb-3">
                    <img src="{{ asset('img/uploads/abouts/'. $about->image) }}" class="position-relative z-index-2 rounded-circle shadow" width="150" height="150" alt="profile-image">
                </div>
                <div class="row d-flex justify-content-center">
                    <h3 class="mb-3">{{$about->name}}</h3>
                </div>
                <div class="row d-flex justify-content-center">
                    <p class="text-lg mb-0""> 
                    {{$about->desc}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class=" col-lg-6 col-md-6 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Projects</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Link</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($projects as $index => $project)
                                        <tr>
                                            <td>
                                                {{$project->name}}
                                            </td>
                                            <td>
                                                {{$project->desc}}
                                            </td>
                                            <td>
                                                <a href="{{$project->link}}" class="font-weight-600">{{$project->name}}</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class=" col-lg-6 col-md-6 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Skills</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($skills as $index => $skill)
                                <div class="col text-center">
                                    <img src="{{ asset('img/uploads/skills/'. $skill->image) }}" class="position-relative z-index-2 mt-3" width="100" height="100" alt="profile-image">
                                    <div class="mt-2 font-weight-bold">{{$skill->name}}</div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-6 col-md-6 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="d-inline">Messages</h4>
                            <div class="card-header-action">
                                <a href="#" class="btn btn-primary">View All</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-border">
                                @foreach($message as $m)
                                <li class="media">
                                    <div class="media-body">
                                        <div class="badge badge-pill badge-danger mb-1 float-right">Unread</div>
                                        <h6 class="media-title"><a href="#">{{$m->name}}</a></h6>
                                        <div class="text-small text-muted">{{$m->subject}}</div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endsection