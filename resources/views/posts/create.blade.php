@extends('layouts.app')

@section('content')

<div class="container">
    <form action="/p" enctype="multipart/form-data" method="post">
        @csrf
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row mb-3 text-center">
                    <h2>Add New Post</h2>
                </div>

                <div class="row mb-3">
                    <label for="caption" class="col-md-4 col-form-label text-md-end">{{ __('Caption') }}</label>

                    <div class="col-md-6">
                        <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror"
                            name="caption" value="{{ old('caption') }}"  autocomplete="caption" autofocus>

                        @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class=" mb-3 d-flex align-items-end justify-content-evenly">
                    <div class="">
                        <!-- <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label> -->
                        <input id="image" type="file" class="form-control-file @error('image') is-invalid @enderror"
                            name="image" value="{{ old('image') }}"  autocomplete="image" autofocus>

                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="">
                        <button type="submit" class="btn btn-primary">Add New Post</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
