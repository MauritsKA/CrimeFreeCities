<li class="nav-item">
  <a class="nav-link" href="{{ url('dashboard/')}}">
  <span data-feather="home"></span> @lang('cmsnav.dashboard') <span class="sr-only">(current)</span>
  </a>
</li>

<li class="nav-item">
  <a class="nav-link" href="{{ url('dashboard/projects')}}">
  <span data-feather="layers"></span> @lang('cmsnav.projects')
</a>
</li>

<li class="nav-item">
  <a class="nav-link" href="{{ url('dashboard/publications')}}">
  <span data-feather="file-text"></span> @lang('cmsnav.publications')
  </a>
</li>

<li class="nav-item">
  <a class="nav-link" href="{{ url('dashboard/practices')}}">
  <span data-feather="book-open"></span> @lang('cmsnav.practices')
  </a>
</li>

<li class="nav-item">
  <a class="nav-link" href="#">
  <span data-feather="bar-chart-2"></span> @lang('cmsnav.statistics')
  </a>
</li>

<li class="nav-item">
  <a class="nav-link" href="{{ url('dashboard/images')}}">
  <span data-feather="image"></span> @lang('cmsnav.images')
  </a>
</li>

<li class="nav-item">
  <a class="nav-link" href="#">
  <span data-feather="settings"></span> @lang('cmsnav.settings')
 </a>
</li>

<li class="nav-item">
    <!-- Locale button -->
             
                
                <form class="form-inline" method="POST" id="localeform" action="{{url('/setlocale')}}">
                {{ csrf_field() }}  
<a class="nav-link" href="#">
                <span data-feather="message-circle"></span> 
                <select name="locale" id="locale"  class="form-control form-control-sm" onchange='this.form.submit()'>
                    <option value="en">en</option>
                    <option value="nl">nl</option>
                </select>
               </a>
                </form>
            
</li>

