<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{url('images/favicon.ico')}}" sizes="32x32" />

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="Reducing Crime Trough Effective Research on Urban Planning">
    <meta name="author" content="Maurits Korthals Altes">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.2.0/css/swiper.min.css" rel="stylesheet"> 

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.21.0/moment.min.js"></script>    
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.2/dist/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.2.0/js/swiper.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css?')}}{{rand(1,100)}}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    @yield('css')
</head>

<body>

 @include('layouts.nav')

 @yield('content')
    
 @include('layouts.footer')