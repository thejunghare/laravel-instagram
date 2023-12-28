@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="/storage/{{$post->image}}" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <img src="/storage/{{$post->user->profile->profile_picture}}" class="rounded-circle" width="35"
                             height="20"
                             alt="">
                        <a href="/profile/{{$post->user->id}} " class="fw-bold text-decoration-none text-black">{{$post->user->username}}</a>
                    </div>
                    <hr>
                    <p class="card-text">
                    <span class="fw-bold">
                    <a href="/profile/{{$post->user->id}}"
                       class="fw-bold text-decoration-none text-black">{{$post->user->username}}
                    </a>
                    </span>
                        {{$post->caption}}</p>
                    <p class="card-text"><small class="text-body-secondary">{{$post->created_at}}</small></p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
