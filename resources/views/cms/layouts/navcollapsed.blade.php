<nav class="navbar navbar-expand-md navbar-light fixed-top" style="display: none;">
<div class="container">
    
  <a class="navbar-brand" href="{{url('/')}}"></a>
    
  <div id="navtoggle">
    <button class="navbar-toggler navbar-toggler-right custom-toggler menubutton" type="button" data-toggle="collapse" data-target="#Mynavbar" aria-controls="Mynavbar" aria-expanded="false" aria-label="Toggle navigation" onclick="cross(this)">
      <span>
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
      </span>
    </button>
  <div>

  <div class="collapse navbar-collapse " id="Mynavbar">
    <ul class="navbar-nav ml-auto ">
      @include('cms.layouts.navlist')

      <li class="nav-item">
        <a class="nav-link logoutcollapse" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span data-feather="log-out"></span>Logout         
        </a>
        
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
        </form>
              
      </li>
    </ul>
  </div>

</div>
</nav>
