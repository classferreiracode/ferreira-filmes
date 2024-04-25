<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints\Movie;

use App\Services\Api\TheMovieDatabase\Endpoints\BaseEndpoint;
use App\Services\Api\TheMovieDatabase\Entities\Movie\Upcoming as UpcomingMovie;
class Upcomings extends BaseEndpoint
{
    public function get()
    {
        return $this->transform(
            $this->service
                ->api
                ->get('/movie/upcoming?language=pt-BR&page=1&include_adult=false&sort_by=release_date.desc')
                ->json('results'),
            UpcomingMovie::class
        );
    }
}
