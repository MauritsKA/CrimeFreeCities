@extends('cms.layouts.master')

@section('title')
<h1 class="h2">{{ucfirst(__('cmsnav.images'))}}</h1>
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


<form id="upload-form" method="POST" action="{{ url('dashboard/images')}}" enctype="multipart/form-data">
{{ csrf_field() }}

    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="label">Label</label>
                <input type="text" class="form-control" id="label" name="label" placeholder="" value="{{ old('label') }}" required>
            </div>
        </div>

        <div class="col">
            <div class="form-group">
                <label>Add image</label><br>
                <label class="btn-file">
                <input accept="image/*" type="file" name="image" id="image" data-max-size="2097152"></label>
            </div>
        </div>
    </div>
<button type="submit" value="Upload" class="btn btn-secondary">Add</button>
</form>

<br>

<div class="table-responsive">
<table class="table table-hover">
    <thead>
        <tr>
            <th style="min-width:80px; max-width:80px;"></th>
            <th style="text-align:center">Label</th>
            <th style="text-align:center">url</th>
            <th style="min-width:15px; max-width:15px;"></th>
            <th style="min-width:15px; max-width:15px;"></th>
        </tr>
    </thead>
                
    <tbody> 
        @foreach($images as $image)
        <tr>
            <td onclick="document.location.href='{{url('/images')}}/{{$image->url}}';return false;" class="btnextra">

           <div class='image_thumbnails' style="background: url('{{url('/images')}}/{{$image->url}}') no-repeat center center;
                background-size: cover;
                -webkit-background-size: cover;
                -moz-background-size: cover; 
                -o-background-size: cover;"></div></td>
            <td style="vertical-align:middle; text-align:center;">{{$image->label}}</td>
            <td style="vertical-align:middle; text-align:center;"><span class="imgurl{{$image->id}}">{{url('/images')}}/{{$image->url}}</span></td>

              <td style="vertical-align:middle"><a onclick="contentEdit('{{$image->id}}','{{$image->label}}')" class="btnextra"><span data-feather="edit-2"></a></td>
                <td style="vertical-align:middle"><a onclick="contentDelete('{{$image->id}}','{{$image->label}}')" role="button" class="btnextra"><span data-feather="trash-2"></a></td>

        </tr>  
        @endforeach                      
    </tbody>
                
</table>
</div>

@endsection


@section('scripts')
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

 // Balance
function contentEdit(imgid,label){
   
}    

// Balance
function contentDelete(mutid, url){
       
var check = confirm('Are you sure to delete this item?');
    if(check){
        window.location.href = url; 
   }
   return false;
};



// var simplemde = new SimpleMDE({ 
//     element: document.getElementById("TextEditor"),
//     spellChecker: false,
//     autosave: {
//       enabled: true,
//       uniqueId: "Markdown1",
//       delay: 10000,
//     }
// });
</script>   
@endsection

   