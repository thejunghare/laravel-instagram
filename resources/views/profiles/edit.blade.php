@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')

        <!--Name-->
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">@</span>
            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                   name="title" value="{{ old('title') ?? $user->profile->title }}"  autocomplete="caption" autofocus>

            @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <!--links-->
        <div class="mb-3">
            <label for="basic-url" class="form-label">Your vanity URL</label>
            <div class="input-group">
                <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
                <input id="url" type="text" class="form-control @error('url') is-invalid @enderror"
                       name="url" value="{{ old('url') ?? $user->profile->url }}"  autocomplete="url" autofocus>

                @error('url')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-text" id="basic-addon4">Example help text goes outside the input group.</div>
        </div>

        <!--bio-->
        <div class="input-group mb-3">
            <span class="input-group-text">With textarea</span>
            <textarea aria-label="With textarea" id="bio" class="form-control @error('bio') is-invalid @enderror"
                      name="bio" value=""  autocomplete="bio" autofocus>{{ old('bio') ?? $user->profile->bio }}</textarea>
            @error('bio')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <!--image-->
        <div class="input-group mb-3">
            <label class="input-group-text" for="profile_picture">Profile</label>
            <input id="profile_picture" type="file" class="form-control @error('profile_picture') is-invalid @enderror"
                   name="profile_picture" value="{{ old('profile_picture') }}"  autocomplete="profile_picture" autofocus>

            @error('profile_picture')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save Profile</button>
    </form>
</div>
@endsection
