<?php namespace App\Composers;

use DB;
use Auth;

class HomeComposer
{

    public function compose($view)
    {
        //Add your variables
        $NavbarData;
        #DISPLAY COURSES IN CAROUSEL VIEW
        $categoriesToDisplay = $this->callCategories(3);             
        $NavbarData = $this->carouselDisplay($categoriesToDisplay,10);
        $NavbarData = $this->loadFavedCourses($NavbarData,10);
        $NavbarData = $this->loadCartCourses($NavbarData,10);
        $NavbarData = $this->loadCurrentCourses($NavbarData,10);

        $view->with('courses',      $NavbarData);
    }

    
    private function loadFavedCourses($content,$coursesToLoad){
        $favedCourses = DB::table('user_courses')
        ->select('*')
        ->join('courses','user_courses.course_id', '=', 'courses.id')
        ->where('user_courses.user_id', '=', Auth::id())
        ->where('user_courses.status_id', '=', 1)      
        ->take($coursesToLoad)
        ->get();
            foreach($favedCourses as $faved){
            $courseDiscount= $this->getDiscount($faved->id);
            $faved->discount = $courseDiscount;
            }
            $merge = $this->singleMergeData('faved',$favedCourses);
            array_push($content, $merge);
        return $content;
    }

    private function loadCurrentCourses($content,$coursesToLoad){
        $currentCourses = DB::table('user_courses')
        ->select('*')
        ->join('courses','user_courses.course_id', '=', 'courses.id')
        ->where('user_courses.user_id', '=', Auth::id())
        ->where('user_courses.status_id', '=', 2)      
        ->take($coursesToLoad)
        ->get();
        $merge = $this->singleMergeData('current',$currentCourses);
        array_push($content, $merge);
        return $content;
    }

    private function loadCartCourses($content,$coursesToLoad){
        $cartCourses = DB::table('user_courses')
        ->select('*')
        ->join('courses','user_courses.course_id', '=', 'courses.id')
        ->where('user_courses.user_id', '=', Auth::id())
        ->where('user_courses.status_id', '=', 3)      
        ->take($coursesToLoad)
        ->get();
            foreach($cartCourses as $faved){
                $courseDiscount= $this->getDiscount($faved->id);
                if($courseDiscount){
                    $faved->discount = $courseDiscount;
                }
            }
            $merge = $this->singleMergeData('cart',$cartCourses);
            array_push($content, $merge);
        return $content;
       
    }

    private function getDiscount($courseId){
        $courseDiscount = DB::table('course_discounts')
        ->select('price','discount','type_id','init_date','end_date')
        ->join('courses','courses.id', '=', 'course_discounts.course_id')
        ->where('courses.id', '=', $courseId)
        ->get();
        if($courseDiscount!=null){
            foreach($courseDiscount as $course){
                $type= $course->type_id;
                $showDiscounts= $this->showDiscounts($course,$type);
            }
            return $courseDiscount;  
        }else{
            return $courseDiscount = false;
        }
    }

    private function showDiscounts($course,$typeDiscount){
        switch($typeDiscount){
            case 1:
                $discount = $course->price - (($course->price/100) * $course->discount);
                $discount = number_format((float)$discount, 2, '.', '');
                $course->discount = $discount;
            break;
            default: 
                $discount = $course->price - (($course->price/100) * $course->discount);
                $discount = number_format((float)$discount, 2, '.', '');
                $course->discount = $discount;
            break;
        }
        return $course;
    }
    /*
    private function showTotalPrice($course,$typeDiscount){
        switch($typeDiscount){
            case 1:
                $discount = $course->price - (($course->price/100) * $course->discount);
                $discount = number_format((float)$discount, 2, '.', '');
                $totalPrice += $discount;
                $course->discount = $discount;
                $course->totalPrice = $totalPrice;
            break;
            default: 
            $discount = $course->price - (($course->price/100) * $course->discount);
            $discount = number_format((float)$discount, 2, '.', '');
            $totalPrice += $discount;
            $course->discount = $discount;
            $course->totalPrice = $totalPrice;
            break;
        }
        return $course;
    }
*/
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