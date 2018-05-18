@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @foreach ($courses as $coursesList) 
                @if(isset($coursesList["carrousel"]))
                    @foreach($coursesList as $item)
                    <h3 class="pt-5 pb-2">{{$item["category"]}}</h3>
                    <div class="slick-slider" data-slick='{"slidesToShow": 4, "slidesToScroll": 1}'>
                        @foreach($item["course"] as $course)
                        <div class="col-md-3">
                            <div class="card ml-1" style="">
                                @if(!$course->image==null)
                                <img class="card-img-top" src="{{$course->image}}" width="200" height="200px" alt="Card image cap"> @else
                                <img class="card-img-top" src="{{ asset('img/not-found.jpg') }}" width="200" height="200px" alt="not found"> @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{$course->name}}</h5>
                                    <!-- <p class="card-text" style="overflow-y: scroll; max-height: 100px;">{{$course->description}}</p> -->
                                    <a href="/courses/{{$course->url}}" class="btn btn-primary">Visit Route!</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection