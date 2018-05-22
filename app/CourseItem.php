<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseItem extends Model
{
    

    

    public function course()
    {
        return $this->belongsTo('Course')->withTimestamps();   
    }
}
