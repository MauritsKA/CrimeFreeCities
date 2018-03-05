<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Session;

class Dashboardcontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('setlocale');
    }

    public function index()
    {
        return view('cms.dashboard');
    }

}
