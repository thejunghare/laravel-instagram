<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Intervention\Image\Image;
// use Intervention\Image\Facades\Image;

/*use Illuminate\Http\Request; */

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => 'required|image'
        ]);

        $imagepath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagepath}"))->fit(1200, 1200);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagepath,
        ]);

        return redirect('/profile/' . auth()->user()->id);

        // \App\Models\Post::create($data);
        // dd(request()->all()); # var_dump
    }
}
