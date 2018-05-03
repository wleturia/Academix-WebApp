<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseDiscount extends Model
{
    protected $fillable = [
        'discount_id','course_id', 'discount', 'type_id','init_date','end_date',
    ];

    protected $hidden = [
        'description',
    ];

    public function Course() 
    {
        return $this->hasMany('Course')->withTimestamps();
    }
}
