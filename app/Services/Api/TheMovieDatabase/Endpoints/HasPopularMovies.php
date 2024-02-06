<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints;

trait HasPopularMovies
{
    public function popularMovies()
    {
        return new Populars();
    }
}
