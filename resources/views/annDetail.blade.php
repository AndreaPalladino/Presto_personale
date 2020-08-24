@extends('layouts.app')
@section('style')
    <style>
      body{
    background-color: black;
}
    </style>
@endsection
@section('content')
<div class="blog-single my-5 py-5">
    <div class="container ">
        <div class="row align-items-start">
            <div class="col-lg-8 m-15px-tb">
                <article class="article">
                    <div class="article-img">
                        <a href="" class="btn"><img src="{{$announcement->images->first()->getUrl(700,300)}}" title="" alt=""></a>
                    </div>
                    <div class="article-title">
                    
                        <h2>{{$announcement->title}}</h2>
                        <div class="media">
                            <div class="avatar">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" title="" alt="">
                            </div>
                            <div class="media-body">
                                <label>{{$announcement->user->name}}</label>
                                <span>{{$announcement->created_at->format('d/m/Y')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="article-content">
                        <p class="text-white">{{$announcement->description}}</p>
                        
                        <div>
                            <h3 class="text10">Other images</h3>
                            @foreach($announcement->images as $image)
                        <a href="" class="btn" data-toggle="modal" data-target="#carouselModal"><img src="{{$image->getUrl(300,150)}}" alt="" height="90" class="mx-2 mb-3"></a>
                        <div class="modal fade" id="carouselModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                
                                <div class="modal-body">
                                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                          @foreach($announcement->images as $key=>$image)
                                          <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                                          <img src="{{$image->getUrl(700,300)}}" class="d-block w-100">
                                          </div>
                                          @endforeach
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                          <span class="carousel-control-prev-icon margin-custom" aria-hidden="true"></span>
                                          <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                          <span class="sr-only">Next</span>
                                        </a>
                                      </div>
                                </div>
                                
                              </div>
                            </div>
                          </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="nav tag-cloud">
                    <a href="{{route('public.announcements', [$announcement->category->id])}}">{{$announcement->category->name}}</a>
                    </div>
                </article>
                <div class="contact-form article-comment">
                    <h4>Feedbacks</h4>
                    @foreach($feeds as $feed)
                    <div class="avatar my-5">
                        <h6 class="text30">{{$feed->user->name}}</h6>
                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" title="" alt="" class="rounded" height="50">
                        <span class="ml-3 text-white">{{$feed->body}}</span>
                    </div>
                    @endforeach
                    @if(Auth::user() && Auth::user()->id != $announcement->user->id)
                <form id="contact-form" method="POST" action="{{route('feed.store', [$announcement->id])}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="name" id="name" placeholder="Name *" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="email" id="email" placeholder="Email *" class="form-control" type="email">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="body" id="message" placeholder="Your message *" rows="4" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="send">
                                    <button type="submit" class="px-btn theme"><span>Submit</span> <i class="arrow"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
            
            <div class="col-lg-4 m-15px-tb blog-aside">
                <!-- Author -->
                <div class="widget widget-author">
                    <div class="widget-title">
                        <h3>Author</h3>
                    </div>
                    <div class="widget-body">
                        <div class="media align-items-center">
                            <div class="avatar">
                                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" title="" alt="">
                            </div>
                            <div class="media-body">
                                <h6>Hello, I'm<br> {{$announcement->user->name}}</h6>
                            </div>
                        </div>
                        <p class="text-white">I design and develop services for customers of all sizes, specializing in creating stylish, modern websites, web services and online stores</p>
                        @if(Auth::user() && Auth::user()->id != $announcement->user->id)
                      <form action="{{route('contact.seller', [$announcement->id])}}" method="post">
                      @csrf
                      <button type="submit" class="btn btncustom mt-2 px-4 mx-auto">Contact</button>
                      </form>
                       
                      <a href="{{route('profile.view', [$announcement->user])}}" class="btn btncustom2  mx-auto my-2">View Profile</a>
                        @endif
                        @if (session('contact'))
                         <div class="alert alert-success text-center">
                             An email has been sent to the seller!
                        </div>
            
                        @endif
                    </div>
                </div>
                <!-- End Author -->
                <!-- Latest Post -->
                <div class="widget widget-latest-post">
                    <div class="widget-title">
                        <h3>Other ads by the same author</h3>
                    </div>
                    <div class="widget-body">
                        @foreach($announcements as $announcement)
                        <div class="latest-post-aside media">
                            <div class="lpa-left media-body">
                                <div class="lpa-title">
                                <h5><a href="{{route('public.detail', compact('announcement'))}}">{{$announcement->title}}</a></h5>
                                </div>
                                <div class="lpa-meta">
                                    
                                    <a class="date" href="#">
                                        {{$announcement->created_at->format('d/m/Y')}}
                                    </a>
                                </div>
                            </div>
                            <div class="lpa-right">
                                <a href="#">
                                <img src="{{$announcement->images->first()->getUrl(300,150)}}" title="" alt="">
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- End Latest Post -->
                <!-- widget Tags -->
                <div class="widget widget-tags">
                    <div class="widget-title">
                        <h3>Latest Tags</h3>
                    </div>
                    <div class="widget-body">
                       
                        <div class="nav tag-cloud">
                            @foreach($categories as $cat)
                        <a href={{route('public.announcements', [$cat->id])}}>{{$cat->name}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- End widget Tags -->
            </div>
        </div>
    </div>
</div>
@endsection


