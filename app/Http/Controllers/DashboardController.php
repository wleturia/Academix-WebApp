<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $id = Auth::user()->id;
        /* $id = Auth::user()->id;
        $courses = DB::table('user_courses')
        ->join('courses', 'user_courses.course_id', '=', 'courses.id')
        ->join('users', 'user_courses.user_id', '=', 'users.id')
        ->select('users.name', 'courses.name', 'courses.description')
        ->whereColumn([
            ['user_courses.user_id', '=', 'users.id']
        ])->get();
*/
//MERGE THIS TWO ARRAYS OR PREPARE A SUBSELECT STATEMENT
$courses = DB::table('courses')
    ->select('courses.name',
    DB::raw("(SELECT users.name FROM users WHERE courses.author_id = users.id) as author") 
    ,'courses.description')
    ->join('user_courses', 'courses.id', '=', 'user_courses.course_id')
    ->where('user_courses.user_id', '=', $id)
    ->get();
#$courses = $query->addSelect('age')->get();

/*
SELECT
    courses.name,
    courses.description,
    (
    SELECT
        users.name
    FROM
        users
    WHERE
        courses.author_id = users.id
)
FROM
    courses
INNER JOIN user_courses ON courses.id = user_courses.course_id
WHERE
    user_courses.user_id = 2
*/
        return view('dashboard')->with('courses',$courses);  
    }

    public function instructor(){
        if(Auth::user()->instructor==0){
            DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['instructor' => 1]);
        }
        return view('instructor');          
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
