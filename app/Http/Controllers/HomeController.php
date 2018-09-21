<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Session;
use App\Publication;
use App\Statistic;

class HomeController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('setlocale');
    }

    
    public function display()
    {
        $extension = pathinfo($_SERVER['SERVER_NAME'], PATHINFO_EXTENSION);
    
        if($extension == "com"){
         session(['locale' => "en"]);
        }

        if($extension == "nl"){
         session(['locale' => "nl"]);
        }

        $facts = Statistic::orderBy('created_at', 'desc')->get();
        $publications = Publication::orderBy('created_at', 'desc')->get();
        return view('home', compact('publications','facts'));
    }

    public function locale()
    {

        $locale = request('locale');
        
        App::setLocale($locale);
        session(['locale' => $locale]);
        return back();
    }
}
