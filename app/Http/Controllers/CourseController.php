<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class CourseController extends Controller
{
    public function show($course){
        #$url = str_slug($course, "-");
        $text = ucwords(str_replace('-', ' ', $course));
        if(Auth::guest())
        {
            $courseDetail = DB::table('courses')
            ->select('courses.name',DB::raw("(SELECT users.name FROM users WHERE courses.author_id = users.id) as author"),'courses.description')            
            ->where('courses.name', '=', (string)$text)->get();
            return view('auth/course')->with('courseDetail',$courseDetail);
        }else{
            $courseDetail = DB::table('courses')
            ->select('courses.name',DB::raw("(SELECT users.name FROM users WHERE courses.author_id = users.id) as author"),'courses.description','user_courses.progress','user_courses.user_id')
            ->join('user_courses','courses.id', '=', 'user_courses.course_id')
            ->where('courses.name', 'LIKE', (string)$text.'_')
            ->where('user_courses.user_id','=', Auth::user()->id)
            ->get();
            if ($courseDetail->isEmpty()){
                unset($courseDetail);
                $courseDetail = DB::table('courses')
                ->select('courses.name',DB::raw("(SELECT users.name FROM users WHERE courses.author_id = users.id) as author"),'courses.description')            
                ->where('courses.name', '=', (string)$text)->get();
                return view('auth/course')->with('courseDetail',$courseDetail);
            }else{
                return view('auth/course')->with('courseDetail',$courseDetail);
            }
        }
    }

    public function addCourse($course){
        if(Auth::guest()){
            $course;
            return view('Auth/login');                          
            
        }else{
            
        }
    }
}
