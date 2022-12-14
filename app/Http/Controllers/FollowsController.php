<?php

namespace App\Http\Controllers;

use App\Models\User;

class FollowsController extends Controller
{
    public function __invoke(User $user)
    {
        $authUser = auth()->user();
        $authUser?->follow($user);

        return redirect()->route('dashboard');
    }
}
