<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints;

use App\Services\Api\TheMovieDatabase\Endpoints\Tv\Series;

trait HasPopularSeries
{
    public function popularSeries() : Series
    {
        return new Series();
    }
}
