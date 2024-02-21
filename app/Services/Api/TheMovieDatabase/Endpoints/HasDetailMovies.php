<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints;

use App\Services\Api\TheMovieDatabase\Endpoints\Movie\Details;

trait HasDetailMovies
{
    public function detailMovies()
    {
        return new Details();
    }
}
