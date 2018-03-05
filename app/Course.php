<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $fillable = [
        'name', 'description', 'author_id','price',
    ];

    public function users() 
    {
        return $this->belongsToMany('App\UserCourse')->withTimestamps();
    } 
}
