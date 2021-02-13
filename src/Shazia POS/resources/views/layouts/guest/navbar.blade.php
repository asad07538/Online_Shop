<nav class="navbar navbar-expand-md bg-dark  shadow-sm" >
<div class="container">
<a class="navbar-brand" style="border-bottom: 3px solid  #40ff00;" href="{{ url('/') }}"> 
    Shazia Mobile Shop
</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<!-- Left Side Of Navbar -->
<ul class="navbar-nav mr-auto">
  <li class="nav-item">
      <a class="nav-link" href="{{ route('home') }}"><i class="fa fa-home"></i> {{ __('Home') }}</a>
  </li>
<!--   <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"> <i class="search"></i> Search</button>
  </form> -->
</ul>

<!-- Right Side Of Navbar -->
<ul class="navbar-nav ml-auto">
    <!-- Authentication Links -->
    @guest
      <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-user-circle"></i> {{ __('Login') }}</a>
      </li>
      @if (Route::has('register'))
          <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
          </li>
      @endif
    @else

      <li class="nav-item px-2">        
        <a href="{{ route('myorders') }}"> My Orders </a>
      </li>
      <li class="nav-item">        
        <a href="{{ route('logout') }}"
              onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
            <i class="fa fa-user-circle mr-2"></i> Logout
          </a>
      </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
    @endguest
</ul>
</div>
</div>
</nav>
