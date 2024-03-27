<?php

namespace App\Http\Controllers;

use App\Models\FavoriteMovie;
use App\Services\Api\TheMovieDatabase\TheMovieDatabaseService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new TheMovieDatabaseService();

    }

    public function index()
    {
        $popularMovies = $this->service
            ->popularMovies()
            ->get();

        $popularTv = $this->service
            ->popularSeries()
            ->get();

        return view('welcome', [
            'popularMovies' => $popularMovies,
            'popularTv' => $popularTv,
        ]);
    }

    public function search(Request $request): Collection
    {
        return $this->service
            ->search()
            ->fromSearch($request->input('query'))
            ->get();
    }

    public function movie($id): View
    {
        $movie = $this->service
            ->detailMovies()
            ->fromMovie($id)
            ->get();

        return view('movie', [
            'movie' => $movie,
        ]);
    }

    public function series($id): View
    {
        $serie = $this->service
            ->detailSerie()
            ->fromSerie($id)
            ->get();

        return view('serie', [
            'serie' => $serie,
        ]);
    }

    public function castingMovie(int $id): View
    {
        $casting = $this->service
            ->creditMovies()
            ->fromMovie($id)
            ->get();

        $movie = $this->service
            ->detailMovies()
            ->fromMovie($id)
            ->get();

        return view('casting', [
            'casting' => $casting,
            'movie' => $movie,
        ]);
    }

    public function castingSerie(int $id): View
    {
        $casting = $this->service
            ->creditSeries()
            ->fromSerie($id)
            ->get();

        return view('casting', [
            'casting' => $casting,
        ]);
    }

    public function favorites(int $id, $type)
    {
        if (! Auth::check()) {
            return response('Unauthorized', 401);
        }

        $fav = FavoriteMovie::class;

        if ($fav::where('user_id', auth()->user()->id)->where('movie_id', $id)->exists()) {
            $fav::where('user_id', auth()->user()->id)->where('movie_id', $id)->delete();

            return response('Favorite Removed', 200)->header('Content-Type', 'application/json');
        }

        $fav::create([
            'user_id' => auth()->user()->id,
            'movie_id' => $id,
            'type' => $type,
        ]);

        return response('Favorite Added', 200)->header('Content-Type', 'application/json');
    }

    public function getFavorites()
    {
        return response()->json(FavoriteMovie::getAllContentIdByUser());
    }

    public function favoriteMovie()
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

        return response()->json($movies);
    }

    public function favoriteSerie()
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

        return response()->json($series);
    }
}
