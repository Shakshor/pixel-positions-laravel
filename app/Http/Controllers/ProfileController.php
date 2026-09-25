<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display the user's profile.
     */
    public function __invoke(Request $request): View
    {
        $user = Auth::user();

        $user->loadMissing([
            'employer.jobs' => fn ($query) => $query->latest(),
            'employer.jobs.tags',
            'employer.jobs.employer',
        ]);

        return view('profile.show', [
            'user' => $user,
            'employer' => $user->employer,
            'jobs' => $user->employer?->jobs ?? collect(),
        ]);
    }
}
