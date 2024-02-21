<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints;

use App\Services\Api\TheMovieDatabase\Endpoints\Movie\Populars;

trait HasPopularMovies
{
    public function popularMovies()
    {
        return new Populars();
    }
}
