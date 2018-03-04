@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome Instructor!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>Thanks for become an Instructor!</p>
                    <a class="" href="{{ route('dashboard') }}">Go to Dashboard!</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
