<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints\Movie;

use App\Services\Api\TheMovieDatabase\Entities\Movie\NowPlaying;
use App\Services\Api\TheMovieDatabase\Endpoints\BaseEndpoint;

class NowPlayings extends BaseEndpoint
{
    public function get()
    {
        return $this->transform(
            $this->service
                ->api
                ->get('/movie/now_playing?language=pt-BR&page=1&include_adult=false')
                ->json('results'),
            NowPlaying::class
        );
    }
}
