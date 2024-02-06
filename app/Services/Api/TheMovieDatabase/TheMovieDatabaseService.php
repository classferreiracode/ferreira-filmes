<?php

namespace App\Services\Api\TheMovieDatabase;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\PendingRequest;
use App\Services\Api\TheMovieDatabase\Endpoints\HasPeopleList;
use App\Services\Api\TheMovieDatabase\Endpoints\HasDetailMovies;
use App\Services\Api\TheMovieDatabase\Endpoints\HasPopularMovies;

class TheMovieDatabaseService
{
    use HasPopularMovies;
    use HasDetailMovies;
    use HasPeopleList;

    public PendingRequest $api;

    public function __construct()
    {
        $this->api = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('TMDB_API_TOKEN'),
            'accept' => 'application/json',
        ])->baseUrl('https://api.themoviedb.org/3');
    }
}
