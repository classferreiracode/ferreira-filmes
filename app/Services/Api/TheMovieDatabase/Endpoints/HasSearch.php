<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints;

trait HasSearch
{
    public function search()
    {
        return new Search();
    }
}
