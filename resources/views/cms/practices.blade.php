@extends('cms.layouts.master')

@section('title')
<h1 class="h2">Practices</h1>
@endsection

@section('content')
@parent


 @if (session('alert'))
    <div class="col-sm-6 alert alert-warning">
    {{ session('alert') }}
    </div>
@endif

@if (session('status'))
    <div class="col-sm-6 alert alert-success">
    {{ session('status') }}
    </div>
@endif


<form id="upload-form" method="POST" action="{{ url('dashboard/practices')}}" enctype="multipart/form-data">
{{ csrf_field() }}

<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="nlsummary">Werkwijzen (NL)</label>
            <textarea class="form-control" id="nlsummary"  name="nlsummary"  rows="5" placeholder="Samenvatting" required></textarea>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="form-group">
            <label for="ensummary">Practices (EN)</label>
            <textarea class="form-control" id="ensummary"  name="ensummary"  rows="5" placeholder="Summary" required></textarea>
        </div>
    </div>
</div>

<button id="add" type="submit" value="Upload" class="btn btn-secondary {{$practices != null ? 'notnull' : 'null'}}">Add</button> &nbsp; <a class="btn btn-secondary" href="" onclick="clearform();return false;" role="button">Clear</a>
</form>

<br>

@foreach($practices as $practice)
<a onclick="fillform('{{$practice->id}}')" class="btnextra"><span data-feather="edit-2"></a>
<a onclick="contentDelete('{{$practice->id}}')" role="button" class="btnextra"><span data-feather="trash-2"></a> 

<p><?php echo parsedown( $practice->texts()->get()->where('type','summary')->where('lang',Session::get('locale'))->pluck('content')->first() ); ?> </p>
@endforeach

@endsection

@section('scripts')

<script>
    
var nlsummarymde = new SimpleMDE({ 
    element: document.getElementById("nlsummary"),
    spellChecker: false,
    autosave: {
      enabled: true,
      uniqueId: "nlsummary",
      delay: 10000,
    }
});

var ensummarymde = new SimpleMDE({ 
    element: document.getElementById("ensummary"),
    spellChecker: false,
    autosave: {
      enabled: true,
      uniqueId: "ensummary",
      delay: 10000,
    }
});
</script> 

<script>
function clearform(){
    $("#upload-form")[0].reset();
    $("#add").text("Add");
    $('#upload-form').prop('action', '{{ url('dashboard/practices')}}');
    nlsummarymde.value("");
    ensummarymde.value("");
  return false; 
};

function contentDelete(id){
var url = '{{url('/')}}/dashboard/practices/delete';

var check = confirm('Are you sure to delete this item?');
    if(check){
        window.location.href = url+'/'+id; 
   }
   return false;
};

// Call AJAX and update overviews
function fillform(id){
    clearform()

    $('#upload-form').prop('action', '{{ url('dashboard/practices')}}/edit/'+id);
    $("#add").text("Edit");

    $.get('{{url('/dashboard/texts')}}', function(response){
    if(response.success)
        
    responsedata = response;


     var practicedata = $.grep(responsedata.texts, function (element) {    
        if(element.practices != undefined){
            if(element.practices[0] != undefined){
                return element.practices[0].id == id;
            }
        }
    });

    for(i=0; i<practicedata.length; i++){
        var lang = practicedata[i].lang
        var type = practicedata[i].type
        $('#'+lang + type).val(practicedata[i].content);

        if( practicedata[i].content != null ){
            if(lang == "nl" && type == "summary"){
            nlsummarymde.value(practicedata[i].content);
            }

            if(lang == "en" && type == "summary"){
            ensummarymde.value(practicedata[i].content);
            }
        }

    }

  }, 'json');
}

</script>   
@endsection

   