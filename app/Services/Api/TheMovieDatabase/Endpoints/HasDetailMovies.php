<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints;

trait HasDetailMovies
{
    public function detailMovies()
    {
        return new Details();
    }
}
