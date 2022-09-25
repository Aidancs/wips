<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    public function __invoke(User $user)
    {
        $authUser = auth()->user();
        $authUser?->follow($user);

        return redirect()->route('dashboard');
    }
}
