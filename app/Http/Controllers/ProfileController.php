<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Cache;

class ProfileController extends Controller
{

    //
    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user) : false;

        //$followercount = $user->profile->followers->count();
        $followercount = Cache::remember('count.followers' . $user->id,
            now()->addSeconds(50),
            function () use ($user) {
                return $user->profile->followers->count();
            });

        //$followingcount = $user->following->count();
        $followingcount = Cache::remember('count.following' . $user->id,
            now()->addSeconds(50),
            function () use ($user) {
                return $user->following->count();
            });


        //$postcount = $user->posts->count();
        $postcount = Cache::remember('count.posts.' . $user->id,
            now()->addSeconds(50),
            function () use ($user) {
                return $user->posts->count();
            });

        return view('profiles.index', compact('user', 'follows', 'postcount', 'followercount', 'followingcount'));
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
            $imageArray = ['profile-picture' => $path];
        }


        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/{$user->id}");
    }
}
