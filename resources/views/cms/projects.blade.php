@extends('cms.layouts.master')

@section('title')
<h1 class="h2">{{ucfirst(__('cmsnav.projects'))}}</h1>
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


<form id="upload-form" method="POST" action="{{ url('dashboard/projects')}}" enctype="multipart/form-data">
{{ csrf_field() }}

   <div class="form-group">
        <label>Logo partner</label><br>
        <label class="btn-file">
        <input accept="image/*" type="file" name="image" id="image" data-max-size="2097152"></label>
    </div>


<div class="row">
     <div class="col-lg-6">
        <div class="form-group">
            <label>Titel (NL)</label><br>
            <input class="form-control" name="nltitle" id="nltitle" type="text" placeholder="Titel" maxlength="70">
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label>Title (EN)</label><br>
            <input class="form-control" name="entitle" id="entitle" type="text" placeholder="Title" maxlength="70">
        </div>
    </div>
</div> 

<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="nlsummary">Samenvatting (NL)</label>
            <textarea class="form-control" id="nlsummary"  name="nlsummary"  rows="5" placeholder="Samenvatting"></textarea>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="form-group">
            <label for="ensummary">Summary (EN)</label>
            <textarea class="form-control" id="ensummary"  name="ensummary"  rows="5" placeholder="Summary"></textarea>
        </div>
    </div>
</div>

<button id="add" type="submit" value="Upload" class="btn btn-secondary">Add</button> &nbsp; <a class="btn btn-secondary" href="" onclick="clearform();return false;" role="button">Clear</a>
</form>

<br>

<div class="table-responsive">
<table class="table table-hover">
    <thead>
        <tr>
            <th style="min-width:80px; max-width:80px;"></th>
            <th style="text-align:center">{{ucfirst(__('cmsnav.title'))}}</th>
            <th style="text-align:center">{{ucfirst(__('cmsnav.summary'))}}</th>
            <th style="min-width:15px; max-width:15px;"></th>
            <th style="min-width:15px; max-width:15px;"></th>
        </tr>
    </thead>
               

    <tbody> 
        @foreach($projects as $project)
        <tr>
            <td onclick="document.location.href='{{url('/images')}}/{{$project->image()->get()->pluck('url')->first()}}';return false;" class="btnextra">

           <div class='image_thumbnails' style="background: url('{{url('/images')}}/{{$project->image()->get()->pluck('url')->first()}}') no-repeat center center;
                background-size: cover;
                -webkit-background-size: cover;
                -moz-background-size: cover; 
                -o-background-size: cover;"></div></td>

            <td style="vertical-align:middle; text-align:center;">{{   $project->texts()->get()->where('type','title')->where('lang',Session::get('locale'))->pluck('content')->first()}}</td>
            <td style="vertical-align:middle; text-align:center;">{{   $project->texts()->get()->where('type','summary')->where('lang',Session::get('locale'))->pluck('content')->first()}}</td>

            <td style="vertical-align:middle"><a onclick="fillform('{{$project->id}}')" class="btnextra"><span data-feather="edit-2"></a></td>
            <td style="vertical-align:middle"><a onclick="contentDelete('{{$project->id}}')" role="button" class="btnextra"><span data-feather="trash-2"></a></td>

        </tr>  
        @endforeach                      
    </tbody>
                
</table>
</div>

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
 $(function(){
    $('#upload-form').submit(function(e){
        var fileInput = $('#image');
        var maxSize = fileInput.data('max-size');
        if(fileInput.get(0).files.length){
            var fileSize = fileInput.get(0).files[0].size; // in bytes
            if(fileSize>maxSize){
                alert('File size is more then 2 MB, please choose an other picture!');
                return false;
            }
        }
        
    });
});

$(function() {
 
});

function clearform(){
    $("#upload-form")[0].reset();
    $("#add").text("Add");
    $('#upload-form').prop('action', '{{ url('dashboard/projects')}}');
    nlsummarymde.value("");
    ensummarymde.value("");
  return false; 
};

function contentDelete(id){
var url = '{{url('/')}}/dashboard/projects/delete';

var check = confirm('Are you sure to delete this item?');
    if(check){
        window.location.href = url+'/'+id; 
   }
   return false;
};

// Call AJAX and update overviews
function fillform(id){
    clearform()

var projectid = 1
$.get('{{url('/dashboard/texts')}}', function(response){
if(response.success)
    
responsedata = response;

 var projectdata = $.grep(responsedata.texts, function (element) {    
    if(element.projects != undefined){
        if(element.projects[0] != undefined){
            return element.projects[0].id == id;
        }
    }
});

for(i=0; i<projectdata.length; i++){
    var lang = projectdata[i].lang
    var type = projectdata[i].type
    $('#'+lang + type).val(projectdata[i].content);

    if( projectdata[i].content != null ){
        if(lang == "nl" && type == "summary"){
        nlsummarymde.value(projectdata[i].content);
        }

        if(lang == "en" && type == "summary"){
        ensummarymde.value(projectdata[i].content);
        }
    }

}
 
  }, 'json');
}

</script>   
@endsection

   