<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Session;

class HomeController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('setlocale');
    }

    
    public function index()
    {
        return view('home');
    }

    public function locale()
    {

        $locale = request('locale');
        
        App::setLocale($locale);
        session(['locale' => $locale]);
        return back();
    }
}
