@extends('cms.layouts.master')

@section('title')
<h1 class="h2">Dashboard</h1>
@endsection

@section('content')
@parent
<form id="upload-form" method="POST" action="{{url('balances/create')}}">
{{ csrf_field() }}

  <textarea id="TextEditor"></textarea>
  <!-- <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{ old('name') }}" required> -->
  <button  type="submit" value="Upload" class="btn btn-primary">Create!</button>
        
</form>
@endsection

@section('scripts')
<script>
var simplemde = new SimpleMDE({ 
    element: document.getElementById("TextEditor"),
    spellChecker: false,
    autosave: {
      enabled: true,
      uniqueId: "Markdown1",
      delay: 10000,
    }
});
</script>   
@endsection

   



