@extends('layouts.master')

@section('content')


<section class="topcover">
  <div class="topcoveroverlay"></div>
</section>

<!-- <section class="practices section">
   <div class="container">
   <h3>Practices</h3>
    <p>A useful supportive approach to crime prevention should be mentioned here as well: Crime Prevention Through Environmental Design (CPTED).  CPTED means: investing in the quality of the urban environment, improving the possibilities for natural surveillance at the same time. Crime free spaces contribute to crime free cities. Different stakeholders, such as housing associations, project developers and transport companies can work together with the city government in the CPTED approach.
    Seeing their environment improve, the confidence of people in their city government increases. CPTED encourages  people to keep their own neighbourhood safe.  
    </p>
  </div>
</section> -->

<section class="statistics section">
   <div class="container">
    @foreach($practices as $practice)
   <?php echo parsedown( $practice->texts()->get()->where('type','summary')->where('lang',Session::get('locale'))->pluck('content')->first() ); ?> 
   @endforeach
  </div>
</section>


@endsection
