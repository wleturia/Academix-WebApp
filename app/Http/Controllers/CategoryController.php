<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courseDetail = DB::table('courses')
        ->select('courses.name',DB::raw("(SELECT users.name FROM users WHERE courses.author_id = users.id) as author"),'courses.description','courses.students','courses.url')
        ->paginate(3);
        $categories = $this->callCategories();
        $data = $this->mergeData($categories, $coursesCategory);        
        return view('exploreCourses')->with('array',$data);
    }
    
    public function category($category){
        $coursesCategory = DB::table('courses')
        ->select('courses.name',DB::raw("(SELECT users.name FROM users WHERE courses.author_id = users.id) as author"),'courses.description','courses.students','courses.url')
        ->join('categories','courses.category_id', '=', 'categories.id')      
        ->where('categories.category','=',$category)
        ->paginate(3);
        $categories = $this->callCategories();
        $data = $this->mergeData($categories, $coursesCategory);
        return view('exploreCourses')->with('array',$data);      
    }
    private function callCategories(){
        $categories = DB::table('categories')
        ->select('categories.category')
        ->get();
        return $categories;
    }
    private function mergeData($categories, $courses){
        $data['merge'] = [
            'first' => $categories,
            'second' => $courses
        ];
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
