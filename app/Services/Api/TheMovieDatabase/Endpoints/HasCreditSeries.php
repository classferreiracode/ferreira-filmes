<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints;

use App\Services\Api\TheMovieDatabase\Endpoints\Tv\Credits;

trait HasCreditSeries
{
    public function creditSeries()
    {
        return new Credits();
    }
}
