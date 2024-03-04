<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints;

use App\Services\Api\TheMovieDatabase\Endpoints\Movie\Credits;

trait HasCreditMovies
{
    public function creditMovies()
    {
        return new Credits();
    }
}
