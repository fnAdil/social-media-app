<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class FollowsController extends Controller
{
    public function store(User $user)
    {
        auth()->user()->following()->toggle($user->profile);
        return Redirect::route('profile.show', ['user' => $user]); 
    }
}
