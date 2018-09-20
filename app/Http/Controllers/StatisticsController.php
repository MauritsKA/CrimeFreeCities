<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Session;
use App\Statistic;
use App\Text;

class StatisticsController extends Controller
{
      public function __construct()
    {
        $this->middleware('setlocale');
        $this->middleware('auth')->except('display');
    }

      public function display()
    {
        $facts = Statistic::orderBy('created_at', 'desc')->get();
        return view('statistics', compact('facts'));
    }

    public function index()
  	{
  		$facts = Statistic::orderBy('created_at', 'desc')->get();
    	return view('cms.statistics', compact('facts'));
  	}

  	   public function add()
    {	
      $fact = Statistic::create([ ]);

      $nlsummary = Text::create([
              'lang' => 'nl',
              'type' =>  'summary',
              'content' => request('nlsummary'),
      ]);
      $fact->texts()->attach($nlsummary->id);

      $ensummary = Text::create([
              'lang' => 'en',
              'type' =>  'summary',
              'content' => request('ensummary'),
      ]);
      $fact->texts()->attach($ensummary->id);

      return redirect()->back()->withInput()->with('status', "Succesfully added fact");  
    }

     public function edit(Statistic $statistic)
    { 
      $texts = $statistic->texts;

      foreach($texts as $text){
      $lang = $text->lang;
      $type = $text->type;

      if($lang == "en" && $type == "summary"){ $text->update([ 'content' => request('ensummary') ]); } 
      if($lang == "nl" && $type == "summary"){ $text->update([ 'content' => request('nlsummary') ]); }
      }
    
    return back()->with('status', 'Succes!'); 
 
  }

   public function delete(Statistic $statistic)
    {

      $statistic->delete();
     
      return back()->with('status', 'Succes!');
    }


}
