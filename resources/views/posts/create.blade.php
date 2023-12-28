@extends('layouts.app')

@section('content')

<div class="container">
    <form action="/p" enctype="multipart/form-data" method="post">
        @csrf
         <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Caption</span>
            <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror"
                   name="caption" value="{{ old('caption') }}"  autocomplete="caption" autofocus>

            @error('caption')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="input-group">
            <input id="image" type="file" class="form-control-file @error('image') is-invalid @enderror"
                   name="image" value="{{ old('image') }}"  autocomplete="image" autofocus>

            @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Add Post</button>
        </div>
    </form>
</div>

@endsection
