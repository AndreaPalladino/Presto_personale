<nav class="navbar navbar-expand-md navbar-light  shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand d-flex d-md-none" href="{{ url('/') }}">
            <h4 class="text10">Presto</h4>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <button class="btn btncustom2 px-3" data-toggle="modal" data-target="#exampleModal">Search</button>
                </li>
            </ul>
             {{-- center part --}}
             <a class="navbar-brand d-none d-md-flex ml-5 pl-5" href="{{ url('/') }}">
                <h4 class=" text10 cover mx-auto ">Presto</h4>
            </a>
            <!-- Right Side Of Navbar -->
            
            <ul class="navbar-nav ml-auto">
                
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                @if(Auth::user()->is_revisor)
                <li class="nav-item dropdown text10">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text10 " href="{{route('revisorHome')}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Revisor Home
                       <span class="badge badge-pill badge-custom">{{\App\Announcement::ToBeRevisioned()}}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('revisorHome')}}"><i class="fas fa-check mr-1"></i> To Revise</a>
                        <a class="dropdown-item" href="{{-- {{route('rejectedadds')}} --}}"><i class="fas fa-times mr-1"></i> Rejected Ads</a>
                    </div>
                </li>
                @endif
                    <li class="nav-item dropdown text10 mt-2 ml-md-2">
                        <a id="navbarDropdown" class=" dropdown-toggle text10" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret d-none"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('profile') }}">
                                <i class="fas fa-user mr-1"></i> Profile 
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>


<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        
        <div class="modal-body bg-dark">
        <form action="{{route('public.search')}}" method="get">
              @csrf
              <input type="text" name="q" placeholder="Search" class="form-control border-custom bg-transparent my-5">
              <button type="button" class="btn btncustom mt-3 mx-auto d-block" data-dismiss="modal">Search</button>
          </form>
        </div>
      </div>
    </div>
  </div>