@extends('cms.layouts.master')

@section('css')
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endsection

@section('content')

 <body class="text-center">
    <form class="form-signin" method="POST" action="{{ route('password.request') }}">
    {{ csrf_field() }}

      <input type="hidden" name="token" value="{{ $token }}">

      <img class="mb-4" src="{{url('/images/favicon.png')}}" alt="" width="72" height="72">
        
      <h1 class="h3 mb-3 font-weight-normal">Reset password</h1>

       @if (session('status'))
        <div class="alert alert-success">
        {{ session('status') }}
        </div>
       @endif

      <label for="inputEmail" class="sr-only">Email address</label>        
      <input type="email" id="email" name="email" value="{{ $email or old('email') }}"  class="form-control" placeholder="Email address" required autofocus>
        
      <label for="inputPassword" class="sr-only">Password</label>
      <input style="margin-bottom: 0px;" type="password" id="password" name="password" class="form-control" placeholder="Password" required>

        <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="password-confirm" name="password_confirmation" class="form-control" placeholder="Re-enter Password" required>
           
    @if ($errors->has('email'))
    <span class="help-block">
    <strong>{{ $errors->first('email') }}</strong>
    </span>
    @endif
        
     @if ($errors->has('password'))
    <span class="help-block">
    <strong>{{ $errors->first('password') }}</strong>
    </span>
    @endif

    @if ($errors->has('password_confirmation'))
    <span class="help-block">
    <strong>{{ $errors->first('password_confirmation') }}</strong>
    </span>
    @endif
      
      <button class="btn btn-lg btn-primary btn-block" type="submit">Reset Password </button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>

@endsection
     
     