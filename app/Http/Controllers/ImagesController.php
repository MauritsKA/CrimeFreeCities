<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Session;
use App\Image;

class ImagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('setlocale');
    }

    public function index()
    {
        $images = Image::orderBy('created_at', 'desc')->where('id', '!=', 1)->get();
        return view('cms.images', compact('images'));
    }

    public function add()
    {	
    	if(request('image') != null){

    	$image = request('image');
        $label = request('label');

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

        $image->move('../public/images', $url); 

    	} else {
    		 return redirect()->back()->withInput()->with('alert', __('alerts.noimage'));
    	}

    	  return redirect()->back()->withInput()->with('status', __('status.imageadded'));
    }

}

