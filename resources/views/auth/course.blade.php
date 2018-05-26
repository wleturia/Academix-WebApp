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
                    <img class="card-img-top" src="data:image/png;base64,{{ base64_encode($data->image) }}" height="240" width="425"> @else
                    <img class="card-img-top" src="{{ asset('img/not-found.jpg') }}" width="425" height="240" alt="not found"> @endif
                </div>
            </div>
            <div class="col-md-8 d-flex flex-column justify-content-start col-description">
                <div class="title py-1">
                    <h1 class="pt-2 data-title" title="{{$data->name}}">{{$data->name}}</h1>
                </div>                
                @if(isset($data->progress))
                <div class="button py-2">
                    <a href="" class="btn btn-primary py-2">Continue to Lecture 5</a>
                </div>
                <div class="stars d-flex justify-content-start py-2 pl-0">
                    <!-- STARS -->
                    <div class="row">
                        <div class="col">
                                <form action="/courses/{{$data->url}}" name="rating" id="myForm" method="post">
                                    @csrf 
                                    @if(isset($data->star))
                                        <div class="starrating risingstar d-flex flex-row-reverse" onclick="courseRatedAlert();" style="pointer-events:none;">
                                    @else
                                        <div class="starrating risingstar d-flex flex-row-reverse" onclick="document.getElementById('myForm').submit();">
                                    @endif 
                                            @for($i = 5; $i > 0 ; $i--) 
                                                @if($i == $data->star)
                                                    <input type="radio" id="star<?php echo $i; ?>" name="rating" value="<?php echo $i; ?>" checked/><label for="star<?php echo $i; ?>" title="<?php echo $i; ?> star"></label>
                                                @else
                                                    <input type="radio" id="star<?php echo $i; ?>" name="rating" value="<?php echo $i; ?>" /><label for="star<?php echo $i; ?>" title="<?php echo $i; ?> star"></label> 
                                                @endif 
                                            @endfor
                                        </div>
                                    </div>
                                </form>
                        </div>
                        <div class="col">
                            @if(isset($data->star))
                                <p class="p-2">You've already rated this course! <small><a href="" class="px-2">Modify</a></small></p>
                            @else
                                <p class="p-2">Rate This Course</p>
                            @endif
                        </div>
                    </div>
                <div class="pl-1">
                    <p>4 of 24 items complete <a href="" class="px-3">Reset Progress</a></p>
                    <div class="progress">
                        <div class="progress-bar" style="width:10%"></div>
                    </div>
                </div>
                @else
                <div class="pt-2 course-description">
                    <p>{{$data->description}}</p>
                </div>
                <div class="stars d-flex justify-content-start" style="pointer-events:none;">
                    <!-- STARS -->
                    <div class="starrating risingstar d-flex flex-row-reverse non-hover">
                        @for($i = 5; $i > 0 ; $i--) @if($i == round($data->punctuation))
                        <input type="radio" id="star<?php echo $i; ?>" name="rating" value="<?php echo $i; ?>" checked/><label for="star<?php echo $i; ?>" title="<?php echo $i; ?> star"></label> @else
                        <input type="radio" id="star<?php echo $i; ?>" name="rating" value="<?php echo $i; ?>" /><label for="star<?php echo $i; ?>" title="<?php echo $i; ?> star"></label> @endif @endfor
                    </div>
                    <p class="px-2">{{round($data->punctuation,2)}} ({{$data->voted}} ratings) <span class="px-2">{{$data->students}}<small> students enrolled</small></span></p>
                    <!-- END STARS -->
                </div>
                <div class="extra-details">
                    <p class="data-author"><span class="pr-2">Created by {{$data->author}}</span> <span class="px-2">Last updated {{date('Y-m',strtotime($data->updated_at))}}</span> <span class="px-2">English</span> <span class="px-2">Spanish [auto-generated]</span></p>
                </div>
                <div class="button">
                    <a href="{{route('enrollCourse',['course' => $data->url])}}" class="btn btn-primary py-2">Enroll Now</a>
                </div>
                @endif
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>
@endsection
