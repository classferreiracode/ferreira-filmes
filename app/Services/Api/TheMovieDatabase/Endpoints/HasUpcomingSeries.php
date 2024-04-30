<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints;

use App\Services\Api\TheMovieDatabase\Endpoints\Tv\UpcomingSeries;

trait HasUpcomingSeries
{

    public function upcoming()
    {
        return new UpcomingSeries();
    }

}
