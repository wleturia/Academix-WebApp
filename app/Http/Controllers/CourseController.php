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
        $idCourse =\App\Course::where('url', '=', $url)->first();
        $idCourse = $idCourse->id;
        $courseDetail = DB::table('courses')
        ->select('*',DB::raw("(SELECT users.name FROM users WHERE courses.author_id = users.id) as author"),
        DB::raw("(SELECT COUNT(user_courses.star) FROM user_courses WHERE user_courses.course_id = $idCourse) as voted"),
        DB::raw("(SELECT AVG(user_courses.star) FROM user_courses WHERE user_courses.course_id = $idCourse) as punctuation"),
        DB::raw("(SELECT COUNT(*) FROM user_courses WHERE user_courses.course_id = $idCourse) as students"))
        #SELECT COUNT(*) FROM `user_courses` WHERE user_courses.course_id = 81
        ->where('courses.url', '=', (string)$url)->get();
        #$result = $a->merge($b);

        #SELECT COUNT(user_courses.star) as students, AVG(user_courses.star) as puntuation FROM user_courses WHERE user_courses.course_id = 1s
 #, (SELECT COUNT(user_courses.star) as students
    #DB::raw("(SELECT COUNT(user_courses.star) as students, AVG(user_courses.star) as puntuation FROM user_courses WHERE user_courses.course_id = 1) as punctuation)"))            


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
