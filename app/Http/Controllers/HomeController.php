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
        return view('welcome', [
            'popularMovies' => $this->service->popularMovies()->get(),
            'popularTv' => $this->service->popularSeries()->get(),
        ]);
    }

    public function search(Request $request): Collection
    {
        return $this->service
            ->search()
            ->fromSearch($request->input('query'))
            ->fromType($request->input('media_type') ?? 'multi')
            ->get();
    }

    public function discoverMovie($id)
    {
        return $this->service
            ->discoverMovie()
            ->fromGenre($id)
            ->get();
    }

    public function movie($id): View
    {
        return view('details-movie', [
            'movie' => $this->service->detailMovies()->fromMovie($id)->get(),
        ]);
    }

    public function series($id): View
    {
        return view('datails-serie', [
            'serie' => $this->service->detailSerie()->fromSerie($id)->get(),
        ]);
    }

    public function castingMovie(int $id): View
    {
        return view('casting', [
            'casting' => $this->service->creditMovies()->fromMovie($id)->get(),
            'movie' => $this->service->detailMovies()->fromMovie($id)->get(),
        ]);
    }

    public function castingSerie(int $id): View
    {
        return view('casting', [
            'casting' => $this->service->creditSeries()->fromSerie($id)->get(),
            'serie' => $this->service->detailSerie()->fromSerie($id)->get(),
        ]);
    }

    public function favorites(int $id, $type)
    {
        if (!Auth::check()) {
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
