<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Session;

class Dashboardcontroller extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('setlocale');
    }

    public function index()
    {
        //App::setLocale('nl');
         //dd(App::getLocale());
        return view('cms.dashboard');
        
    }
    
    public function locale()
    {

        $locale = request('locale');
        
        App::setLocale($locale);
        session(['locale' => $locale]);
        return back();
    }
}
