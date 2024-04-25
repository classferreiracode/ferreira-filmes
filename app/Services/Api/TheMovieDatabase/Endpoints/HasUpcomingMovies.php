<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints;

use App\Services\Api\TheMovieDatabase\Endpoints\Movie\Upcomings;
trait HasUpcomingMovies
{

    public function upcomingMovies()
    {
        return new Upcomings();
    }

}
