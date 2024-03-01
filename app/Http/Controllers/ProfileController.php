<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\FavoriteMovie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use App\Services\Api\TheMovieDatabase\TheMovieDatabaseService;

class ProfileController extends Controller
{
    private TheMovieDatabaseService $service;
    public function __construct()
    {
        $this->service = new TheMovieDatabaseService();
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function show()
    {
        $favorites = FavoriteMovie::getMovieIdByUser();
        $movies = [];

        foreach ($favorites as $favorite) {
            $tmdb = $this->service
                ->detailMovies()
                ->fromMovie($favorite)
                ->get();

            $movies[] = $tmdb;
        }

        //ds($movies);

        return view('userProfile', [
            'user' => Auth::user(),
            'movies' => $movies
        ]);
    }
}
