<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCourse extends Model
{
    protected $fillable = [
        'user_id', 'course_id','status_id',
    ];

    protected $hidden = [
        'star', 'review','progress',
    ];
}
