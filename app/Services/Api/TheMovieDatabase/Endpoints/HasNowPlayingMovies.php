<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints;

use App\Services\Api\TheMovieDatabase\Endpoints\Movie\NowPlayings;
trait HasNowPlayingMovies
{
    public function nowPlaying()
    {
        return new NowPlayings();
    }

}
