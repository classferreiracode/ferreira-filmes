<?php

namespace App\Services\Api\TheMovieDatabase;

use App\Services\Api\TheMovieDatabase\Endpoints\HasPerson;
use App\Services\Api\TheMovieDatabase\Endpoints\HasPopularSeries;
use App\Services\Api\TheMovieDatabase\Endpoints\HasSerieDetails;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\PendingRequest;
use App\Services\Api\TheMovieDatabase\Endpoints\HasSearch;
use App\Services\Api\TheMovieDatabase\Endpoints\HasPeopleList;
use App\Services\Api\TheMovieDatabase\Endpoints\HasDetailMovies;
use App\Services\Api\TheMovieDatabase\Endpoints\HasPopularMovies;

class TheMovieDatabaseService
{
    use HasPopularMovies;
    use HasPopularSeries;
    use HasDetailMovies;
    use HasSerieDetails;
    use HasPeopleList;
    use HasPerson;
    use HasSearch;

    public PendingRequest $api;

    public function __construct()
    {
        $this->api = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('TMDB_API_TOKEN'),
            'accept' => 'application/json',
        ])->baseUrl('https://api.themoviedb.org/3');
    }
}
