@extends('layouts.master')

@section('content')
<a id="top"></a>
<div class="cover">
<div class="coveroverlay">
  <div class="container">

    <h1>{{ucfirst(__('home.title1'))}}<span> {{ucfirst(__('home.title2'))}}</span> {{ucfirst(__('home.title3'))}} <span>{{ucfirst(__('home.title4'))}}</span></h1>


    <div id="covercarousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">

        <?php $counter = 0; ?>
        @foreach($facts as $fact)
          <div class="carousel-item {{$counter == 0 ? 'active' : ''}}">
            <div class="pslide"><p class="d-block w-60" alt="{{$fact->id}} slide">{{   $fact->texts()->get()->where('type','summary')->where('lang',Session::get('locale'))->pluck('content')->first()}}</p></div>
          </div>
        <?php $counter++; ?>  
        @endforeach

      </div>
      <a class="carousel-control-prev" href="#covercarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#covercarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

  </div>
</div>
</div>

<section class="projects section">
   <div class="container">
   <a href='projects'><h3>Project {{__('home.projecttitle')}}</h3></a>
    <p>{{__('home.projectcontent')}} (<a href='projects'>read more...</a>)</p>
  </div>
</section>

<section class="publications section">

   <div class="container">
    <a href='publications'><h3>{{ucfirst(__('nav.publications'))}}</h3></a>
  <!-- Slider main container -->
    <div class="swiper-container">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            @foreach($publications as $publication)
            <div class="swiper-slide"> <a href="" data-toggle="modal" data-target="#testModal{{$publication->id}}"><img src="{{url('/images')}}/{{$publication->image->url}}" class="img-responsive"></a></div>
            @endforeach
        
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>
     
        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev swiper-button-black"></div>
        <div class="swiper-button-next swiper-button-black"></div>
     
        <!-- If we need scrollbar -->
     <!--    <div class="swiper-scrollbar"></div> -->
    </div>
</section>

<section class="practices section">
   <div class="container">
   <a href='practices'><h3>{{ucfirst(__('nav.practices'))}}</h3></a>
   <div class="row">
     <div class="col-md-6" > 
     <h5>Creating confidence</h5> 
      <p class=" text-justify">The central theme in all approaches to crime prevention is, in my vison, confidence. People in neighbourhoods should be able to trust each other as well as their city government and their local police force. Government and police should be rooted steadily into the neighbourhoods. 
      In the city centre and in industrial zones, local entrepreneurs should take confidence  in their government and prevent crime together. Tailor made public private partnerships should emerge, in which all stakeholders invest in crime prevention, according to their possibilities. 
      </p>
    </div>
      <div class="col-md-6 ">  
        <h5>Crime Prevention Through Environmental Design</h5> 
        <p class="text-justify">A useful supportive approach to crime prevention should be mentioned here as well: Crime Prevention Through Environmental Design (CPTED).  CPTED means: investing in the quality of the urban environment, improving the possibilities for natural surveillance at the same time. Crime free spaces contribute to crime free cities. Different stakeholders, such as housing associations, project developers and transport companies can work together with the city government in the CPTED approach. Seeing their environment improve, the confidence of people in their city government increases. CPTED encourages  people to keep their own neighbourhood safe.  
        </p>
    </div>
   </div>
  </div>
</section>

<section class="statistics section">
   <div class="container">
   <a href='statistics'><h3>{{ucfirst(__('nav.statistics'))}}</h3></a>
   <div class="row">
     <div class="col-md-5 mr-auto" > 
      <p class=" text-justify">Crime is concentrated mainly in cities. In the Netherlands, for example, the chance of becoming a victim of a crime such as burglary or robbery in urbanised areas is 2-5 times higher than in rural areas (see ‘statistics’ for more information). Crime prevention is most urgent in urbanised areas. For this reason, the content of this website is focused  on crime prevention in cities with a population of 75.000 and more.
      </p>
    </div>
      <div class="col-md-6 "> 
       <canvas id="myChart" width="400" height="300"></canvas>
        </p>
    </div>
   </div>
  
  </div>
</section> 


<!-- Modals -->

@foreach($publications as $publication)
  <div class="modal fade" id="testModal{{$publication->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$publication->texts()->get()->where('type','title')->where('lang',Session::get('locale'))->pluck('content')->first()}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="row">
          <div class="profile col-sm-4"><img class="img-fluid" src="{{url('/images')}}/{{$publication->image()->get()->pluck('url')->first()}}" ></div>
          <div class="description col-sm-8">
            <p> <?php echo parsedown( $publication->texts()->get()->where('type','summary')->where('lang',Session::get('locale'))->pluck('content')->first() ); ?> </p>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <a href="{{url('download')}}/{{$publication->id}}"><span data-feather="download"></a>
      </div>
    </div>
  </div>
</div>       
@endforeach


<script>
var swiper = new Swiper('.swiper-container', {
      slidesPerView: 3,
      spaceBetween: 30,
      slidesPerGroup: 3,
      loop: true,
       // init: false,
      // pagination: {
      //   el: '.swiper-pagination',
      //   clickable: true,
      // },
      breakpoints: {
        1024: {
          slidesPerView: 3,
          spaceBetween: 40,
          slidesPerGroup: 3,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 30,
          slidesPerGroup: 2,
        },
        640: {
          slidesPerView: 1,
          spaceBetween: 20,
          slidesPerGroup: 1,
        }
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  
// create line chart
Chart.defaults.global.elements.line.ShowLine = false;

var canvas = document.getElementById('myChart');

var myLineChart = Chart.Line(canvas,{
  data: {
    labels: [1500,1600,1700,1750,1800,1850,1900,1950,1999,2050],
    datasets: [{ 
        data: [86,114,106,106,107,111,133,221,783,2478],
        label: "Africa",
        borderColor: "#3e95cd",
        fill: false,
        showLine: false
      }, { 
        data: [282,350,411,502,635,809,947,1402,3700,5267],
        label: "Asia",
        borderColor: "#8e5ea2",
        fill: false,
        showLine: false
      }, { 
        data: [168,170,178,190,203,276,408,547,675,734],
        label: "Europe",
        borderColor: "#3cba9f",
        fill: false,
        showLine: false
      }, { 
        data: [40,20,10,16,24,38,74,167,508,784],
        label: "Latin America",
        borderColor: "#e8c3b9",
        fill: false,
        showLine: false
      }, { 
        data: [6,3,2,2,7,26,82,172,312,433],
        label: "North America",
        borderColor: "#c45850",
        fill: false,
        showLine: false
      },
      { 
        data:  [120,130,160,192,220,250,310,430,920,2078],
        label: "Mean",
        borderColor: "#8fb72c",
        fill: false
      }
    ]
  },
  options: {
    title: {
      display: true,
      text: 'World population per region (in millions)'
    }
  }
});

</script>

@endsection
