<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints;

use App\Services\Api\TheMovieDatabase\Endpoints\Tv\TopRatedSeries;

trait HasTopRatedSeries
{
    public function topRatedSeries()
    {
        return new TopRatedSeries();
    }

}
