<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints;

use App\Services\Api\TheMovieDatabase\Endpoints\Tv\NowPlayings;

trait HasNowPlayingSeries
{
    public function nowPlayingSeries()
    {
        return new NowPlayings();
    }

}
