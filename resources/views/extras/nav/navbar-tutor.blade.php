<!-- Fixed navbar -->
<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      <a class="navbar-brand" href="#">HOME<i class="fa fa-circle"></i>ASSIGNMENTS</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="{{URL::to('/tutor/home')}}">HOME</a></li>
        <li><a href="about.html">CONTACT US</a></li>
        <li><a href="{{ route('tutor-det')}}">PROFILE</a></li>
        <li><a href="services.html">NEWS</a></li>
          @if (Route::has('login'))

                @auth
                  <li>  <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('LOGOUT') }}></a> </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                @else
                  <li>  <a href="#" data-toggle="modal" data-target="#exampleModalCenter">LOGIN</a> </li>

                    @if (Route::has('register'))
                      <li>  <a href="{{ route('register') }}">REGISTER</a>
                    @endif
                @endauth

        @endif
        <li><a data-toggle="modal" data-target="#myModal" href="#myModal"><i class="fa fa-envelope-o"></i></a></li>
      </ul>
    </div>
    <!--/.nav-collapse -->
  </div>
</div>
