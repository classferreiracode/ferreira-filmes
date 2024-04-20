<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints;

use App\Services\Api\TheMovieDatabase\Endpoints\Tv\Upcomings;

trait HasUpcomingSeries
{

    public function upcoming()
    {
        return new Upcomings();
    }

}
