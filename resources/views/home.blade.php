@extends('layouts.master')

@section('content')
<a id="top"></a>
<div class="cover">
  <div class="container">
    <h1>Reducing Crime Trough <span>Effective</span> Research on <span>Urban Planning</span></h1>
    <p>Through my years of experience in research on the topics of urban planning and crime I've developed methods to free your city of crime. I offer any public party tailored advice to reduce crime.</p>

   <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
       <p class="d-block w-60" alt="First slide">A mantis shrimp can swing its claw so fast it boils the water around it and creates a flash of light.</p>
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
<section class="personal section">
  <div class="container">
    
    <div class="row"> 
    <div class="profile col-4"><img src="images/profile.png" alt="Product Design"></div>
    <div class="description col-8">
    <h3>About me</h3>
    <p>Crime is concentrated mainly in cities. In the Netherlands, for example, the chance of becoming a victim of a crime such as burglary or robbery in urbanised areas is 2-5 times higher than in rural areas (see ‘statistics’ for more information). Crime prevention is most urgent in urbanised areas. For this reason, the content of this website is focused  on crime prevention in cities with a population of 75.000 and more.</p>
    </div>
  </div>
  </div>
</section>
<section class="work section">
   <div class="container">
   <h3>About me</h3>
    <p>Crime is concentrated mainly in cities. In the Netherlands, for example, the chance of becoming a victim of a crime such as burglary or robbery in urbanised areas is 2-5 times higher than in rural areas (see ‘statistics’ for more information). Crime prevention is most urgent in urbanised areas. For this reason, the content of this website is focused  on crime prevention in cities with a population of 75.000 and more. </p>
  </div>
</section>
<section class="publications section">
   <div class="container">
   <h3>About me</h3>
    <p> <ul>
        @guest
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
        @else
          <li> <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout </a></li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      {{ csrf_field() }}
      </form>
        @endguest
    </ul></p>
  </div>
</section>



      
      





<script>
// Events
$(document).ready(function () {
    menuColoring();
});

$(window).scroll(function () {
    menuColoring();
});

// Menu scroll
var menuBackground = false;

function menuColoring() {
    var scrollPosition = $(window).scrollTop();
    var menu = $('.navbar');

    if (!menuBackground && scrollPosition > 0) {
        menuBackground = true;
        menu.addClass('withBackground');
    }

    if (menuBackground && scrollPosition === 0) {
        menuBackground = false;
        menu.removeClass('withBackground');
    }
}  
</script>
@endsection
