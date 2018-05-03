<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscountType extends Model
{
    protected $fillable = [
        'id','type',
    ];

    protected $hidden = [
        'description',
    ];

    public function CourseDiscount() 
    {
        return $this->belongsToMany('CourseDiscount')->withTimestamps();
    }

}
