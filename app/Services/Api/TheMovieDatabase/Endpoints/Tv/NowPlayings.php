<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints\Tv;

use App\Services\Api\TheMovieDatabase\Entities\Tv\NowPlaying;
use App\Services\Api\TheMovieDatabase\Endpoints\BaseEndpoint;

class NowPlayings extends BaseEndpoint
{
    public function get()
    {
        return $this->transform(
            $this->service
                ->api
                ->get('/tv/airing_today?language=pt-BR&page=1&include_adult=false')
                ->json('results'),
            NowPlaying::class
        );
    }
}
