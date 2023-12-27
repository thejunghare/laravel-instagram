@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{$post->image}}" alt="alt" class="w-100"/>
        </div>
        <div class="col-4">
            <h2>{{$post->user->username}}</h2>
            <p>{{$post->caption}}</p>
        </div>
    </div>
</div>

@endsection