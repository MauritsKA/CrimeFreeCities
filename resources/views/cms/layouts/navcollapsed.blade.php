<nav class="navbar navbar-expand-md navbar-light fixed-top">
<div class="container">
    
  <a class="navbar-brand" href="{{url('/')}}"></a>
    
  <button class="navbar-toggler navbar-toggler-right custom-toggler menubutton" type="button" data-toggle="collapse" data-target="#Mynavbar" aria-controls="Mynavbar" aria-expanded="false" aria-label="Toggle navigation" onclick="cross(this)">
    <span>
      <div class="bar1"></div>
      <div class="bar2"></div>
      <div class="bar3"></div>
    </span>
  </button>

  <div class="collapse navbar-collapse " id="Mynavbar">
     <ul class="navbar-nav ml-auto ">
            <li class="nav-item">
                <a class="nav-link" href="dashboard">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="layers"></span>
                  @lang('cmsnav.pages')
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  @lang('cmsnav.publications')
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="settings"></span>
                  @lang('cmsnav.settings')
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="bar-chart-2"></span>
                  @lang('cmsnav.statistics')
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="image"></span>
                  @lang('cmsnav.pictures')
                </a>
              </li>
               <li class="nav-item">
                <a class="nav-link logoutcollapse" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span data-feather="log-out"></span> Logout </a>             
                </form>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </li>
          </ul>
      
   </div>
  </div>
</nav>
