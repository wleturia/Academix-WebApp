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
            'App\Composers\HomeComposer'  => ['auth/course'], //attaches HomeComposer to home.blade.php
        ]);

    }

    public function show($courseURL){
        $url = filter_var($courseURL, FILTER_SANITIZE_URL);
        if(Auth::guest())
        {
            $courseDetail = $this->loadCourse($url);
            return view('auth/course')->with('courseDetail',$courseDetail);
        }else{
            $courseDetail = $this->loadMyCourse($url);
            if ($courseDetail->isEmpty()){
                unset($courseDetail);
                $courseDetail = $this->loadCourse($url);
                return view('auth/course')->with('courseDetail',$courseDetail);
            }else{
                return view('auth/course')->with('courseDetail',$courseDetail);
            }
        }
    }

    protected function loadCourse($url){
        $courseDetail = DB::table('courses')
        ->select('*',DB::raw("(SELECT users.name FROM users WHERE courses.author_id = users.id) as author"))            
        ->where('courses.url', '=', (string)$url)->get();
        return $courseDetail;
    }
    protected function loadMyCourse($url){
        $courseDetail = DB::table('courses')
        ->select('*',DB::raw("(SELECT users.name FROM users WHERE courses.author_id = users.id) as author"))
        ->join('user_courses','courses.id', '=', 'user_courses.course_id')
        ->where('courses.url', '=', (string)$url)
        ->where('user_courses.user_id','=', Auth::user()->id)
        ->get();
        return $courseDetail;
    }


    public function addCourse($course){
        if(Auth::guest()){
            $course;
            return view('Auth/login');                          
            
        }else{
            
        }
    }

}
