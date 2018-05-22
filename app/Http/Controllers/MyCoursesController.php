<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use View;

class MyCoursesController extends Controller
{
    

    public function __construct(){

        View::composers([
            'App\Composers\HomeComposer'  => ['auth/mycourses'], //attaches HomeComposer to home.blade.php
        ]);

    }


    public function rating(Request $request, $courseData){
        $rating = $request->rating;
        $course = \App\Course::where('url', '=' ,$courseData)->firstOrFail();
        $courseId = $course->id;
        $update = DB::table('user_courses')
        ->where('course_id', $courseId)
        ->where('user_id', Auth::id())
        ->update(['star' => $rating]);
        return $update;
    }
    

    public function myCourses(){
        $myCourses = $this->loadMyCourses();
        return view('auth/mycourses')->with('courseDetail',$myCourses);        
    }

    protected function loadMyCourses(){
        $myCourses = DB::table('courses')
        ->select('courses.name',DB::raw("(SELECT users.name FROM users WHERE courses.author_id = users.id) as author"),'courses.description','user_courses.progress','user_courses.user_id','courses.url')
        ->join('user_courses','courses.id', '=', 'user_courses.course_id')
        ->where('user_courses.user_id','=', Auth::user()->id)
        ->get();
        return $myCourses;
    }
}
