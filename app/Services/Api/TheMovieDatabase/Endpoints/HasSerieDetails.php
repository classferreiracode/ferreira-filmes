<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints;

use App\Services\Api\TheMovieDatabase\Endpoints\Tv\Details;

trait HasSerieDetails
{
    public function detailSerie()
    {
        return new Details();
    }
}
