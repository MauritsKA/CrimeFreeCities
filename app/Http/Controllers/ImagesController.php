<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Session;
use App\Image;
use App\Publication;

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

     public function edit(Image $old_image)
    { 

      $label = request('label');
      $base = base_path();
      $new_image = request('image'); 

      if($new_image != null){
           
        if(filesize($new_image) >= 2097152){
          return redirect()->back()->withInput()->with('alert',__('alerts.filetoolarge'));
         }
    
        $base_total = $base.'/public/images/'.$old_image->url;

        if($old_image->label != "default"){
          unlink($base_total);
        }

        $url = $label.'.'.$new_image->getClientOriginalExtension();

        Image::find($old_image->id)->update(['label'=>$label,'url'=>$url]);
        $new_image->move('../public/images', $url); 

        return back()->with('status', __('status.imageadded')); 
      }

    Image::find($old_image->id)->update(['label'=>$label]);

    return back()->with('status', __('status.labeledit')); 
  }

   public function delete(Image $old_image)
    {
      $base = base_path();

      $publication = $old_image->publication;

      if($publication != null){
         Publication::find($publication->id)->update(['image_id'=> 1]);
      }

      if($old_image->label != "default"){
        $old_image->delete();
        $base_total = $base.'/public/images/'.$old_image->url;
        unlink($base_total);
      }
     
      return back()->with('status', __('status.imagedelete'));
    }

}

