<?php

namespace App\Services\Api\TheMovieDatabase;

use App\Services\Api\TheMovieDatabase\Endpoints\HasCreditMovies;
use App\Services\Api\TheMovieDatabase\Endpoints\HasCreditSeries;
use App\Services\Api\TheMovieDatabase\Endpoints\HasDetailMovies;
use App\Services\Api\TheMovieDatabase\Endpoints\HasPeopleList;
use App\Services\Api\TheMovieDatabase\Endpoints\HasPerson;
use App\Services\Api\TheMovieDatabase\Endpoints\HasPopularMovies;
use App\Services\Api\TheMovieDatabase\Endpoints\HasPopularSeries;
use App\Services\Api\TheMovieDatabase\Endpoints\HasSearch;
use App\Services\Api\TheMovieDatabase\Endpoints\HasSerieDetails;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class TheMovieDatabaseService
{
    use HasCreditMovies;
    use HasCreditSeries;
    use HasDetailMovies;
    use HasPeopleList;
    use HasPerson;
    use HasPopularMovies;
    use HasPopularSeries;
    use HasSearch;
    use HasSerieDetails;

    public PendingRequest $api;

    public function __construct()
    {
        $this->api = Http::withHeaders([
            'Authorization' => 'Bearer '.env('TMDB_API_TOKEN'),
            'accept' => 'application/json',
        ])->baseUrl('https://api.themoviedb.org/3');
    }
}
