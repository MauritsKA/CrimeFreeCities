<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Session;
use App\Project;
use App\Image;
use App\Text;

class ProjectsController extends Controller
{
      public function __construct()
    {
        $this->middleware('setlocale');
         $this->middleware('auth')->except('display');
    }

       public function display()
    {
    	$projects = Project::orderBy('created_at', 'desc')->get();

        return view('projects', compact('projects'));
    }

      	public function index()
    {
    	$projects = Project::orderBy('created_at', 'desc')->get();

        return view('cms.projects', compact('projects'));
    }

      public function add()
    {	

    	$project = Project::create([ ]);

    	$label = 'project'.$project->id;
       
    	if(request('image') != null){

	    	$image = request('image');

	    	if(filesize($image) >= 2097152){
	            return redirect()->back()->withInput()->with('alert',__('alerts.filetoolarge'));
	        }

	        if(Image::where('label',$label)->get()->first() != null){
	            return redirect()->back()->withInput()->with('alert', __('alerts.usedlabel'));
	        }

	        $url = $label.'.'.$image->getClientOriginalExtension();

	        $image_data = Image::create([
	            'label' => $label,
	            'url' =>  $url,
	        ]);

	        Project::find($project->id)->update(['image_id'=>$image_data->id]);

	        $image->move('../public/images', $url); 
    	} else {
    		Project::find($project->id)->update(['image_id'=>1]);
    	}

    	$nltitle = Text::create([
	            'lang' => 'nl',
	            'type' =>  'title',
	            'content' => request('nltitle'),
	    ]);
	    $project->texts()->attach($nltitle->id);

	    $nlsummary = Text::create([
	            'lang' => 'nl',
	            'type' =>  'summary',
	            'content' => request('nlsummary'),
	    ]);
	    $project->texts()->attach($nlsummary->id);

	    $entitle = Text::create([
	            'lang' => 'en',
	            'type' =>  'title',
	            'content' => request('entitle'),
	    ]);
	    $project->texts()->attach($entitle->id);

	    $ensummary = Text::create([
	            'lang' => 'en',
	            'type' =>  'summary',
	            'content' => request('ensummary'),
	    ]);
	    $project->texts()->attach($ensummary->id);

	    return back()->with('status', 'Succes!');

    }

     public function edit(Project $project)
    {	

    	if(request('image') != null){
    		$image = request('image');
    		$oldimage = $project->image;  		

    		if(filesize($image) >= 2097152){
	            return redirect()->back()->withInput()->with('alert',__('alerts.filetoolarge'));
	        }

	        $base = base_path();
	        $base_total = $base.'/public/images/'.$project->image->url;

	        if($oldimage->label != "default"){
	        	$oldimage->delete();
            	unlink($base_total);
            }

            $label = 'project'.$project->id;  
            $url = $label.'.'.$image->getClientOriginalExtension();

	        $image_data = Image::create([
	            'label' => $label,
	            'url' =>  $url,
	        ]);

	        Project::find($project->id)->update(['image_id'=>$image_data->id]);
	        $image->move('../public/images', $url); 
    	}

    	$texts = $project->texts;

 		foreach($texts as $text){
 			$lang = $text->lang;
 			$type = $text->type;

 			if($lang == "en" && $type == "title"){ $text->update([ 'content' => request('entitle') ]); }
 			if($lang == "nl" && $type == "title"){ $text->update([ 'content' => request('nltitle') ]); }
 			if($lang == "en" && $type == "summary"){ $text->update([ 'content' => request('ensummary') ]); } 
 			if($lang == "nl" && $type == "summary"){ $text->update([ 'content' => request('nlsummary') ]); }

 		}
 		
 		return back()->with('status', 'Succes!');	

 	}

 	 public function delete(Project $project)
    {
    	
    	$texts = $project->texts()->delete();
    	
        $image = $project->image;

      	if($image->label != "default"){
	        $image->delete();
	        $base = base_path();
	        $base_total = $base.'/public/images/'.$project->image->url;
	        unlink($base_total);
      	}

    	$project->delete(); 
    
    	return back()->with('status', 'Succes!');
    }
      
}