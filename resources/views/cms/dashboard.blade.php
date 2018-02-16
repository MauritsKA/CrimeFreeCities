@extends('cms.layouts.master')

@section('content')
<body>
    
    <div class="container-fluid">
      <div class="row">
       
        @include('cms.layouts.nav')
          
          

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
              
        <a class="btn btn-outline-secondary" href="{{ route('logout') }}"
onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
Logout <span data-feather="log-out"></span></a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
{{ csrf_field() }}
</form>
              
          </div>
        
        <!-- Locale button -->
        <form class="form-inline" method="POST" id="localeform" action="{{url('/setlocale')}}">
        {{ csrf_field() }}    
        <select name="locale" id="locale"  class="form-control form-control-sm" onchange='this.form.submit()'>
            <option value="en">en</option>
            <option value="nl">nl</option>
        </select>
        </form>
            

            
        </main>
      </div>
    </div>

<script>

$("#locale option[value='{{\App::getLocale()}}']").attr("selected","selected");
</script>
         
    
@endsection