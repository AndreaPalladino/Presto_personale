@extends('layouts.app')
@section('style')
    <style>
       body{
    background-color: black;
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
			@if (session('deleted'))
    <div class="alert alert-success text-center">
        Ad succesfully deleted!
    </div>
    
@endif
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
                            <div class="latest-post-aside media mt-5">
                                <div class="lpa-left media-body">
                                    <div class="lpa-title text30">
                                    <h5 class="mt-5"><a class="text30" href="{{route('public.detail', compact('announcement'))}}">{{$announcement->title}}</a></h5>
                                    </div>
                                    <div class="lpa-meta">
                                        
                                        <a class="date text10" href="#">
                                            {{$announcement->created_at->format('d/m/Y')}}
                                        </a>
                                        
                                    </div>
                                    @if(Auth::user()->id == $user->id)
                                    <a href="{{route('edit', compact('announcement'))}}" class="btn btncustom mt-5 px-4">Edit</a>
                                    
                                    <form action="{{route('accept.delete', compact('announcement'))}}" method="post">
                                      @method('DELETE')
                                      @csrf
                                      <button type="submit" class="btn btncustom2 mt-2 px-4">Delete</button>
                                    </form>
                                    @endif
                                   {{--  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          
                                          <div class="modal-body bg-dark">
                                            <h5 class="text30">Are you sure you want to delete this announcement?</h5>
                                          <form action="{{route('accept.delete', [$announcement->id])}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btncustom">Delete</button>
                                          </div>
                                          </form>
                                          </div>
                                          
                                      </div>
                                    </div> --}}
                                </div>
                                <div class="col-12 col-md-6 d-none d-md-flex lpa-right ml-5 mb-5">
                                    
                                        <img src="{{$announcement->images->first()->getUrl(700, 300)}}" title="" alt="">
                                    
                                   
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
                                    
                                    <form action="{{route('delete', compact('announcement'))}}" method="post">
                                      @method('DELETE')
                                      @csrf
                                      <button type="submit" class="btn btncustom2 px-4 mt-4">Cancel</button>
                                    </form>
                                    
                                    
                                    <form action="{{route('revise.again', [$announcement->id])}}" method="post">
                                        @csrf
                                        <button type="submit" class="mt-5 ml-2 btn btncustom">Revise Again</button>
                                    </form>
                                   
                                </div>
                                <div class="lpa-right ml-5 mb-5">
                                    
                                        <img src="{{$announcement->images->first()->getUrl(300, 150)}}" title="" alt="">
                                    
                                </div>
                            </div>
                            
                            @endforeach
                        
                    </div>
			</div>
		</div>	
	</div>
</div>
@if (session('asked'))
    <div class="alert alert-success text-center">
        Request sended!
    </div>
    
@endif
@if(Auth::user()->id==$user->id && !Auth::user()->is_revisor)
<div class="container mb-5">
  <div class="row">
    <div class="col-12 ml-md-5">
      <div class="bio-info2 ml-3 ml-md-5">
        <h4 class="text30 text-center">You wanna be a revisor? Click down below</h4>
      
        <a href="{{route('ask.become')}}" class="btn btncustom mx-auto d-block mt-2">RevisorMaker</a>
      
      </div>
      
      
    </div>
  </div>
</div>
@endif


  
  <!-- Modal -->
  

<!-- Modal -->

  
@endsection