<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PracticesController extends Controller
{
    public function __construct()
    {
        $this->middleware('setlocale');
    }

       public function display()
    {
        return view('practices');
    }

}
