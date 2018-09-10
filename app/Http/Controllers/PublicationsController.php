<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Session;
use App\Publication;
use App\Image;
use App\Text;

class PublicationsController extends Controller
{

  public function __construct()
  {
    $this->middleware('setlocale');
  }

  public function display()
  {
    $publications = Publication::orderBy('created_at', 'desc')->get();

    return view('publications', compact('publications'));
  }

  public function index()
  {
  	$publications = Publication::orderBy('created_at', 'desc')->get();

    return view('cms.publications', compact('publications'));
  }

  public function add()
  { 

    $publication = Publication::create([ ]);

    $label = 'publication'.$publication->id;
     
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

        Publication::find($publication->id)->update(['image_id'=>$image_data->id]);

        $image->move('../public/images', $url); 
    } else {
      Publication::find($publication->id)->update(['image_id'=>1]);
    }

     if(request('publication_file') != null){

      $publication_file = request('publication_file');

      if(filesize($publication_file) >= 2097152){
        return redirect()->back()->withInput()->with('alert',__('alerts.filetoolarge'));
      }

        $url = $label.'.'.$publication_file->getClientOriginalExtension();

        Publication::find($publication->id)->update(['url'=> $url]);

        $publication_file->move('../public/publications', $url); 
    }

    $nltitle = Text::create([
            'lang' => 'nl',
            'type' =>  'title',
            'content' => request('nltitle'),
    ]);
    $publication->texts()->attach($nltitle->id);

    $nlsummary = Text::create([
            'lang' => 'nl',
            'type' =>  'summary',
            'content' => request('nlsummary'),
    ]);
    $publication->texts()->attach($nlsummary->id);

    $entitle = Text::create([
            'lang' => 'en',
            'type' =>  'title',
            'content' => request('entitle'),
    ]);
    $publication->texts()->attach($entitle->id);

    $ensummary = Text::create([
            'lang' => 'en',
            'type' =>  'summary',
            'content' => request('ensummary'),
    ]);
    $publication->texts()->attach($ensummary->id);

    return back()->with('status', 'Succes!'); 

  }

   public function edit(Publication $publication)
    { 

      if(request('image') != null){
        $image = request('image');
        $oldimage = $publication->image;      

        if(filesize($image) >= 2097152){
              return redirect()->back()->withInput()->with('alert',__('alerts.filetoolarge'));
          }

          $base = base_path();
          $base_total = $base.'/public/images/'.$publication->image->url;

          if($oldimage->label != "default"){
            $oldimage->delete();
              unlink($base_total);
            }

            $label = 'publication'.$publication->id;  
            $url = $label.'.'.$image->getClientOriginalExtension();

          $image_data = Image::create([
              'label' => $label,
              'url' =>  $url,
          ]);

          Publication::find($publication->id)->update(['image_id'=>$image_data->id]);
          $image->move('../public/images', $url); 
      }

      if(request('publication_file') != null){
        $publication_file = request('publication_file');
        $old_publication = $publication->url;   

        if(filesize($publication_file) >= 2097152){
          return redirect()->back()->withInput()->with('alert',__('alerts.filetoolarge'));
        }

        $url = $label.'.'.$publication_file->getClientOriginalExtension();

        Publication::find($publication->id)->update(['url'=> $url]);

          $publication_file->move('../public/publications', $url);  

        
          $base = base_path();
          $base_total = $base.'/public/publications/'.$publication->url;
          unlink($base_total);
          

          $label = 'publication'.$publication->id;  
          $url = $label.'.'.$image->getClientOriginalExtension();

          Publication::find($publication->id)->update(['url'=>$url]);
          $image->move('../public/publications', $url); 
      }

      $texts = $publication->texts;

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

   public function delete(Publication $publication)
    {
      $base = base_path();

      if($publication->url != null){
        $base_total = $base.'/public/publications/'.$publication->url;
        unlink($base_total);
      }

      $texts = $publication->texts()->delete();

      $image = $publication->image;
      if($image->label != "default"){
        $image->delete();
        $base_total = $base.'/public/images/'.$publication->image->url;
        unlink($base_total);
      }
     
      $publication->delete(); 
     
      return back()->with('status', 'Succes!');
    }

}
