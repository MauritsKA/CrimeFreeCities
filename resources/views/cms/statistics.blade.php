@extends('cms.layouts.master')

@section('title')
<h1 class="h2">Statistics</h1>
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


<form id="upload-form" method="POST" action="{{ url('dashboard/statistics')}}" enctype="multipart/form-data">
{{ csrf_field() }}

    <div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="nlsummary">Feitje</label>
            <textarea class="form-control" id="nlsummary"  name="nlsummary"  rows="5" placeholder="" value="{{ old('fact') }}" required></textarea>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="form-group">
            <label for="ensummary">Fact)</label>
            <textarea class="form-control" id="ensummary"  name="ensummary"  rows="5" placeholder="" value="{{ old('fact') }}" required></textarea>
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
            <th style="text-align:center">text</th>
            <th style="min-width:15px; max-width:15px;"></th>
            <th style="min-width:15px; max-width:15px;"></th>
        </tr>
    </thead>
                
    <tbody> 
        @foreach($facts as $fact)
        <tr>
            <td style="vertical-align:middle; text-align:center;">{{$fact->content}}</td>

             <td style="vertical-align:middle"><a onclick="fillform('{{$fact->id}}')" class="btnextra"><span data-feather="edit-2"></a></td>
            <td style="vertical-align:middle"><a onclick="contentDelete('{{$fact->id}}')" role="button" class="btnextra"><span data-feather="trash-2"></a></td>

        </tr>  
        @endforeach                      
    </tbody>
                
</table>
</div>

@endsection

@section('scripts')
<script>
function fillform(id){
    clearform()

    $('#upload-form').prop('action', '{{ url('dashboard/statistics')}}/edit/'+id);
    $("#add").text("Edit");

    $.get('{{url('/dashboard/facts')}}', function(response){
    if(response.success){

        responsedata = response;

        var fact = responsedata.facts.find(item=> item.id == id)
     
        $('#fact').html(fact.content);
    }
  }, 'json');
} 

function clearform(){
    $("#upload-form")[0].reset();
    $('#fact').html("");
    $("#add").text("Add");
    $('#upload-form').prop('action', '{{ url('dashboard/statistics')}}');
  
  return false; 
};

function contentDelete(id){
var url = '{{url('/')}}/dashboard/statistics/delete';

var check = confirm('Are you sure to delete this item?');
    if(check){
        window.location.href = url+'/'+id; 
   }
   return false;
};


</script> 
   
@endsection

   