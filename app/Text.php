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
}
