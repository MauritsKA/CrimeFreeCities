<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Session;
use App\Publication;

class PublicationsController extends Controller
{
      public function __construct()
    {
        $this->middleware('setlocale');
    }

       public function display()
    {
        return view('publications');
    }

      	public function index()
    {
    	$publications = Publication::orderBy('created_at', 'desc')->get();
        return view('cms.publications', compact('publications'));
    }
}
