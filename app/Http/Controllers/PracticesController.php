<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Practice;
use App\Text;

class PracticesController extends Controller
{
    public function __construct()
    {
        $this->middleware('setlocale');
        $this->middleware('auth')->except('display');
    }

       public function display()
    {
    	$practices = Practice::orderBy('created_at', 'desc')->get();
        return view('practices', compact('practices'));
    }

     public function index()
  	{
  		$practices = Practice::orderBy('created_at', 'desc')->get();
    	return view('cms.practices', compact('practices'));
  	}

  	   public function add()
    {	
    	$practices = Practice::orderBy('created_at', 'desc')->get();
    	$count = count($practices);
    	if($count > 0){
    		return redirect()->back()->withInput()->with('alert', "You can only add one practices section"); 
    	}

    	if(request('ensummary') == null){
    		return redirect()->back()->withInput()->with('alert', "You have to fill in all languages"); 
    	}

    	if(request('nlsummary') == null){
    		return redirect()->back()->withInput()->with('alert', "You have to fill in all languages"); 
    	}

        $practice = Practice::create([ ]);

	    $nlsummary = Text::create([
	            'lang' => 'nl',
	            'type' =>  'summary',
	            'content' => request('nlsummary'),
	    ]);
	    $practice->texts()->attach($nlsummary->id);

	    $ensummary = Text::create([
	            'lang' => 'en',
	            'type' =>  'summary',
	            'content' => request('ensummary'),
	    ]);
	    $practice->texts()->attach($ensummary->id);

    	return redirect()->back()->withInput()->with('status', "Succesfully added practices"); 
    }

    public function edit(Practice $practice)
    { 

      $texts = $practice->texts;

      foreach($texts as $text){
      $lang = $text->lang;
      $type = $text->type;

      if($lang == "en" && $type == "summary"){ $text->update([ 'content' => request('ensummary') ]); } 
      if($lang == "nl" && $type == "summary"){ $text->update([ 'content' => request('nlsummary') ]); }
  	  }
    
    return back()->with('status', 'Succes!'); 

  	}

   public function delete(Practice $practice)
    {

      $texts = $practice->texts()->delete();
     
      $practice->delete(); 
     
      return back()->with('status', 'Succes!');
    }

}
