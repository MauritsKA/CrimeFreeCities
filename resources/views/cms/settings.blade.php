@extends('cms.layouts.master')

@section('title')
<h1 class="h2">Settings</h1>
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

<h5>Hi {{ $user->name}}, </h5>
<br>


<h5>Email</h5>
<p>{{ $user->email}}</p> 
<form class="form-inline" method="POST" id="emailform" action="{{ url('dashboard/settings/email')}}">
{{ csrf_field() }}  
        

<input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="email" name="email" placeholder="new email" required>    

<button type="submit" class="btn btn-secondary">Submit</button>
</form>
    
     @if ($errors->has('email'))
        <span class="help-block">
        {{ $errors->first('email') }}
        </span>
    @endif
<br>
    
<h5>Password</h5>    

<form class="form-inline" method="POST" id="passwordform" action="{{ url('dashboard/settings/password')}}">
{{ csrf_field() }}  

<input type="password" class="form-control mb-2 mr-sm-2 mb-sm-0" id="password" name="password" placeholder="new password" required>    

<input type="password" class="form-control mb-2 mr-sm-2 mb-sm-0" id="password_confirmation" name="password_confirmation" placeholder="confirm password" required>    

<button type="submit" class="btn btn-secondary">Submit</button>
</form>   
    
@if ($errors->has('password'))
        <span class="help-block">
        {{ $errors->first('password') }}
        </span>
@endif    

@endsection

@section('scripts')

@endsection

   

