<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
      protected $guarded = [];

      public function texts(){
       return $this->belongsToMany(Text::class);
    }

}
