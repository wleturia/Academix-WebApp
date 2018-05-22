<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseItemType extends Model
{

    protected $fillable = [
        'course_item_type',
    ];

    protected $hidden = [
        'description',
    ];

}
