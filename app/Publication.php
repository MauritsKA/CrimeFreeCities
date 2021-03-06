<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
	protected $guarded = [];

    public function texts(){
       return $this->belongsToMany(Text::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
