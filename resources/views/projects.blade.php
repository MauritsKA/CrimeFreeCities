@extends('layouts.master')

@section('content')


<section class="topcover">
  <div class="topcoveroverlay"></div>
</section>    

<section class="introsection">
   <div class="container">
   <h1>{{ucfirst(__('nav.projects'))}}</h1>
  </div>
</section>

<section class="projectoverview section">
   <div class="container">
  
      @foreach($projects as $project)
      <div class="{{$project->id % 2 == 0 ? 'even' : 'odd'}}">

        <h3>{{ $project->texts()->get()->where('type','title')->where('lang',Session::get('locale'))->pluck('content')->first()}}</h3>
        <div class="row">
          <div class="profile col-sm-4"><img class="img-fluid" src="{{url('/images')}}/{{$project->image()->get()->pluck('url')->first()}}" ></div>
          <div class="description col-sm-8" style="   text-align: left;">
          <p> <?php echo parsedown( $project->texts()->get()->where('type','summary')->where('lang',Session::get('locale'))->pluck('content')->first() ); ?> </p>
          </div>
        </div>

      </div>
      @endforeach   

  </div>
</section>


@endsection
