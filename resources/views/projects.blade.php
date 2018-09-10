@extends('layouts.master')

@section('content')


<section class="topcover">
  <div class="topcoveroverlay"></div>
</section>

                   
            

<section class="practices section">
   <div class="container">
   <h3>Projects</h3>
    <p>A useful supportive approach to crime prevention should be mentioned here as well: Crime Prevention Through Environmental Design (CPTED).  CPTED means: investing in the quality of the urban environment, improving the possibilities for natural surveillance at the same time. Crime free spaces contribute to crime free cities. Different stakeholders, such as housing associations, project developers and transport companies can work together with the city government in the CPTED approach.
    Seeing their environment improve, the confidence of people in their city government increases. CPTED encourages  people to keep their own neighbourhood safe.  
    </p>
  </div>
</section>

<section class="statistics section">
   <div class="container">
  
      @foreach($projects as $project)

        <h3>{{ $project->texts()->get()->where('type','title')->where('lang',Session::get('locale'))->pluck('content')->first()}}</h3>
        <div class="row">
          <div class="profile col-sm-4"><img class="img-fluid" src="{{url('/images')}}/{{$project->image()->get()->pluck('url')->first()}}" ></div>
          <div class="description col-sm-8">
          <p>{{   $project->texts()->get()->where('type','summary')->where('lang',Session::get('locale'))->pluck('content')->first()}}</p>
          </div>
        </div>
        
      @endforeach   

  </div>
</section>


@endsection
