@extends('layouts.app')
@section('style')
    <style>
        body{
		background-color: black;
	}
	.portfolio{
		padding:6%;
		text-align:center;
	}
	.heading{
		background: transparent;
		padding: 1%;
		text-align: left;
		box-shadow: 0px 0px 4px 0px #545b62;
        border: 2px solid var(--trenta);
	}
	.heading img{
		width: 10%;
	}
	.bio-info{
		padding: 5%;
		background:transparent;
		box-shadow: 0px 0px 4px 0px #b0b3b7;
        border: 2px solid var(--trenta);
	}
	.name{
		font-family: 'Charmonman', cursive;
		font-weight:600;
	}
	.bio-image{
		text-align:center;
	}
	.bio-image img{
		border-radius:50%;
	}
	.bio-content{
		text-align:left;
	}
	.nav-pills .nav-link.active, .nav-pills .show > .nav-link {
    color: black;
    background-color: var(--dieci);
}
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
    </style>
@endsection
@section('content')
<div class="container portfolio">
	<div class="row">
		<div class="col-md-12">
			<div class="heading">				
				<img src="https://image.ibb.co/cbCMvA/logo.png" />
			</div>
		</div>	
	</div>
	<div class="bio-info">
		<div class="row">
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-12">
						<div class="bio-image">
							<img src="https://image.ibb.co/f5Kehq/bio-image.jpg" alt="image" />
						</div>			
					</div>
				</div>	
			</div>
			<div class="col-md-6">
				<div class="bio-content">
                <h2 class="text-white">Hi there, I'm <span class="h2 text10">{{$user->name}}</span></h1>
                    <hr class="fluo">
                    <h6 class="text-white">I am a fresh web designer and I create custom web designs. I'm skilled at writing well-designed, testable and efficient code using current best practices in Web development. I'm a fast learner, hard worker and team player who is proficient in making creative and innovative web pages.</h6>
                    <hr class="fluo">
                    <p class="text10">Contact info:</p>
                    <p class="text30">{{$user->email}}</p>
                    <i class="fab fa-facebook text10 fa-2x mx-3"></i>
                    <i class="fab fa-instagram text10 fa-2x mx-3"></i>
                    <i class="fab fa-twitter text10 fa-2x mx-3"></i>
                    <i class="fab fa-linkedin text10 fa-2x mx-3"></i>
				</div>
			</div>
		</div>	
	</div>
</div>
<div class="container">
  <div class="row">
    <div class="col-12">
      <h3 class="text-center text30">Ads created</h3>
    </div>
  </div>
</div>
<div class="container portfolio">
	<div class="bio-info">
		<div class="row">
			
			   <div class="col-12">
                <div class="nav  nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="flex-sm-fill text-sm-center nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Accepted</a>
                    @if(Auth::user()->id == $user->id)
                    <a class="flex-sm-fill text-sm-center nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Revisioning</a>
                    <a class="flex-sm-fill text-sm-center nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Rejected</a>
                    @endif
                </div>
			   </div>
				<div class="tab-content d-flex flex-wrap wrap-column" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                     
                        <div class="widget-body">
                            @foreach($accettati as $announcement)
                            <div class="latest-post-aside media">
                                <div class="lpa-left media-body">
                                    <div class="lpa-title text30">
                                    <h5 ><a class="text30" href="{{route('public.detail', compact('announcement'))}}">{{$announcement->title}}</a></h5>
                                    </div>
                                    <div class="lpa-meta">
                                        
                                        <a class="date text10" href="#">
                                            {{$announcement->created_at->format('d/m/Y')}}
                                        </a>
                                        
                                    </div>
                                    <a href="{{route('public.detail', compact('announcement'))}}" class="mt-5 btn btncustom2">Details</a>
                                </div>
                                <div class="lpa-right ml-5 mb-5">
                                    <a href="#">
                                        <img src="https://via.placeholder.com/400x200/FFB6C1/000000" title="" alt="">
                                    </a>
                                   
                                </div>
                            </div>
                            @endforeach
                        </div>
                      {{-- @endif --}}
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="widget-body">
                            @foreach($sospesi as $announcement)
                            <div class="latest-post-aside media">
                                <div class="lpa-left media-body">
                                    <div class="lpa-title mx-auto">
                                    <h5 class="text10 text-center">{{$announcement->title}}</h5>
                                    </div>
                                    <div class="lpa-meta">
                                        
                                        <a class="date text30" href="#">
                                            {{$announcement->created_at->format('d/m/Y')}}
                                        </a>
                                    </div>
                                </div>
                                <button class="btn btncustom2 ml-5" data-toggle="modal" data-target="#exampleModal2">See Status</button>
                            </div>
                            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    
                                    <div class="modal-body bg-dark py-5">
                                      <h3 class="text-center text10"><i class="fas fa-circle text-warning mr-2"></i>Pending</h3>
                                    </div>
                
                                  </div>
                                </div>
                              </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <div class="widget-body">
                            @foreach($rifiutati as $announcement)
                            <div class="latest-post-aside media">
                                <div class="lpa-left media-body">
                                    <div class="lpa-title">
                                    <h5 class="text30">{{$announcement->title}}</h5>
                                    </div>
                                    <div class="lpa-meta">
                                        
                                        <a class="date text10" href="#">
                                            {{$announcement->created_at->format('d/m/Y')}}
                                        </a>
                                    </div>
                                    <form action="" method="post">
                                        @csrf
                                        <a href="{{-- {{route('public.detail', compact('announcement'))}} --}}" class="mt-5 btn btncustom2 px-4">Cancel</a>
                                    </form>
                                    
                                    <form action="{{route('revise.again', [$announcement->id])}}" method="post">
                                        @csrf
                                        <button type="submit" class="mt-5 ml-2 btn btncustom">Revise Again</button>
                                    </form>
                                   
                                </div>
                                <div class="lpa-right ml-5 mb-5">
                                    
                                        <img src="https://via.placeholder.com/400x200/FFB6C1/000000" title="" alt="">
                                    
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
			</div>
		</div>	
	</div>
</div>




  
  <!-- Modal -->
  
@endsection