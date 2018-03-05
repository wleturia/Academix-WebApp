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
                                    <p class="card-text">{{$data->description}}.</p>
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
