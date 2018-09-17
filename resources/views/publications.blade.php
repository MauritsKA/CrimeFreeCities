@extends('layouts.master')

@section('content')


<section class="topcover">
  <div class="topcoveroverlay"></div>
</section>    

<section class="publicationintro section">
   <div class="container">
   <h3>publications</h3>
    <p>Een intro voor de publication sessies, met uitleg wat er in staat en hoe het verdeeld is, met misschien een kleine algemene uitleg over de soort publicationen die je doet. 
    </p>
  </div>
</section>

<section class="publicationoverview section">
   <div class="container">
  
      @foreach($publications as $publication)
      <div class="{{$publication->id % 2 == 0 ? 'even' : 'odd'}}">

        <h3>{{ $publication->texts()->get()->where('type','title')->where('lang',Session::get('locale'))->pluck('content')->first()}} <a href="{{url('download')}}/{{$publication->id}}"><span data-feather="download"></a></h3>
        <div class="row">
          <div class="profile col-sm-4"><img class="img-fluid" src="{{url('/images')}}/{{$publication->image()->get()->pluck('url')->first()}}" ></div>
          <div class="description col-sm-8">
            <p> <?php echo parsedown( $publication->texts()->get()->where('type','summary')->where('lang',Session::get('locale'))->pluck('content')->first() ); ?> </p>
          </div>
        </div>

      </div>
      @endforeach   

  </div>
</section>


@endsection
