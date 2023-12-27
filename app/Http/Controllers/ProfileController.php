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
    
}
