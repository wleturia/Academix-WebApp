@extends('layouts.app') @section('content')
<div class="container-fluid py-4 course-row">
    <div class="container">
        @if($courseDetail->isEmpty())
        <div class="title">Course not found!</div>
        @else
        <div class="row justify-content-center">
            @foreach($courseDetail as $key => $data)
            <div class="col-md-4 d-flex justify-content-center">
                <div class="img-container">
                    @if(isset($data->image))
                    <img class="card-img-top" src="data:image/png;base64,{{ base64_encode($data->image) }}" height="240" width="425">
                    @else
                    <img class="card-img-top" src="{{ asset('img/not-found.jpg') }}" width="425" height="240" alt="not found">
                    @endif
                </div>
            </div>
            <div class="col-md-8 d-flex flex-column justify-content-start col-description">
                <div class="title">
                    <h1 class="py-2">{{$data->name}}</h1>
                </div>
                @if(isset($data->progress))
                <div class="button">
                        <a href="" class="btn btn-primary py-2">Continue to Lecture 5</a>
                    </div>
                    <div class="stars d-flex justify-content-start py-3">
                        <!-- STARS -->
                        <form action="/courses/{{$data->url}}" name="rating" id="myForm" method="post">
                        @csrf
                            @if(isset($data->star))
                                <div class="starrating risingstar d-flex flex-row-reverse" onclick="courseRatedAlert();" style="pointer-events:none;">
                            @else
                                <div class="starrating risingstar d-flex flex-row-reverse" onclick="document.getElementById('myForm').submit();">
                            @endif
                            @for($i =  5; $i > 0 ; $i--)
                                @if($i == $data->star)
                                    <input type="radio" id="star<?php echo $i; ?>" name="rating" value="<?php echo $i; ?>" checked/><label for="star<?php echo $i; ?>" title="<?php echo $i; ?> star"></label>
                                @else
                                    <input type="radio" id="star<?php echo $i; ?>" name="rating" value="<?php echo $i; ?>" /><label for="star<?php echo $i; ?>" title="<?php echo $i; ?> star"></label>
                                @endif
                            @endfor
                            </div>  
                        </form>
                        <script> function courseRatedAlert() { alert("You've already rated this course!"); } </script> ​
                        @if(isset($data->star))
                        <p class="p-2">You've already rated this course!</p>
                        @else
                        <p class="p-2">Rate This Course</p>                        
                        @endif
                        <!-- END STARS -->
                    </div>
                    <div>
                        <p>4 of 24 items complete <a href="" class="px-3">Reset Progress</a></p>
                        <div class="progress">
                            <div class="progress-bar" style="width:10%"></div>
                        </div>
                    </div>
                @else
                <div class="course-description">
                        <p>{{$data->description}}</p>
                        </div>
                <div class="stars d-flex justify-content-start">
                    <!-- STARS -->
                    <div class="starrating risingstar d-flex flex-row-reverse non-hover">
                            <input type="radio" id="star5" name="rating" value="5" disabled/><label for="star5" title="5 star"></label>
                            <input type="radio" id="star4" name="rating" value="4" disabled /><label for="star4" title="4 star"></label>
                            <input type="radio" id="star3" name="rating" value="3" disabled/><label for="star3" title="3 star"></label>
                            <input type="radio" id="star2" name="rating" value="2" disabled checked/><label for="star2" title="2 star"></label>
                            <input type="radio" id="star1" name="rating" value="1" disabled/><label for="star1" title="1 star"></label>
                        </div>
                        <p class="px-2">4.4 (400 ratings) <span  class="px-2">{{$data->students}}<small> students enrolled</small></span></p>
                        <!-- END STARS -->
                    </div>
                    <div class="extra-details">
                        <p><span class="px-2">Created by USER</span> <span class="px-2">Last updated 3/2018</span> <span class="px-2">English</span> <span class="px-2">Spanish [auto-generated]</span></p>
                    </div>
                    <div class="button">
                            <a href="" class="btn btn-primary py-2">Enroll Now</a>
                        </div>

                @endif
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>
@endsection
