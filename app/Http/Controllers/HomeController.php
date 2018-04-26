<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
        $categories = $this->callCategories(3);
        $places = $this->callPlaces($categories, 10);
        return view('home')->with('places',$places);
    }

    private function callCategories($number){
        $categories = DB::table('categories')->select('id','category')->take($number)->get();
        return $categories; 
    }

    private function callPlaces($categories,$numberCourses){
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

    private function mergeData($categories, $courses){
        $data['merge'] = [
            'first' => $categories,
            'second' => $courses
        ];
        return $data;
    }
}
