<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        #DISPLAY COURSES IN CAROUSEL VIEW
        $categoriesToDisplay = $this->callCategories(3);             
        $courses = $this->carouselDisplay($categoriesToDisplay,10);
        #DISPLAY FAVED COURSES
        $favedCoursesToDisplay = 10;
        $userCourses = $this->loadFavedCourses($courses,$favedCoursesToDisplay);



        #return dd($userCourses);
        #array_push($places, ['hola','hola']);        
        #return dd($places);
        return view('home')->with('courses',$courses);
    }

    private function loadFavedCourses($content,$coursesToLoad){
        $coursesItem = DB::table('user_courses')
        ->select('name','courses.description','url', 'image','price')
        ->join('courses','user_courses.course_id', '=', 'courses.id')
        ->where('user_id', '=', Auth::id())
        ->where('status_id', '=', '1')            
        ->take($coursesToLoad)
        ->get();
        $merge = $this->singleMergeData('faved',$coursesItem);
        array_push($content, $merge);
        return $content;
    }

    private function carouselDisplay($categories, $numberCourses){
        $plucked = $categories->pluck('category');
        $array = $plucked->all();
        $content=[];
        foreach($array as $item){
            $coursesItem = DB::table('courses')
            ->select('name','courses.description','url', 'image')
            ->join('categories','courses.category_id', '=', 'categories.id')
            ->where('categories.category', '=', (string)$item)
            ->take($numberCourses)
            ->get();
            $merge = $this->mergeData($item,$coursesItem);
            array_push($content, $merge);
        }
        return $content;
    }
    
    private function callCategories($number){
        $categories = DB::table('categories')->select('id','category')->take($number)->get();
        return $categories; 
    }

    private function mergeData($categories, $courses){
        $data['carrousel'] = [
            'category' => $categories,
            'course' => $courses
        ];
        return $data;
    }
    private function singleMergeData($name, $courses){
        $data[$name] = [
            'course' => $courses
        ];
        return $data;
    }
}
