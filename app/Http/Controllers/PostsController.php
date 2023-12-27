<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller {

    public function __construct() {
        $this->middleware("auth");
    }

    public function create() {
        return view('posts.create');
    }

    public function store() {
        $data = request()->validate([
            'caption' => 'required',
            'image' => 'required|image'
        ]);

        $imagepath = request('image')->store('uploads', 'public');

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagepath,
        ]);

        return redirect('/profile/' . auth()->user()->id);

        // \App\Models\Post::create($data);
        // dd(request()->all()); # var_dump
    }

    public function show(Post $post) {
//        dd($post);
//        return view('posts.show', [
//        'post' => $post,
//        ])
        return view('posts.show', compact('post'));
    }
}
