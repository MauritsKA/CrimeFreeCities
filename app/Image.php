<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded = [];

    public function project()
    {
        return $this->hasOne(Project::class);
    }

     public function publication()
    {
        return $this->hasOne(Publication::class);
    }
}
