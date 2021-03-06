<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    {{--  <div class="container">  --}}
      <a class="navbar-brand" href="{{ route('home') }}">TI Blog </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        {{--  <i class="fa fa-bars"></i>  --}}
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">About</a>
          </li>
          {{--  <li class="nav-item">
            <a class="nav-link" href="post.html">Sample Post</a>
          </li>  --}}
          <li class="nav-item">
            <a class="nav-link" href="https://locemarn.github.io/portfolio/#contato" target="_blank">Contact</a>
          </li>
          <li class="nav-item">
            <!-- Authentication Links -->
            @guest
              <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
            @else
              <li class="nav-item"><a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
              </a></li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
              {{--  <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }} <span class="caret"></span>
                </a>
  
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                  </a>
  
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </div>
              </li>  --}}
            @endguest
            {{--  <a class="nav-link" href="{{ route('login') }}">Login</a>  --}}
          </li>
        </ul>
      </div>
    {{--  </div>  --}}
  </nav>
  
  <!-- Page Header -->
  <header class="masthead"  id="pic" style="background-image: url(@yield('bg-img'));">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>@yield('title')</h1>
            <span class="subheading">@yield('sub-heading')</span>
          </div>
        </div>
        <div id="credits">
            <small><a href="https://unsplash.com/@jakubkriz" target="_black" style="color: #fff;">@yield('credits')</a></small>
        </div>
      </div>
    </div>
  </header>

  <style>
    #credits {
      color: #fff;
      position: absolute;
      bottom: 0;
      right: 0;
    }

    #pic {
      height: 680px;
    }
  </style>