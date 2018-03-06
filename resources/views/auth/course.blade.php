@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if(!$courseDetail->isEmpty())
                <div class="card-header">Course Details</div>
                @else
                <div class="card-header">Course not found!</div>
                @endif
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="row justify-content-center">     
                            @if(!$courseDetail->isEmpty())
                            @foreach($courseDetail as $key => $data)
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$data->name}}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{$data->author}}</h6>
                                        <p class="card-text">{{$data->description}}.</p>
                                        @if(array_has($data, 'user_id'))
                                            <a href="#" class="card-link">Resume Learning</a>
                                            <p class="float-right italic">Progress: {{$data->progress}}%</p>
                                        @else
                                            <a href="/courses/{{ str_slug($data->name, "-") }}/inscribe" class="card-link">Add to my courses</a>                                            
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                            @else
                            <a href="#">Oooops course not found!</a>
                            @endif
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
