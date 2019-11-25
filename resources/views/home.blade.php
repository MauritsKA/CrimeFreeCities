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
    <p class=" text-justify">{{__('home.projectcontent')}} (<a href='projects'>read more...</a>)</p>
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
      <p class=" text-justify">{{__('home.practicesBody')}}</p>
  </div>
</section>


<section class="statistics section">
   <div class="container">
   <a href='statistics'><h3>{{ucfirst(__('nav.statistics'))}}</h3></a>
   <div class="row">
     <div class="col-md-5 mr-auto" > 
      <p class=" text-justify">{{__('home.stats')}}</p>
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
    labels: [1,2,3,4,5],
    datasets: [{ 
        data: [1.95,1.95,2.54,2.84],
        label: "{{__('home.NE')}}",
        borderColor: "#3e95cd",
        fill: false,
        showLine: false
      }, { 
        data: [3.2, 3.2, 3.2, 3.3],     
        label: "{{__('home.S')}}",
        borderColor: "#8e5ea2",
        fill: false,
        showLine: false
      }, { 
        data: [2.09, 2.09, 2.17, 2.17, 3.87],
        label: "{{__('home.W')}}",
        borderColor: "#3cba9f",
        fill: false,
        showLine: false
      }, { 
        data: [2.2, 2.2, 2.47, 2.99, 3.87],
        label: "{{__('home.Nat')}}",
        borderColor: "#8fb72c",
        fill: false
      }
    ]
  },
  options: {
      scales: {
         xAxes: [{
          display: true,
          scaleLabel: {
            display: true,
            labelString: '{{__('home.xlabel')}}'
          }
        }],
        yAxes: [{
          display: true,
          scaleLabel: {
            display: true,
            labelString: '{{__('home.ylabel')}}'
          },
          ticks: {
            beginAtZero: true,
            steps: 5,
            stepValue: 1,
            max: 5.01
          }
      }]
      },
      title: {
      display: true,
      text: '{{__('home.plotTitle')}}'
    }
  }
});


// var myLineChart = Chart.Scatter(canvas,{
//       data: {
//         labels: [['Emmen','Ede','Zwolle','Apeldoorn','Deventer','Leeuwarden','Enschede','Groningen','Nijmegen','Arnhem'],
//                 ['Tilburg','Venlo','Breda','Den Bosch','Maastricht','Eindhoven'],
//                 ['Haarlemmermeer','Zaanstad','Leiden','Zoetermeer','Amersfoort','Delft','Almere','Haarlem','Dordrecht','Alkmaar','Den Haag','Rotterdam','Utrecht','Amsterdam']],
//         datasets: [{
//             label: '{{__('home.NE')}}',
//             data: [{x: 1, y: 1}, {x: 1, y: 1}, {x: 2, y: 1}, {x: 3, y: 2}, {x: 1, y: 2}, {x: 1, y: 3}, {x: 3, y: 3}, {x: 4, y: 4}, {x: 4, y: 4}, {x: 3, y: 5}],
//             borderColor: "#3e95cd",
//             }, {
//             label: '{{__('home.S')}}',
//             data: [{x: 4, y: 3}, {x: 1, y: 4}, {x: 4, y: 4}, {x: 3, y: 5}, {x: 2, y: 5}, {x: 4, y: 5}],
//             borderColor: "#8e5ea2",
//             }, {
//             label: '{{__('home.W')}}',
//             data: [{x: 143000, y: 1}, {x: 152678, y: 1}, {x: 122612, y: 1}, {x: 124300, y: 1}, {x: 154500, y: 2}, {x: 101500, y: 2}, {x: 198145, y: 2}, {x: 158123, y: 2}, {x: 118783, y: 3}, {x: 107300, y: 3}, {x: 520697, y: 4}, {x: 629148, y: 5}, {x: 338986, y: 5}, {x: 834713, y: 5}],
//             borderColor: "#3cba9f",
//             }]
//     },
//    options: {
//     tooltips: {
//      callbacks: {
//         label: function(tooltipItem, data) {
//            //var label = data.labels[tooltipItem.index][tooltipItem.datasetIndex];
//            var label = data.labels[tooltipItem.datasetIndex][tooltipItem.index];
//            return label +': (' + tooltipItem.xLabel + ', ' + tooltipItem.yLabel + ')';
//         }
//       }
//     }, 
//     scales: {
//          xAxes: [{
//           display: true,
//           scaleLabel: {
//             display: true,
//             labelString: '{{__('home.xlabel')}}'
//           }
//         }],
//         yAxes: [{
//           display: true,
//           scaleLabel: {
//             display: true,
//             labelString: '{{__('home.ylabel')}}'
//           },
//           ticks: {
//             beginAtZero: true,
//             steps: 5,
//             stepValue: 1,
//             max: 5.01
//           }
//       }]
//       },
//    title: {
//       display: true,
//       text: '{{__('home.plotTitle')}}'
//     }
//   }
// });





</script>


@endsection
