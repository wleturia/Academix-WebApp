@extends('layouts.app')

@section('content')

<style>
    

</style>
<div class="container-fluid p-3">
    <h1 class="title">My Courses</h1>
    <nav class="nav nav-pills nav-justified p-1">
            <a class="nav-link" href="#">All Courses</a>
            <a class="nav-link" href="#">Collections</a>
            <a class="nav-link" href="#">Wishlist</a>
            <a class="nav-link" href="#">Archived</a>
    </nav>
</div>
<div class="container py-4">
    <div class="row justify-content-center p-4">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-3 pl-0">
                                <label for="all-courses">All Courses</label>
                                <div class="input-group">
                                        <select class="form-control" id="exampleFormControlSelect1">
                                                <option>RECENTLY ACCESSED</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                              </select>
                                </div>
                        </div>
                        <div class="col pl-0">
                                <label for="collections">Filter by</label>
                                <div class="input-group">
                                        <select class="form-control" id="exampleFormControlSelect1">
                                                <option>Categories</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                              </select>
                                </div>
                        </div>
                        <div class="col pl-0">
                                <div class="d-flex align-items-end" style="height:100%">                            
                            <div class="input-group">
                                    <select class="form-control" id="exampleFormControlSelect1">
                                            <option>Progress</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                          </select>
                                </div>
                                </div>
                        </div>
                        <div class="col pl-0">
                                <div class="d-flex align-items-end" style="height:100%">                            
                            
                                <div class="input-group">
                                        <select class="form-control" id="exampleFormControlSelect1">
                                                <option>Instructor</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                              </select>
                                </div>
                            </div>
                                
                        </div>
                        <div class="col-2 pl-0">
                            <div class="d-flex align-items-end" style="height:100%">                            
                                    <input type="reset" class="btn btn-outline-primary">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex align-items-end" style="height:100%">
                            <div class="ml-auto">
                                <div class="input-group">

                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-search"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="archived" aria-describedby="basic-addon3" placeholder="Search">
                                </div>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <div class="row justify-content-center">
        <div class="col-md-10">
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
