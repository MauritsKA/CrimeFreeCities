<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatisticsController extends Controller
{
      public function __construct()
    {
        $this->middleware('setlocale');
    }

       public function index()
    {
        return view('statistics');
    }
}