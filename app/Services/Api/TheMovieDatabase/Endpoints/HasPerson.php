<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints;

use App\Services\Api\TheMovieDatabase\Endpoints\Person\Details;

trait HasPerson
{
    public function person()
    {
        return new Details();
    }
}
