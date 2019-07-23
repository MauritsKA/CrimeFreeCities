@extends('layouts.master')

@section('content')


<section class="topcover">
  <div class="topcoveroverlay"></div>
</section>

<section class="introsection">
   <div class="container">
   <h1>{{ucfirst(__('nav.practices'))}}</h1>
  </div>
</section>

<section class="statistics section">
   <div class="container" style="text-align: left;">
    @foreach($practices as $practice)
 <div class="markdowndiv">  <?php echo parsedown( $practice->texts()->get()->where('type','summary')->where('lang',Session::get('locale'))->pluck('content')->first() ); ?> </div>
   @endforeach
  </div>
</section>


@endsection
