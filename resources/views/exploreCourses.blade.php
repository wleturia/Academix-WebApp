@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        @if ($array==true)
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <div class="list-group">
                        @if(isset($array['merge']['first']))
                        @foreach($array['merge']['first'] as $categories => $category)
                        <a href="/category/{{ $category->category }}" class="list-group-item">{{$category->category}}</a>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    <?php $collection = $array['merge']['second'];?> @if(isset($array['merge']['second'])) @foreach($array['merge']['second'] as $array => $data)
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$data->name}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{$data->author}}</h6>
                            <p class="card-text">{{$data->description}}.</p>
                            <p class="float-right italic">Students: {{$data->students}}</p>
                            <a href="/merge/{{ $data->url }}" class="card-link">Go to Course Dashboard</a>
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