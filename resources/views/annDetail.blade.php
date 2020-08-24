@extends('layouts.app')
@section('style')
    <style>
        body{
            background-color: black;
        }
        /* Blog 
---------------------*/
.blog-grid {
  box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
  border-radius: 5px;
  overflow: hidden;
  background: #ffffff;
  margin-top: 15px;
  margin-bottom: 15px;
}
.blog-grid .blog-img {
  position: relative;
}
.blog-grid .blog-img .date {
  position: absolute;
  background: #fc5356;
  color: #ffffff;
  padding: 8px 15px;
  left: 10px;
  top: 10px;
  border-radius: 4px;
}
.blog-grid .blog-img .date span {
  font-size: 22px;
  display: block;
  line-height: 22px;
  font-weight: 700;
}
.blog-grid .blog-img .date label {
  font-size: 14px;
  margin: 0;
}
.blog-grid .blog-info {
  padding: 20px;
}
.blog-grid .blog-info h5 {
  font-size: 22px;
  font-weight: 700;
  margin: 0 0 10px;
}
.blog-grid .blog-info h5 a {
  color: #20247b;
}
.blog-grid .blog-info p {
  margin: 0;
}
.blog-grid .blog-info .btn-bar {
  margin-top: 20px;
}


/* Blog Sidebar
-------------------*/
.blog-aside .widget {
  box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
  border-radius: 5px;
  overflow: hidden;
  background: transparent;
  margin-top: 15px;
  margin-bottom: 15px;
  width: 100%;
  display: inline-block;
  vertical-align: top;
  border: 2px solid var(--trenta);
}
.blog-aside .widget-body {
  padding: 15px;
}
.blog-aside .widget-title {
  padding: 15px;
  border-bottom: 1px solid var(--trenta);
}
.blog-aside .widget-title h3 {
  font-size: 20px;
  font-weight: 700;
  color: var(--dieci);
  margin: 0;
}
.blog-aside .widget-author .media {
  margin-bottom: 15px;
}
.blog-aside .widget-author p {
  font-size: 16px;
  margin: 0;
}
.blog-aside .widget-author .avatar {
  width: 70px;
  height: 70px;
  border-radius: 50%;
  overflow: hidden;
}
.blog-aside .widget-author h6 {
  font-weight: 600;
  color: var(--trenta);
  font-size: 22px;
  margin: 0;
  padding-left: 20px;
}
.blog-aside .post-aside {
  margin-bottom: 15px;
}
.blog-aside .post-aside .post-aside-title h5 {
  margin: 0;
}
.blog-aside .post-aside .post-aside-title a {
  font-size: 18px;
  color: var(--dieci);
  font-weight: 600;
}
.blog-aside .post-aside .post-aside-meta {
  padding-bottom: 10px;
}
.blog-aside .post-aside .post-aside-meta a {
  color: #6F8BA4;
  font-size: 12px;
  text-transform: uppercase;
  display: inline-block;
  margin-right: 10px;
}
.blog-aside .latest-post-aside + .latest-post-aside {
  border-top: 1px solid #eee;
  padding-top: 15px;
  margin-top: 15px;
}
.blog-aside .latest-post-aside .lpa-right {
  width: 90px;
}
.blog-aside .latest-post-aside .lpa-right img {
  border-radius: 3px;
}
.blog-aside .latest-post-aside .lpa-left {
  padding-right: 15px;
}
.blog-aside .latest-post-aside .lpa-title h5 {
  margin: 0;
  font-size: 15px;
}
.blog-aside .latest-post-aside .lpa-title a {
  color: var(--trenta);
  font-weight: 600;
}
.blog-aside .latest-post-aside .lpa-meta a {
  color: #6F8BA4;
  font-size: 12px;
  text-transform: uppercase;
  display: inline-block;
  margin-right: 10px;
}

.tag-cloud a {
  padding: 4px 15px;
  font-size: 13px;
  color: black;
  background: var(--trenta);
  border-radius: 3px;
  margin-right: 4px;
  margin-bottom: 4px;
}
.tag-cloud a:hover {
  background: var(--dieci);
}

.blog-single {
  padding-top: 30px;
  padding-bottom: 30px;
}

