<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
   protected $guarded = [];

   public function projects(){
       return $this->belongsToMany(Project::class);
    }

    public function publications(){
       return $this->belongsToMany(Publication::class);
    }

     public function statistics(){
       return $this->belongsToMany(Statistic::class);
    }

     public function practices(){
       return $this->belongsToMany(Practice::class);
    }
}
