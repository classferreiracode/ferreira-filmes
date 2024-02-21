<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints;

trait HasPopularSeries
{
    public function popularSeries() : Series
    {
        return new Series();
    }
}
