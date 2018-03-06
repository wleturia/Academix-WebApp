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
        #$id = Auth::user()->id;
        if(Auth::guest())
        {
            return view('Auth/courses');
        }else{
            $courses = DB::table('courses')
            ->select('courses.name',DB::raw("(SELECT users.name FROM users WHERE courses.author_id = users.id) as author"),'courses.description','user_courses.progress')
            ->join('user_courses', 'courses.id', '=', 'user_courses.course_id')
            ->where('user_courses.user_id', '=', Auth::user()->id)
            ->paginate(3);
            return view('Auth/dashboard')->with('courses',$courses);  
        }
    }

    public function instructor(){
        if(Auth::guest())
        {
            return view('Auth/login')->with('courses',$courses);              
        }else{
            if(Auth::user()->instructor==0){DB::table('users')->where('id', Auth::user()->id)->update(['instructor' => 1]);}
            return view('Auth/instructor');
        }
    }

    public function instructorDashboard(){
        #SELECT courses.name, courses.description, courses.students FROM courses WHERE courses.author_id = 2
        if(Auth::guest())
        {
            return view('Auth/login')->with('courses',$courses);              
        }else{
            $courses = DB::table('courses')
            ->where('courses.author_id', '=', Auth::user()->id)
            ->paginate(3);
            return view('Auth/instructorDashboard')->with('courses', $courses);
    }
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
