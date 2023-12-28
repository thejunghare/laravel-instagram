@extends('layouts.app')
<!-- Dashboard -->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3 p-5">
            <img src="{{ $user->profile->profileimage() }}" class="img-thumbnail rounded-circle"
                 alt="...">
        </div>
        <div class="col-md-9 pt-5">
            <div class="d-flex align-items-end justify-content-between">
                <h4>{{$user->username}}
                    @can('update', $user->profile)
                    <span class="fs-6 me-3">
                        <a href="/profile/{{$user->id}}/edit" class="text-decoration-none">
                            edit
                        </a>
                    </span>
                    @endcan
                </h4>
                @can('update', $user->profile)
                <a href="/p/create" class="text-decoration-none">Add Post</a>
                @endcan
            </div>
            <div class="d-flex">
                <div class="pe-3"><strong>{{$user->posts->count()}}</strong> posts</div>
                <div class="pe-3"><strong>23k</strong> Followers</div>
                <div class="pe-3"><strong>100</strong> Following</div>
            </div>
            <div class="pt-3 fs-6 fw-bold">{{$user->profile->title}}</div>
            <div class="pt-3 fs-6">{{$user->profile->bio}}</div>
            <div class="pt-3 fs-6"><a href="#">{{$user->profile->url ?? 'N/A'}}</a></div>
        </div>
    </div>
    <div class="row pt-5">
        @foreach($user->posts as $post)
        <div class="col-4 pb-4">
            <a href="/p/{{$post->id}}">
                <img src="/storage/{{ $post->image }}" alt="" class="w-100 rounded">
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
