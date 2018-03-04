@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        @if(Auth::user()->instructor==0)
                        <a href="{{action('DashboardController@instructor')}}">Become an Instructor</a> 
                        @endif
                        <p>Welcome @if(Auth::user()->instructor==0) Student @else Instructor @endif{{Auth::user()->name}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
