<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use View;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        View::composers([
            'App\Composers\HomeComposer'  => ['home'] //attaches HomeComposer to home.blade.php
        ]);
    }

    public function index()
    {   
        return view('home');
    }

}
