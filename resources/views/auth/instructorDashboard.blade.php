@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome Instructor {{Auth::user()->name}}!</div>

                <div class="card-body">
            
                        @if(!$courses->isEmpty())
                        <h4 class="courses-title">Instructor Courses <a href="#" class="float-right small">Create a New One</a></h4>

                            @foreach($courses as $key => $data)
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{$data->name}}</h5>
                                    <p class="card-text">{{$data->description}}.</p>
                                    <p class="float-right">Students: {{$data->students}}</p>
                                    <a href="#" class="card-link">Go to Course Dashboard</a>
                                </div>
                            </div>
                            @endforeach
                        @else
                        <a href="#">Look for some courses!</a>
                        @endif                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
