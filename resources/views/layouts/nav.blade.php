<nav class="navbar navbar-expand-md navbar-light fixed-top">
<div class="container">
    
  <a class="navbar-brand" href="{{url('/')}}">CrimeFreeCities</a>
    
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
               <a class="nav-link {{ Request::is('projects') ? 'active' : '' }}" href="{{url('')}}/projects">{{ucfirst(__('nav.projects'))}}</a>
            </li>
            <li class="nav-item">
               <a class="nav-link {{ Request::is('publications') ? 'active' : '' }}" href="{{url('')}}/publications">{{ucfirst(__('nav.publications'))}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('practices') ? 'active' : '' }}" href="{{url('')}}/practices">{{ucfirst(__('nav.practices'))}}</a>
            </li>
             <li class="nav-item">
               <a class="nav-link {{ Request::is('statistics') ? 'active' : '' }}" href="{{url('')}}/statistics">{{ucfirst(__('nav.statistics'))}}</a>
            </li>
              <li class="nav-item">
               <a class="nav-link {{ Request::is('contact') ? 'active' : '' }}" href="#bottom">{{ucfirst(__('nav.contact'))}}</a>
            </li>
            <li class="nav-item">
              <!-- Locale button -->
              <div class="localebutton">
                <form class="form-inline" method="POST" id="localeform" action="{{url('/setlocale')}}">
                {{ csrf_field() }}    
                <select name="locale" id="locale"  class="form-control form-control-sm" onchange='this.form.submit()'>
                    <option value="en">en</option>
                    <option value="nl">nl</option>
                </select>
                </form>
              <div>
            </li>
          </ul>
      
   </div>
  </div>
</nav>
