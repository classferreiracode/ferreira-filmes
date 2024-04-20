<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints;

use App\Services\Api\TheMovieDatabase\Endpoints\Movie\TopRatedes;
trait HasTopRatedMovies
{
    public function topRated()
    {
        return new TopRatedes();
    }

}
