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
        $courseDetail = DB::table('courses')
        ->where('courses.name', 'like', '%' .(string)$text. '%')->get();
        return view('auth/course')->with('courseDetail',$courseDetail);    
        #return $courseDetail; 
    }
}
