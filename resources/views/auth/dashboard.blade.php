@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        <!-- 

                            @if(Auth::user()->instructor==0)
                            <a href="{{action('DashboardController@instructor')}}">Become an Instructor</a> 
                            @endif
                            <p>Welcome @if(Auth::user()->instructor==0) Student @else Instructor @endif{{Auth::user()->name}}</p>
                        -->
                        @if(!$courses->isEmpty())
                        <h4 class="courses-title">My Courses <a href="#" class="float-right small">Explore More Courses</a></h4>

                            @foreach($courses as $key => $data)
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{$data->name}}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{$data->author}}</h6>
                                    <p class="card-text">{{$data->description}}.</p>
                                    <p class="float-right italic">Progress: {{$data->progress}}%</p>
                                    <a href="#" class="card-link">Resume Learning</a>
                                    <a href="#" class="card-link">Go to Course Dashboard</a>
                                </div>
                            </div>
                            @endforeach
                        @else
                        <a href="#">Look for some courses!</a>
                        @endif
                        <div class="col-md-12">
                            <div class="row justify-content-center">
                                {{ $courses->links() }}
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
