<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Session;
use App\Text;

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

    public function texts()
    {    
     
        $texts = Text::with('publications','projects')->get()->all();

        return response()->json(['success' => true, 'texts' => $texts]);
    }

}
