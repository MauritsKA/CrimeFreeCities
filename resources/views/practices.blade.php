@extends('layouts.master')

@section('content')


<section class="topcover">
  <div class="topcoveroverlay"></div>
</section>

<section class="practices section">
   <div class="container">
    @foreach($practices as $practice)
   <?php echo parsedown( $practice->texts()->get()->where('type','summary')->where('lang',Session::get('locale'))->pluck('content')->first() ); ?> 
   @endforeach
  </div>
</section>


@endsection
