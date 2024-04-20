<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints;

use App\Services\Api\TheMovieDatabase\Endpoints\Tv\TopRatedes;

trait HasTopRatedSeries
{
    public function topRated()
    {
        return new TopRatedes();
    }

}
