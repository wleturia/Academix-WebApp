<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/instructor', 'DashboardController@instructor')->name('dashboard.instructor');
Route::get('/dashboard/instructor', 'DashboardController@instructorDashboard')->name('dashboard.instructor.dashboard');


#My courses Route
Route::get('/my-courses/all-courses', 'MyCoursesController@myCourses')->name('showMyCourses');
Route::get('/my-courses/collections', 'MyCoursesController@myCollections')->name('showCollections');
Route::get('/my-courses/wishlist', 'MyCoursesController@myWishlist')->name('showWishlist');
Route::get('/my-courses/archived', 'MyCoursesController@myArchived')->name('showArchived');

Route::get('/courses/{course}', 'CourseController@show')->name('showCourse');

#ADD COURSE
Route::get('/courses/{course}/enroll', 'CourseController@enrollCourse')->name('enrollCourse');


#COURSE ADMINISTRATION
Route::get('/courses/{course}/dashboard', 'CourseController@show')->name('addCourse');



#Route::post('/courses/{course}', 'MyCoursesController@rating')->name('rating');
Route::post('/courses/{course}', 'MyCoursesController@rating');


Route::post('star', 'MyCoursesController@rating');


Route::get('/courses/{course}/inscribe', 'CourseController@addCourse')->name('courseRegister');

#Route::get('/courses/categories/{category}','CourseController@index')->name('courses');
Route::get('/category', 'CategoryController@index');
Route::get('/category/{category}', 'CategoryController@category');


Route::get('dashboard/instructor/course/{course}', function ($course) {
    //
});