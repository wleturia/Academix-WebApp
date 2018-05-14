<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use View;

class CourseController extends Controller
{

    public function __construct(){

        View::composers([
            'App\Composers\HomeComposer'  => ['auth/course'] //attaches HomeComposer to home.blade.php
        ]);

    }

    public function show($courseURL){
        #$url = str_slug($course, "-");
        #$text = ucwords(str_replace('-', ' ', $course));
        #return $text;
        $url = filter_var($courseURL, FILTER_SANITIZE_URL);
        if(Auth::guest())
        {
            $courseDetail = $this->loadCourses();
            return view('auth/course')->with('courseDetail',$courseDetail);
        }else{
            $courseDetail = $this->loadMyCourses();
            if ($courseDetail->isEmpty()){
                unset($courseDetail);
                $courseDetail = $this->loadCourses();
                return view('auth/course')->with('courseDetail',$courseDetail);
            }else{
                return view('auth/course')->with('courseDetail',$courseDetail);
            }
        }
    }

    protected function loadCourses(){
        $courseDetail = DB::table('courses')
        ->select('courses.name',DB::raw("(SELECT users.name FROM users WHERE courses.author_id = users.id) as author"),'courses.description','courses.url')            
        ->where('courses.url', '=', (string)$url)->get();
        return $courseDetail;
    }
    protected function loadMyCourses(){
        $courseDetail = DB::table('courses')
        ->select('courses.name',DB::raw("(SELECT users.name FROM users WHERE courses.author_id = users.id) as author"),'courses.description','user_courses.progress','user_courses.user_id','courses.url')
        ->join('user_courses','courses.id', '=', 'user_courses.course_id')
        ->where('courses.url', '=', (string)$url)
        ->where('user_courses.user_id','=', Auth::user()->id)
        ->get();
        return $courseDetail;
    }


    public function showMyCourses(){
        $courseDetail = $this->loadMyCourses();
        return view('auth/mycourses')->with('courseDetail',$courseDetail);        
    }

    public function addCourse($course){
        if(Auth::guest()){
            $course;
            return view('Auth/login');                          
            
        }else{
            
        }
    }

}
