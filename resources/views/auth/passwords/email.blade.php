@extends('cms.layouts.master')

@section('css')
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endsection

@section('content')

 <body class="text-center">
    <form class="form-signin" method="POST" action="{{ route('password.email') }}">
    {{ csrf_field() }}

      <img class="mb-4" src="{{url('/images/favicon.png')}}" alt="" width="72" height="72">

       @if (session('status'))
        <div class="alert alert-success">
        {{ session('status') }}
        </div>
        @endif
        
      <h1 class="h3 mb-3 font-weight-normal">Reset password</h1>

      <label for="inputEmail" class="sr-only">Email address</label>        
      <input type="email" id="email" name="email" value="{{ old('email') }}"  class="form-control" placeholder="Email address" required autofocus>
           
        <br>
    @if ($errors->has('email'))
    <span class="help-block">
    <strong>{{ $errors->first('email') }}</strong>
    </span>
    @endif


    <button type="submit" class="btn btn-primary"> Password Reset Link </button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>

@endsection
     

