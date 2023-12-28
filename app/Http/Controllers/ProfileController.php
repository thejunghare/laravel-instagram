<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller {

    //
    public function index(User $user) {
        return view('profiles.index', compact('user'));
    }

    public function edit(User $user) {
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user) {
        $data = request()->validate([
            'title' => 'required',
            'bio' => 'required',
            'url' => 'url',
        ]);
        auth()->user->profile->update($data);
        return redirect("/profile/{$user->id}");
        // dd($data);
    }
}
