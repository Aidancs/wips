<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class UsersController extends Controller
{
    public User $authUser;

    public function index(): Response
    {
        $this->authUser = auth()->user();

        $usersToFollow = User::where('id', '!=', $this->authUser->id)
            ->whereNotIn('id', $this->authUser->followings->pluck('followable_id'))
            ->get();

        $usersYouFollow = User::where('id', '!=', $this->authUser->id)
            ->whereIn('id', $this->authUser->followings->pluck('followable_id'))
            ->get();

        return Inertia::render('Dashboard', [
            'authUser' => $this->authUser,
            'usersToFollow' => $usersToFollow,
            'usersYouFollow' => $usersYouFollow,
        ]);
    }
}
