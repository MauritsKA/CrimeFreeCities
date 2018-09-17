<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Session;
use App\Statistic;

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

      return redirect()->back()->withInput()->with('status', "Succesfully added practices"); 

    	 if(request('fact') != null){

    	 $fact = request('fact');

        $fact_data = Statistic::create([
            'content' => $fact,
        ]);
    		return redirect()->back()->withInput()->with('status', "Succesfully added fact");
    	} else {
    		return redirect()->back()->withInput()->with('alert', "You should add text");
    	}	 
    }

     public function edit(Statistic $statistic)
    { 
    	if(request('fact') != null){
    	$fact = request('fact');

        Statistic::find($statistic->id)->update(['content'=>$fact]);
 
     	return redirect()->back()->withInput()->with('status', "Succesfully changed fact");

    	} else {
    		return redirect()->back()->withInput()->with('alert', "You should add text");
    	}	 
 
  }

   public function delete(Statistic $statistic)
    {

      $statistic->delete();
     
      return back()->with('status', 'Succes!');
    }


}
