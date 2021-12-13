@extends('main.layouts.app')

@section('content')
<div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6 mb-4">

    <section class="py-sm-7 py-5 position-relative" id="about">
        <div class="container">
            <div class="row">
                <div class="col-12 mx-auto">
                    <div class="mt-n8 mt-md-n9 text-center">
                        <img class="avatar avatar-xxl shadow-xl position-relative z-index-2" src="{{ asset('img/uploads/abouts/'. $abouts->image) }}" alt="bruce" loading="lazy">
                    </div>
                    <div class="row py-5">
                        <div class="col-lg-7 col-md-7 z-index-2 position-relative px-md-2 px-sm-5 mx-auto">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h3 class="mb-0">{{$abouts->name}}</h3>
                                <div class="d-block">
                                    <a href="" class="btn btn-sm btn-outline-info text-nowrap mb-0"><i class="material-icons opacity-6 text-md">file_download</i> My CV</a>
                                </div>
                            </div>
                            <p class="text-lg mb-0">
                                {{$abouts->desc}} <br><a href="{{$abouts->link}}" target="_blank" class="text-info icon-move-right">More about me
                                    <i class="fas fa-arrow-right text-sm ms-1"></i>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END Testimonials w/ user image & text & info -->
    <section class="pb-5 position-relative bg-gradient-dark mx-n3" id="skills">
        <div class="container">
            <div class="row">
                <div class="col-md-8 text-start mb-5 mt-5">
                    <h3 class="text-white z-index-1 position-relative">Skills</h3>
                    <p class="text-white opacity-8 mb-0">I Loved to learning new and interesting things everyday. That’s my
                        skill.</p>
                </div>
            </div>
            <div class="row">
                @foreach($skills as $skill)
                <h4 class="mb-3 text-light">{{$skill->tag->name}}</h4>
                <div class="col-lg-3 col-12 mb-3">
                    <div class="card card-profile">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-3">
                                <a href="{{$skill->link}}" target="_blank">
                                    <div class="p-3 pe-md-0">
                                        <img class="border-radius-md" src="{{ asset('img/uploads/skills/'. $skill->image) }}" width="50" height="50" alt="image">
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-9 col-md-9 col-9 my-auto">
                                <div class="card-body ps-lg-0">
                                    <h5 class="mb-0">{{$skill->name}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
                <h4 class="mb-3 mt-5 text-light">Framework</h4>
                <div class="col-lg-3 col-12 mb-3">
                    <div class="card card-profile">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-3">
                                <a href="https://getbootstrap.com/" target="_blank">
                                    <div class="p-3 pe-md-0">
                                        <img class="border-radius-md" src="{{ asset('img/bootstrap.png') }}" width="50" height="50" alt="image">
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-9 col-md-9 col-9 my-auto">
                                <div class="card-body ps-lg-0">
                                    <h5 class="mb-0">Bootstrap</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-12 mb-3">
                    <div class="card card-profile">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-3">
                                <a href="https://laravel.com/" target="_blank">
                                    <div class="p-3 pe-md-0">
                                        <img class=" border-radius-md" src="{{ asset('img/laravel.png') }}" width="50" height="50" alt="image">
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-9 col-md-9 col-9 my-auto">
                                <div class="card-body ps-lg-0">
                                    <h5 class="mb-0">Laravel</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-12 mb-3">
                    <div class="card card-profile">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-3">
                                <a href="https://expressjs.com/" target="_blank">
                                    <div class="p-3 pe-md-0">
                                        <img class=" border-radius-md" src="{{ asset('img/expressjs.png') }}" width="50" height="50" alt="image">
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-9 col-md-9 col-9 my-auto">
                                <div class="card-body ps-lg-0">
                                    <h5 class="mb-0">Express JS</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <h4 class="mb-3 mt-5 text-light">Database</h4>
                <div class="col-lg-3 col-12 mb-3">
                    <div class="card card-profile">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-3">
                                <a href="https://www.mysql.com/" target="_blank">
                                    <div class="p-3 pe-md-0">
                                        <img class="border-radius-md" src="{{ asset('img/mysql.png') }}" width="50" height="50" alt="image">
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-9 col-md-9 col-9 my-auto">
                                <div class="card-body ps-lg-0">
                                    <h5 class="mb-0">MySQL</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-12 mb-3">
                    <div class="card card-profile">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-3">
                                <a href="https://www.mongodb.com/" target="_blank">
                                    <div class="p-3 pe-md-0">
                                        <img class=" border-radius-md" src="{{ asset('img/mongodb.png') }}" width="50" height="50" alt="image">
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-9 col-md-9 col-9 my-auto">
                                <div class="card-body ps-lg-0">
                                    <h5 class="mb-0">Mongo DB</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <h4 class="mb-3 mt-5 text-light">Version Control System</h4>
                <div class="col-lg-3 col-12 mb-3">
                    <div class="card card-profile">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-3">
                                <a href="https://git-scm.com/" target="_blank">
                                    <div class="p-3 pe-md-0">
                                        <img class="border-radius-md" src="{{ asset('img/git.png') }}" width="50" height="50" alt="image">
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-9 col-md-9 col-9 my-auto">
                                <div class="card-body ps-lg-0">
                                    <h5 class="mb-0">Git</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-12 mb-3">
                    <div class="card card-profile">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-3">
                                <a href="https://github.com/" target="_blank">
                                    <div class="p-3 pe-md-0">
                                        <img class=" border-radius-md" src="{{ asset('img/github.png') }}" width="50" height="50" alt="image">
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-9 col-md-9 col-9 my-auto">
                                <div class="card-body ps-lg-0">
                                    <h5 class="mb-0">Github</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- START Blogs w/ 4 cards w/ image & text & link -->
    <section class="py-3" id="projects">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="mb-5">My Projects</h3>
                </div>
            </div>
            <div class="row">
                @foreach($projects as $index => $project)
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card card-plain">
                        <div class="card-header p-0 position-relative">
                            <a class="d-block blur-shadow-image">
                                <img src="{{ asset('img/uploads/projects/'. $project->image) }}" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg" width="300" height="153">
                            </a>
                        </div>
                        <div class="card-body px-0">
                            <h5 class="text-dark font-weight-bold">
                                {{$project->name}}
                            </h5>
                            <p>
                                {{$project->desc}}
                            </p>
                            <a href="{{$project->link}}" class="text-info text-sm icon-move-right" target="_blank">Read More
                                <i class="fas fa-arrow-right text-xs ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- END Blogs w/ 4 cards w/ image & text & link -->
</div>
<section class="py-lg-5" id="contact">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card box-shadow-xl overflow-hidden mb-5">
                    <div class="row">
                        <div class="col-lg-5 position-relative bg-cover px-0" style="background-image: url({{asset('img/me2.jpg')}})" loading="lazy">
                            <div class="z-index-2 text-center d-flex h-100 w-100 d-flex m-auto justify-content-center">
                                <div class="mask bg-gradient-dark opacity-8"></div>
                                <div class="p-5 ps-sm-8 position-relative text-start my-auto z-index-2">
                                    <h3 class="text-white">Contact Information</h3>
                                    <p class="text-white opacity-8 mb-4">Fill up the form and i will get back to you within 24
                                        hours.</p>
                                    <div class="d-flex p-2 text-white">
                                        <div>
                                            <i class="fab fa-whatsapp text-sm"></i>
                                        </div>
                                        <div class="ps-3">
                                            <span class="text-sm opacity-8">(+62) 822 9316 2500</span>
                                        </div>
                                    </div>
                                    <div class="d-flex p-2 text-white">
                                        <div>
                                            <i class="fas fa-envelope text-sm"></i>
                                        </div>
                                        <div class="ps-3">
                                            <span class="text-sm opacity-8">disahagait@gmail.com</span>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <a href="https://www.facebook.com/disatarigan/" class="btn btn-icon-only btn-link text-white btn-lg mb-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Log in with Facebook" target="_blank">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                        <a href="https://www.linkedin.com/in/disa-h-5b6436141/" class="btn btn-icon-only btn-link text-white btn-lg mb-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Log in with Linkedin" target="_blank">
                                            <i class="fab fa-linkedin"></i>
                                        </a>
                                        <a href="https://github.com/hagaitrg" class="btn btn-icon-only btn-link text-white btn-lg mb-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Log in with Github" target="_blank">
                                            <i class="fab fa-github"></i>
                                        </a>
                                        <a href="https://www.instagram.com/hagaitrg/" class="btn btn-icon-only btn-link text-white btn-lg mb-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Log in with Instagram" target="_blank">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <form class="p-3" id="contact-form" method="post">
                                <div class="card-header px-4 py-sm-5 py-3">
                                    <h2>Wanna Hire Me ?</h2>
                                    <p class="lead"> I'd like to talk with you.</p>
                                </div>
                                <div class="card-body pt-1">
                                    <div class="row">
                                        <div class="col-md-12 pe-2 mb-3">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Name</label>
                                                <input type="text" class="form-control" placeholder="Full Name">
                                            </div>
                                        </div>
                                        <div class="col-md-12 pe-2 mb-3">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Subject</label>
                                                <input type="text" class="form-control" placeholder="My Subject">
                                            </div>
                                        </div>
                                        <div class="col-md-12 pe-2 mb-3">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Message</label>
                                                <textarea name="message" class="form-control" id="message" rows="6" placeholder="I want to say that..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 text-end ms-auto">
                                            <button type="submit" class="btn bg-gradient-info mb-0">Send Message</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection