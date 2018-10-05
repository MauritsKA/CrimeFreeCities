@extends('layouts.master')

@section('content')


<section class="topcover">
  <div class="topcoveroverlay"></div>
</section>    

<section class="introsection">
   <div class="container">
   <h1>{{ucfirst(__('nav.publications'))}}</h1>
  </div>
</section>

<section class="publicationoverview section">
   <div class="container">
  
      @foreach($publications as $publication)
      <div class="{{$publication->id % 2 == 0 ? 'even' : 'odd'}}">

        <h3>{{ $publication->texts()->get()->where('type','title')->where('lang',Session::get('locale'))->pluck('content')->first()}} <a href="{{url('download')}}/{{$publication->id}}"><span data-feather="download"></a></h3>
        <div class="row">
          <div class="profile col-sm-4"><img class="img-fluid" src="{{url('/images')}}/{{$publication->image()->get()->pluck('url')->first()}}" ></div>
          <div class="description col-sm-8" style="text-align: left;">
            <p> <?php echo parsedown( $publication->texts()->get()->where('type','summary')->where('lang',Session::get('locale'))->pluck('content')->first() ); ?> </p>
          </div>
        </div>

      </div>
      @endforeach   

  </div>
</section>


@endsection