.article {
  box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
  border-radius: 5px;
  overflow: hidden;
  background: transparent;
  padding: 15px;
  margin: 15px 0 30px;
  border: 2px solid var(--trenta);
}
.article .article-title {
  padding: 15px 0 20px;
  color: var(--dieci);
}
.article .article-title h6 {
  font-size: 14px;
  font-weight: 700;
  margin-bottom: 20px;
  color: var(--dieci) !important;
}
.article .article-title h6 a {
  text-transform: uppercase;
  color: #fc5356;
  border-bottom: 1px solid #fc5356;
}
.article .article-title h2 {
  color: #20247b;
  font-weight: 600;
  color: var(--dieci) !important;
}
.article .article-title .media {
  padding-top: 15px;
  border-bottom: 1px dashed #ddd;
  padding-bottom: 20px;
}
.article .article-title .media .avatar {
  width: 45px;
  height: 45px;
  border-radius: 50%;
  overflow: hidden;
}
.article .article-title .media .media-body {
  padding-left: 8px;
  color: var(--dieci) !important;
}
.article .article-title .media .media-body label {
  font-weight: 600;
  color: #fc5356;
  margin: 0;
  color: var(--trenta) !important;
}
.article .article-title .media .media-body span {
  display: block;
  font-size: 12px;
}
.article .article-content h1,
.article .article-content h2,
.article .article-content h3,
.article .article-content h4,
.article .article-content h5,
.article .article-content h6 {
  color:var(--dieci);
  font-weight: 600;
  margin-bottom: 15px;
}

.article .tag-cloud {
  padding-top: 10px;
  
}

.article-comment {
  box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
  border-radius: 5px;
  overflow: hidden;
  background: transparent;
  padding: 20px;
  border: 2px solid var(--trenta);
}
.article-comment h4 {
  color: var(--dieci);
  font-weight: 700;
  margin-bottom: 25px;
  font-size: 22px;
}
img {
    max-width: 100%;
}
img {
    vertical-align: middle;
    border-style: none;
}

/* Contact Us
---------------------*/
.contact-name {
  margin-bottom: 30px;
}
.contact-name h5 {
  font-size: 22px;
  color: #20247b;
  margin-bottom: 5px;
  font-weight: 600;
}
.contact-name p {
  font-size: 18px;
  margin: 0;
}

.social-share a {
  width: 40px;
  height: 40px;
  line-height: 40px;
  border-radius: 50%;
  color: #ffffff;
  text-align: center;
  margin-right: 10px;
}
.social-share .dribbble {
  box-shadow: 0 8px 30px -4px rgba(234, 76, 137, 0.5);
  background-color: #ea4c89;
}
.social-share .behance {
  box-shadow: 0 8px 30px -4px rgba(0, 103, 255, 0.5);
  background-color: #0067ff;
}
.social-share .linkedin {
  box-shadow: 0 8px 30px -4px rgba(1, 119, 172, 0.5);
  background-color: #0177ac;
}

.contact-form .form-control {
  border: none;
  border-bottom: 1px solid var(--trenta);
  background: transparent;
  border-radius: 0;
  padding-left: 0;
  box-shadow: none !important;
}
.contact-form .form-control:focus {
  border-bottom: 1px solid var(--dieci);
}
.contact-form .form-control.invalid {
  border-bottom: 1px solid var(--dieci);
}
.contact-form .send {
  margin-top: 20px;
}
@media (max-width: 767px) {
  .contact-form .send {
    margin-bottom: 20px;
  }
}

.section-title h2 {
    font-weight: 700;
    color: #20247b;
    font-size: 45px;
    margin: 0 0 15px;
    border-left: 5px solid #fc5356;
    padding-left: 15px;
}
.section-title {
    padding-bottom: 45px;
}
.contact-form .send {
    margin-top: 20px;
}
.px-btn {
    padding: 0 50px 0 20px;
    line-height: 60px;
    position: relative;
    display: inline-block;
    color: var(--dieci);
    background: none;
    border: none;
}
.px-btn:before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    display: block;
    border-radius: 30px;
    background: transparent;
    border: 1px solid var(--trenta);
    border-right: 1px solid transparent;
    -moz-transition: ease all 0.35s;
    -o-transition: ease all 0.35s;
    -webkit-transition: ease all 0.35s;
    transition: ease all 0.35s;
    width: 60px;
    height: 60px;
}
.px-btn .arrow {
    width: 13px;
    height: 2px;
    background: currentColor;
    display: inline-block;
    position: absolute;
    top: 0;
    bottom: 0;
    margin: auto;
    right: 25px;
}
.px-btn .arrow:after {
    width: 8px;
    height: 8px;
    border-right: 2px solid currentColor;
    border-top: 2px solid currentColor;
    content: "";
    position: absolute;
    top: -3px;
    right: 0;
    display: inline-block;
    -moz-transform: rotate(45deg);
    -o-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    -webkit-transform: rotate(45deg);
    transform: rotate(45deg);
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
                        <img src="https://via.placeholder.com/800x350/87CEFA/000000" title="" alt="">
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
                                    <img src="https://via.placeholder.com/400x200/FFB6C1/000000" title="" alt="">
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