@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        @if ($courses==true)
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <div class="list-group">
                        <a href="/courses/category/{{ 'all' }}" class="list-group-item {{ Request::path() == 'all' ? 'active' : '' }}">Cras justo odio</a>
                        <a href="/courses/category/{{ 'easd' }}" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
                        <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
                        <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
                        <a href="#" class="list-group-item list-group-item-action disabled">Vestibulum at eros</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    <?php $collection = $courses['courses']['coursesQuery'];?> @if(isset($courses['courses']['coursesQuery'])) @foreach($courses['courses']['coursesQuery'] as $courses => $data)
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$data->name}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{$data->author}}</h6>
                            <p class="card-text">{{$data->description}}.</p>
                            <p class="float-right italic">Students: {{$data->students}}</p>
                            <a href="/courses/{{ $data->url }}" class="card-link">Go to Course Dashboard</a>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-md-12">
                        <div class="row justify-content-center">
                            {{ $collection }}
                        </div>
                    </div>
                    @else
                    <a href="#">Look for some courses!</a> @endif
                </div>
            </div>
        </div>
        @else
        <h5>Not Found</h5>
        @endif
    </div>
</div>
@endsection