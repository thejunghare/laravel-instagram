@extends('layouts.app')

@section('content')
<div class="container">
    <!--{{$user->id}}-->

    <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col-8 offset-2">
                <div class="row mb-3 text-center">
                    <h2>Edit Profile</h2>
                </div>

                <!-- title -> Instagram Name --> 
                <div class="row mb-3">
                    <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                               name="title" value="{{ old('title') ?? $user->profile->title }}"  autocomplete="caption" autofocus>

                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <!-- Instagram bio -->
                <div class="row mb-3">
                    <label for="bio" class="col-md-4 col-form-label text-md-end">{{ __('Bio') }}</label>

                    <div class="col-md-6">
                        <input id="bio" type="text" class="form-control @error('bio') is-invalid @enderror"
                               name="bio" value="{{ old('bio') ?? $user->profile->bio }}"  autocomplete="bio" autofocus>

                        @error('bio')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <!-- Instagram links -->
                <div class="row mb-3">
                    <label for="url" class="col-md-4 col-form-label text-md-end">{{ __('Links') }}</label>
                    <div class="col-6">
                        <input id="url" type="text" class="form-control @error('url') is-invalid @enderror"
                               name="url" value="{{ old('url') ?? $user->profile->url }}"  autocomplete="url" autofocus>

                        @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                
                <!--submit button-->
                <div class="row mb-3">
                    <button type="submit" class="btn btn-primary">save Profile</button>
                </div>
            </div>
        </div>


    </form>
</div>
@endsection
