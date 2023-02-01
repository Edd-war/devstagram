<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    //
    public function store(User $user)
    {
        // dd($user->username);
        // auth()->user()->follow(request('user'));
        // return back();

        $user->followers()->attach(auth()->user()->id);
        return back();
    }

    public function destroy(User $user)
    {
        // auth()->user()->unfollow(request('user'));
        // return back();

        $user->followers()->detach(auth()->user()->id);
        return back();
    }
}
