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
            <div class="d-flex flex-column align-items-start justify-content-between ">
                <div class="d-flex align-items-center">
                    <!-- username -->
                    <div class="me-2">
                        <h4>
                            {{$user->username}}
                        </h4>
                    </div>

                    <!-- follow button -->
                    <div>
                        <follow-component user-id="{{$user->id }}" follows="{{ $follows }}"></follow-component>
                    </div>

                    <!-- edit profile -->
                    <div class="me-2">
                        @can('update', $user->profile)
                        <a href="/profile/{{$user->id}}/edit" class="text-decoration-none">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        @endcan
                    </div>


                </div>

                <!-- add post -->
                <div>
                    @can('update', $user->profile)
                    <a href="/p/create" class="text-decoration-none">
                        <i class="bi bi-plus-circle"></i>
                    </a>
                </div>
                @endcan
            </div>
            <div class="d-flex">
                <div class="pe-3"><strong>{{ $postcount }}</strong> posts</div>
                <div class="pe-3"><strong>{{ $followercount }}</strong> Followers</div>
                <div class="pe-3"><strong>{{ $followingcount }}</strong> Following</div>
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
