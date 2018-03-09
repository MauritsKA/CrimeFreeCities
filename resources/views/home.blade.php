@extends('layouts.master')

@section('content')
<a id="top"></a>
<div class="cover">
<div class="coveroverlay">
  <div class="container">

    <h1>{{ucfirst(__('home.title1'))}}<span> {{ucfirst(__('home.title2'))}}</span> {{ucfirst(__('home.title3'))}} <span>{{ucfirst(__('home.title4'))}}</span></h1>
    <p>{{ucfirst(__('home.subtitle'))}}</p>

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <p class="d-block w-60" alt="First slide">A mantis shrimp can swing its claw so fast it boils the water around it and creates a flash of light. </p>
        </div>
        <div class="carousel-item">
          <p class="d-block w-60" alt="Second slide">A small percentage of the static you see on "dead" tv stations is left over radiation from the Big Bang. You're seeing residual effects of the Universe's creation.</p>
        </div>
        <div class="carousel-item">
          <p class="d-block w-60"  alt="Third slide">If you were to remove all of the empty space from the atoms that make up every human on earth, the entire world population could fit into an apple.</p>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

  </div>
</div>
</div>

<section class="personal section">
  <div class="container">
    
    <div class="row"> 
    <div class="profile col-sm-4"><img class="img-fluid" src="images/profile.png" ></div>
    <div class="description col-sm-8">
    <h3>About me</h3>
    <p>Crime is concentrated mainly in cities. In the Netherlands, for example, the chance of becoming a victim of a crime such as burglary or robbery in urbanised areas is 2-5 times higher than in rural areas (see ‘statistics’ for more information). Crime prevention is most urgent in urbanised areas. For this reason, the content of this website is focused  on crime prevention in cities with a population of 75.000 and more.</p>
    </div>
  </div>
  </div>
</section>

<section class="work section">
   <div class="container">
   <h3>Work</h3>
    <p>Crime is concentrated mainly in cities. In the Netherlands, for example, the chance of becoming a victim of a crime such as burglary or robbery in urbanised areas is 2-5 times higher than in rural areas (see ‘statistics’ for more information). Crime prevention is most urgent in urbanised areas. For this reason, the content of this website is focused  on crime prevention in cities with a population of 75.000 and more. </p>
  </div>
</section>

<section class="publications section">
   <div class="container">
   <h3>Publications</h3>
    <p>
        @guest
           <a href="{{ route('login') }}">Login</a>
           <a href="{{ route('register') }}">Register</a>
        @else
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      {{ csrf_field() }}
      </form>
        @endguest
    </p>
  </div>
</section>

<section class="practices section">
   <div class="container">
   <h3>Practices</h3>
    <p>Crime is concentrated mainly in cities. In the Netherlands, for example, the chance of becoming a victim of a crime such as burglary or robbery in urbanised areas is 2-5 times higher than in rural areas (see ‘statistics’ for more information). Crime prevention is most urgent in urbanised areas. For this reason, the content of this website is focused  on crime prevention in cities with a population of 75.000 and more. </p>
  </div>
</section>

<section class="statistics section">
   <div class="container">
   <h3>Statistics</h3>
    <p>Crime is concentrated mainly in cities. In the Netherlands, for example, the chance of becoming a victim of a crime such as burglary or robbery in urbanised areas is 2-5 times higher than in rural areas (see ‘statistics’ for more information). Crime prevention is most urgent in urbanised areas. For this reason, the content of this website is focused  on crime prevention in cities with a population of 75.000 and more. </p>
  </div>
</section>


@endsection
