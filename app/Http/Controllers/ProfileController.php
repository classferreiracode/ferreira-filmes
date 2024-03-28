<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\FavoriteMovie;
use App\Services\Api\TheMovieDatabase\TheMovieDatabaseService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    private TheMovieDatabaseService $service;

    public function __construct()
    {
        $this->middleware('auth');
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
    public function update(Request $request)
    {
        $request->validate([
            'name' => ['string', 'max:255'],
            'email' => ['email', 'max:120', 'unique:users,email,' . $request->user()->id],
            'avatar' => ['image'],
        ]);

        //upload image
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->storeAs('public/img/profile', $request->user()->id . '.' . $request->file('avatar')->extension());
            $request->user()->avatar = $request->user()->id . '.' . $request->file('avatar')->extension();
        }

        $request->user()->forceFill([
            'name' => $request->name,
            'email' => $request->email,
            'avatar' => $request->user()->avatar,
        ])->save();

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
        return view('userProfile', [
            'user' => Auth::user(),
        ]);
    }

    public function favoriteMovie(): View
    {
        $favorites = FavoriteMovie::getMovieIdByUser('movie');
        $movies = [];

        foreach ($favorites as $favorite) {
            $tmdb = $this->service
                ->detailMovies()
                ->fromMovie($favorite->movie_id)
                ->get();

            $movies[] = $tmdb;
        }

        return view('profile.favoriteMovie', [
            'movies' => $movies,
        ]);
    }

    public function favoriteSerie(): View
    {
        $favorites = FavoriteMovie::getMovieIdByUser('tv');
        $series = [];

        foreach ($favorites as $favorite) {
            $tmdb = $this->service
                ->detailSerie()
                ->fromSerie($favorite->movie_id)
                ->get();

            $series[] = $tmdb;

        }

        return view('profile.favoriteSerie', [
            'series' => $series,
        ]);
    }
}
