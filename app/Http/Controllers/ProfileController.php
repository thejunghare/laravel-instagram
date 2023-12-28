<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;

class ProfileController extends Controller
{

    //
    public function index(User $user)
    {
        return view('profiles.index', compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'bio' => 'required',
            'url' => 'url',
            'profile_picture' => '',
        ]);

        if (request('profile_picture')) {
            $path = request('profile_picture')->store('uploads', 'public');
        }

        auth()->user()->profile->update(array_merge(
            $data,
            ['profile_picture' => $path]
        ));

        return redirect("/profile/{$user->id}");
    }
}
