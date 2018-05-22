<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseItem extends Model
{

    protected $fillable = [
        'item_name','item_type','course_chapter',
    ];

    protected $hidden = [
        'item_status','media_content','media_description','text_content',
    ];
    
    public function CourseItemStatus()
    {
        return $this->belongsToMany('CourseItemStatus')->withTimestamps();   
    }
    public function CourseItemType()
    {
        return $this->belongsToMany('CourseItemType')->withTimestamps();   
    }
    public function CourseChapters()
    {
        return $this->belongsToMany('CourseChapters')->withTimestamps();   
    }
    
}
