<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseItemStatus extends Model
{

    protected $fillable = [
        'course_item_status',
    ];

    protected $hidden = [
        'description',
    ];
    
}
