<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CrimeFreeCities') }}</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    
    <!-- Styles -->
    <link href="{{ asset('css/cms.css?')}}{{rand(1,100)}}" rel="stylesheet">
    @yield('css')
        
</head>
  
@section('content')
<body>
    
<div class="container-fluid">
<div class="row">
       
    @include('cms.layouts.nav')
          
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">

        @yield('title')
                  
        <a class="btn btn-outline-secondary logoutnocollapse" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
       {{__('dashboard.logout')}}   <span data-feather="log-out"></span></a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> {{ csrf_field() }} </form>

    </div>  

    @include('cms.layouts.navcollapsed')

@show
        
</main>
</div>
</div> 



@yield('scripts')
    
@include('cms.layouts.footer')

        
