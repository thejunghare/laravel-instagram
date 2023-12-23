@extends('layouts.app')
<!-- Dashboard -->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3 p-5">
            <img src="/assets/laravel-logo.jpg" class="img-thumbnail rounded-full" alt="...">
        </div>
        <div class="col-md-9 pt-5">
            <div>
                <h1>{{$user->username}}</h1>
            </div>
            <div class="d-flex">
                <div class="pe-3"><strong>250</strong> posts</div>
                <div class="pe-3"><strong>23k</strong> Followers</div>
                <div class="pe-3"><strong>100</strong> Following</div>
            </div>
            <div class="pt-3 fs-5 fw-bold">{{$user->profile->title}}</div>
            <div class="pt-3 fs-5">{{$user->profile->bio}}</div>
            <div class="pt-3 fs-5"><a href="#">{{$user->profile->url ?? 'N/A'}}</a> </div>
        </div>
    </div>

</div>
@endsection
