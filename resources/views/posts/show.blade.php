@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card mb-3" >
        <div class="row g-0">
            <div class="col-md-4">
                <img src="/storage/{{$post->image}}" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$post->user->username}}</h5>
                    <p class="card-text">{{$post->caption}}</p>
                    <p class="card-text"><small class="text-body-secondary">{{$post->created_at}}</small></p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
