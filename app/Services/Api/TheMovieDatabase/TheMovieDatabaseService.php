<?php

namespace App\Services\Api\TheMovieDatabase;

use App\Services\Api\TheMovieDatabase\Endpoints\HasCreditMovies;
use App\Services\Api\TheMovieDatabase\Endpoints\HasCreditSeries;
use App\Services\Api\TheMovieDatabase\Endpoints\HasDetailMovies;
use App\Services\Api\TheMovieDatabase\Endpoints\HasMovieGenreList;
use App\Services\Api\TheMovieDatabase\Endpoints\HasPeopleList;
use App\Services\Api\TheMovieDatabase\Endpoints\HasPerson;
use App\Services\Api\TheMovieDatabase\Endpoints\HasPopularMovies;
use App\Services\Api\TheMovieDatabase\Endpoints\HasPopularSeries;
use App\Services\Api\TheMovieDatabase\Endpoints\HasSearch;
use App\Services\Api\TheMovieDatabase\Endpoints\HasSerieDetails;
use App\Services\Api\TheMovieDatabase\Endpoints\HasUpcomingMovies;
use App\Services\Api\TheMovieDatabase\Endpoints\HasTopRatedMovies;
use App\Services\Api\TheMovieDatabase\Endpoints\HasNowPlayingMovies;
use App\Services\Api\TheMovieDatabase\Endpoints\HasUpcomingSeries;
use App\Services\Api\TheMovieDatabase\Endpoints\HasTopRatedSeries;
use App\Services\Api\TheMovieDatabase\Endpoints\HasNowPlayingSeries;
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
    use HasUpcomingMovies;
    use HasTopRatedMovies;
    use HasNowPlayingMovies;
    use HasUpcomingSeries;
    use HasTopRatedSeries;
    use HasNowPlayingSeries;
    use HasMovieGenreList;

    public PendingRequest $api;

    public function __construct()
    {
        $this->api = Http::retry(30, 100, throw: false)->withHeaders([
            'Authorization' => 'Bearer '.env('TMDB_API_TOKEN'),
            'accept' => 'application/json',
        ])
        ->baseUrl('https://api.themoviedb.org/3');
    }
}
