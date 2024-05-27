<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints;

use App\Services\Api\TheMovieDatabase\Endpoints\Movie\Discovery;

trait HasDiscoverMovie
{

    public function discoverMovie()
    {
        return new Discovery();
    }
}
