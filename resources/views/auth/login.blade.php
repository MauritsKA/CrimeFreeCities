@extends('cms.layouts.master')

@section('css')
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endsection

@section('content')

 <body class="text-center">
    <form class="form-signin" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
      <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
        
      <input type="email" id="email" name="email" value="{{ old('email') }}"  class="form-control" placeholder="Email address" required autofocus>
        
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
        
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
        
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>

@endsection
     
     