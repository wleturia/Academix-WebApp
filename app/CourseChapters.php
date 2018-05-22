<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseChapters extends Model
{

    protected $fillable = [
        'chapter_name',
    ];

    protected $hidden = [
        'description', 'course_id',
    ];

    public function Course() 
    {
        return $this->belongsTo('Course')->withTimestamps();
    } 

}
