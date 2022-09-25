<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UnfollowsController extends Controller
{
    public function __invoke(User $user)
    {
        $authUser = auth()->user();
        $authUser?->unfollow($user);

        return redirect()->route('dashboard');
    }
}
