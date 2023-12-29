@extends('layouts.app')

@section('content')

<div class="container">
    @foreach($posts as $post)
    <div class="card" style="width: 25rem;margin:auto;">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <img src="{{ $post->user->profile->profileimage() }}" class="rounded-circle me-2" width="20"
                     height="20"
                     alt="">
                <a href="/profile/{{$post->user->id}} "
                   class="fw-bold text-decoration-none text-black">{{$post->user->username}}</a>
                <div style="border-left: 1px solid #ccc; height: 10px; margin: 0 15px;"></div>
                <a href="#" class="text-decoration-none fw-bold">status</a>
            </div>
            <hr>
            <img src="/storage/{{$post->image}}" class="card-img-top rounded" alt="...">
            <hr>
            <!-- icons -->
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <div class="d-flex align-items-center justify-content-start mb-3">
                            <div class="me-4">
                                <a href="#">
                                    <i class="bi bi-suit-heart text-dark"></i>
                                </a>
                            </div>
                            <div class="me-4">
                                <a href="#">
                                    <i class="bi bi-chat text-dark"></i>
                                </a>
                            </div>
                            <div class="me-4">
                                <a href="#">
                                    <i class="bi bi-share text-dark"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-flex align-items-center justify-content-end">
                            <a href="#">
                                <i class="bi bi-download text-dark"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- caption -->
            <p class="card-text">
                    <span class="fw-bold">
                    <a href="/profile/{{$post->user->id}}"
                       class="fw-bold text-decoration-none text-black">{{$post->user->username}}
                    </a>
                    </span>
                {{$post->caption}}</p>
            <p class="card-text"><small class="text-body-secondary">{{$post->created_at}}</small></p>
            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
        </div>
    </div>
    @endforeach
    <div class="row">
        <div class="col-12 d-flex justify-content-center align-items-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>

@endsection
