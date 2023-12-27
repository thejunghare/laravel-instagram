<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class ProfileController extends Controller
{
    //
    public function index($user)
    {
        $user = User::find($user);
        if (!$user) {
            return view("home", ["user" => $user]);
        }

        return view('profiles.index', [
            'user' => $user
        ]);
    }
}
